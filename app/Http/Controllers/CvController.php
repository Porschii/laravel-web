<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CvController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->query('q');

        $cvs = Cv::query()
            ->when($keyword, function ($query, $keyword) {
                $query->where(function ($subQuery) use ($keyword) {
                    $subQuery->where('nama', 'like', "%{$keyword}%")
                        ->orWhere('profesi', 'like', "%{$keyword}%")
                        ->orWhere('email', 'like', "%{$keyword}%");
                });
            })
            ->latest()
            ->paginate(8)
            ->withQueryString();

        $totalCv = Cv::count();

        return view('cv.index', compact('cvs', 'totalCv', 'keyword'));
    }

    public function create()
    {
        return view('cv.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules());

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')
                ->store('foto-portofolio', 'public');
        }

        Cv::create($validated);

        return redirect()->route('cv.index')
            ->with('success', 'Data CV berhasil ditambahkan.');
    }

    public function show(Cv $cv)
    {
        return view('cv.show', compact('cv'));
    }

    public function edit(Cv $cv)
    {
        return view('cv.edit', compact('cv'));
    }

    public function update(Request $request, Cv $cv)
    {
        $validated = $request->validate($this->rules());

        if ($request->hasFile('foto')) {
            if ($cv->foto) {
                Storage::disk('public')->delete($cv->foto);
            }

            $validated['foto'] = $request->file('foto')
                ->store('foto-portofolio', 'public');
        }

        $cv->update($validated);

        return redirect()->route('cv.index')
            ->with('success', 'Data CV berhasil diperbarui.');
    }

    public function destroy(Cv $cv)
    {
        if ($cv->foto) {
            Storage::disk('public')->delete($cv->foto);
        }

        $cv->delete();

        return redirect()->route('cv.index')
            ->with('success', 'Data CV berhasil dihapus.');
    }

    private function rules(): array
    {
        return [
            'nama' => ['required', 'string', 'max:150'],
            'foto' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'profesi' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:150'],
            'telepon' => ['nullable', 'string', 'max:30'],
            'alamat' => ['nullable', 'string', 'max:500'],
            'deskripsi' => ['required', 'string', 'max:2000'],
            'pendidikan' => ['nullable', 'string', 'max:2000'],
            'pengalaman' => ['nullable', 'string', 'max:3000'],
            'keahlian' => ['nullable', 'string', 'max:2000'],
        ];
    }
}
