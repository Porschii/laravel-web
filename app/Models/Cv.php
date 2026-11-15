<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    protected $table = 'cvs';

    protected $fillable = [
        'nama',
        'foto',
        'profesi',
        'email',
        'telepon',
        'alamat',
        'deskripsi',
        'pendidikan',
        'pengalaman',
        'keahlian',
    ];
}
