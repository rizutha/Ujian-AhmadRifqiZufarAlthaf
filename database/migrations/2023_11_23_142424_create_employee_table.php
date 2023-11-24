<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->date('tgl_lahir');
            $table->string('telepon', 20);
            $table->string('gender', 1);
            $table->string('pendidikan', 20);
            $table->string('unit_kerja', 30);
            $table->string('jabatan', 30);
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};
