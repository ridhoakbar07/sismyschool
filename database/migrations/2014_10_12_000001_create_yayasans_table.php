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
        Schema::create('yayasans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama');
            $table->date('tanggal_pendirian');
            $table->text('alamat');
            $table->string('telp');
            $table->string('email');
            $table->text('visi_misi');
            $table->string('no_status_hukum');
            $table->foreignUuid('pimpinan_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yayasans');
    }
};
