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
        Schema::create('questionnaires', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('name');
            $table->string('usia');
            $table->string('jenis_kelamin');
            $table->string('jurusan');
            $table->string('angkatan');
            $table->string('email');
            $table->string('no_hp');
            $table->text('domisili');
            $table->string('layanan');
            $table->text('keluhan');
            $table->date('tanggal_konseling');
            $table->string('waktu_konseling');
            $table->string('psikolog');
            $table->timestamp('submitted_at')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('admin_message')->nullable();
            $table->text('feedback')->nullable();
            $table->integer('rating')->nullable();
            $table->text('ulasan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questionnaires');
    }
};
