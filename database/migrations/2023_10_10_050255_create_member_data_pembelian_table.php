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
        Schema::create('member_data_pembelian', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis
            $table->unsignedBigInteger('member_id'); // Contoh: kolom ID anggota yang melakukan pembelian
            $table->string('nomor_invoice')->unique(); // Contoh: nomor unik untuk setiap pembelian
            $table->decimal('total_pembelian', 10, 2); // Contoh: total pembelian dengan 10 digit total dan 2 digit desimal
            $table->text('keterangan')->nullable(); // Contoh: kolom keterangan (opsional)
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
        Schema::dropIfExists('member_data_pembelian');
    }
};
