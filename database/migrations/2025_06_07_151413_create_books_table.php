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
        $table->string('pengarang');
        $table->string('penerbit');
        $table->integer('tahun');
        $table->integer('stok');
        $table->string('cover')->nullable();
        $table->text('deskripsi')->nullable();
        $table->foreignId('kategori_id')->constrained('kategori')->onDelete('cascade');
        $table->timestamps();
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
