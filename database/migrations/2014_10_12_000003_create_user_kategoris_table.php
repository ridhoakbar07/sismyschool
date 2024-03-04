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
        Schema::create('user_kategoris', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->enum('kategori', ['Pimpinan', 'Bendahara', 'Orang Tua', 'Programmer']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_kategoris');
    }
};
