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
        Schema::create('pos_terimas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_pos');
            $table->double('biaya');
            $table->foreignUuid('unit_id')->nullable()->constrained('units');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pos_terimas');
    }
};
