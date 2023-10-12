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
        Schema::create('member_klaim_stampel', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis
            $table->unsignedBigInteger('member_id'); // Kolom ID anggota yang mengklaim stampel
            $table->unsignedBigInteger('stampel_id'); // Kolom ID stampel yang diklaim
            $table->integer('jumlah_klaim'); // Jumlah stampel yang diklaim
            $table->timestamp('tanggal_klaim'); // Tanggal klaim dilakukan
            $table->text('keterangan')->nullable(); // Kolom keterangan (opsional)
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
        Schema::dropIfExists('member_klaim_stampel');
    }
};
