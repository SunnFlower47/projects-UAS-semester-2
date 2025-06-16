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
    Schema::create('books', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->string('genre')->nullable();
        $table->string('pengarang');
        $table->string('penerbit');
        $table->string('publication_place')->nullable();
        $table->string('isbn')->unique()->nullable();
        $table->integer('tahun');
        $table->integer('jumlah_halaman')->nullable();
        $table->string('lokasi_rak')->nullable();
        $table->string('bahasa')->default('indonesia');
        $table->integer('stok');
        $table->string('cover')->nullable();
        $table->text('deskripsi')->nullable();
        $table->foreignId('kategori_id')->constrained('kategori')->onDelete('cascade');
        $table->timestamps();
        $table->softDeletes();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
