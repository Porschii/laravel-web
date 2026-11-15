<?php

use Illuminate\\Database\\Migrations\\Migration;
use Illuminate\\Database\\Schema\\Blueprint;
use Illuminate\\Support\\Facades\\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Create the CV table if it does not exist yet.
        if (!Schema::hasTable('cvs')) {
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

            return;
        }

        // Repair an existing cvs table without dropping its current data.
        // Newly added columns are nullable so existing records remain valid.
        if (!Schema::hasColumn('cvs', 'nama')) {
            Schema::table('cvs', fn (Blueprint $table) => $table->string('nama', 150)->nullable());
        }

        if (!Schema::hasColumn('cvs', 'profesi')) {
            Schema::table('cvs', fn (Blueprint $table) => $table->string('profesi', 150)->nullable());
        }

        if (!Schema::hasColumn('cvs', 'email')) {
            Schema::table('cvs', fn (Blueprint $table) => $table->string('email', 150)->nullable());
        }

        if (!Schema::hasColumn('cvs', 'telepon')) {
            Schema::table('cvs', fn (Blueprint $table) => $table->string('telepon', 30)->nullable());
        }

        if (!Schema::hasColumn('cvs', 'alamat')) {
            Schema::table('cvs', fn (Blueprint $table) => $table->string('alamat', 500)->nullable());
        }

        if (!Schema::hasColumn('cvs', 'deskripsi')) {
            Schema::table('cvs', fn (Blueprint $table) => $table->text('deskripsi')->nullable());
        }

        if (!Schema::hasColumn('cvs', 'pendidikan')) {
            Schema::table('cvs', fn (Blueprint $table) => $table->text('pendidikan')->nullable());
        }

        if (!Schema::hasColumn('cvs', 'pengalaman')) {
            Schema::table('cvs', fn (Blueprint $table) => $table->text('pengalaman')->nullable());
        }

        if (!Schema::hasColumn('cvs', 'keahlian')) {
            Schema::table('cvs', fn (Blueprint $table) => $table->text('keahlian')->nullable());
        }

        if (!Schema::hasColumn('cvs', 'created_at')) {
            Schema::table('cvs', fn (Blueprint $table) => $table->timestamp('created_at')->nullable());
        }

        if (!Schema::hasColumn('cvs', 'updated_at')) {
            Schema::table('cvs', fn (Blueprint $table) => $table->timestamp('updated_at')->nullable());
        }
    }

    public function down(): void
    {
        // Keep existing CV data and columns when rolling back.
    }
};
