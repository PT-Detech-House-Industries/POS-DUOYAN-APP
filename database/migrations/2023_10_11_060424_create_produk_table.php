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
            $table->id(); // Kolom ID otomatis
            $table->string('nama_produk'); // Nama produk
            $table->text('deskripsi'); // Deskripsi produk
            $table->decimal('harga', 10, 2); // Harga produk dengan 10 digit total dan 2 digit desimal
            $table->integer('stok'); // Stok produk
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
