<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cvs', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 150);
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
    }

    public function down(): void
    {
        Schema::dropIfExists('cvs');
    }
};
