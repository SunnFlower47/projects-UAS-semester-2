<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('pinjaman', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        $table->foreignId('book_id')->constrained('books')->onDelete('cascade');
        $table->date('tanggal_pinjam')->nullable();
        $table->date('tanggal_kembali')->nullable();
        $table->date('tanggal_kembali_asli')->nullable();
        $table->string('status')->comment('dipinjam / dikembalikan / terlambat')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjaman');
    }
};
