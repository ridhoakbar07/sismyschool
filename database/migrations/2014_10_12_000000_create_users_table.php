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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['Admin', 'Ketua Yayasan', 'Kepala Sekolah', 'Bendahara', 'Orang Tua'])->nullable()->default('Orang Tua');
            // $table->foreignUuid('user_role_id')->nullable()->constrained('user_roles')->cascadeOnDelete();
            // $table->foreignUuid('sekolah_id')->nullable()->constrained('sekolahs')->cascadeOnDelete();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
    
};
