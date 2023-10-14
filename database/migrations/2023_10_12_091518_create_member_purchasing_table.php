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
      Schema::create('member_purchasing', function (Blueprint $table) {
        $table->bigIncrements('id'); // Kolom ID otomatis
        $table->unsignedBigInteger('member_id'); // Kolom untuk mengaitkan dengan anggota (member) tertentu
        $table->string('product_name')->nullable(); // Nama produk yang dibeli
        $table->decimal('total_price', 10, 2)->nullable(); // Harga total dengan 10 digit total dan 2 digit desimal
        $table->date('purchase_date')->nullable(); // Tanggal pembelian
        $table->timestamp('deleted_at')->nullable();
        $table->timestamps(); // Kolom created_at dan updated_at otomatis
    
        // Definisikan indeks dan kunci asing jika diperlukan
        $table->foreign('member_id')
          ->references('id')->on('member')
          ->onUpdate('cascade')
          ->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_purchasing');
    }
};
