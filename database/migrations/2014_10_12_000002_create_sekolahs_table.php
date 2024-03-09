<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sekolahs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama');
            $table->text('alamat');
            $table->string('telp');
            $table->string('email');
            $table->enum('tingkat_pendidikan', ['PAUD', 'SD', 'SMP', 'SMA']);
            $table->enum('unit', ['Utama', 'Cabang']);
            $table->foreignUuid('yayasan_id')->constrained('yayasans');
            $table->foreignUuid('kepsek_id')->nullable()->constrained('users');
            $table->foreignUuid('bendahara_id')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sekolahs');
    }
};
