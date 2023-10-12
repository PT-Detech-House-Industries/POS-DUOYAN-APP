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
        Schema::create('member_data_stampel', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis
            $table->unsignedBigInteger('member_id'); // Kolom ID anggota yang memiliki stampel
            $table->integer('jumlah_stampel'); // Jumlah stampel yang dimiliki anggota
            $table->timestamp('tanggal_diberikan'); // Tanggal ketika stampel diberikan
            $table->timestamp('tanggal_kadaluarsa')->nullable(); // Tanggal kadaluarsa stampel (opsional)
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
        Schema::dropIfExists('member_data_stampel');
    }
};
