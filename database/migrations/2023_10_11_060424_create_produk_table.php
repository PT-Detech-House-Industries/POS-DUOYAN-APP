<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('produk', function (Blueprint $table) {
        $table->bigIncrements('id'); // Kolom ID otomatis
        $table->string('nama')->nullable(); // Nama produk
        $table->text('deskripsi')->nullable(); // Deskripsi produk
        $table->decimal('harga', 10, 2)->nullable(); // Harga produk dengan 10 digit total dan 2 digit desimal
        $table->string('kategori')->nullable(); // Tipe data VARCHAR untuk kategori
        $table->string('foto')->nullable(); // Tipe data VARCHAR untuk foto (URL gambar)
        $table->integer('stok')->nullable(); // Stok produk
        $table->timestamp('deleted_at')->nullable();
        $table->timestamps(); // Kolom created_at dan updated_at otomatis
      }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
};
