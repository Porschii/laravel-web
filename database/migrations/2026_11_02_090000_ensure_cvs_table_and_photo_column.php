<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('cvs')) {
            Schema::create('cvs', function (Blueprint $table) {
                $table->id();
                $table->string('nama', 150);
                $table->string('foto')->nullable();
                $table->string('profesi', 150);
                $table->string('email', 150);
                $table->string('telepon', 30)->nullable();
                $table->string('alamat', 500)->nullable();
                $table->text('deskripsi');
                $table->text('pendidikan')->nullable();
                $table->text('pengalaman')->nullable();
                $table->text('keahlian')->nullable();
                $table->timestamps();
            });

            return;
        }

        $columns = [
            'nama' => fn (Blueprint $table) => $table->string('nama', 150)->nullable(),
            'foto' => fn (Blueprint $table) => $table->string('foto')->nullable(),
            'profesi' => fn (Blueprint $table) => $table->string('profesi', 150)->nullable(),
            'email' => fn (Blueprint $table) => $table->string('email', 150)->nullable(),
            'telepon' => fn (Blueprint $table) => $table->string('telepon', 30)->nullable(),
            'alamat' => fn (Blueprint $table) => $table->string('alamat', 500)->nullable(),
            'deskripsi' => fn (Blueprint $table) => $table->text('deskripsi')->nullable(),
            'pendidikan' => fn (Blueprint $table) => $table->text('pendidikan')->nullable(),
            'pengalaman' => fn (Blueprint $table) => $table->text('pengalaman')->nullable(),
            'keahlian' => fn (Blueprint $table) => $table->text('keahlian')->nullable(),
            'created_at' => fn (Blueprint $table) => $table->timestamp('created_at')->nullable(),
            'updated_at' => fn (Blueprint $table) => $table->timestamp('updated_at')->nullable(),
        ];

        foreach ($columns as $column => $definition) {
            if (!Schema::hasColumn('cvs', $column)) {
                Schema::table('cvs', $definition);
            }
        }
    }

    public function down(): void
    {
        // Intentionally preserve existing CV table and uploaded files.
    }
};
