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
      Schema::create('member_data_award', function (Blueprint $table) {
        $table->bigIncrements('id'); // Kolom ID otomatis
        // $table->unsignedBigInteger('member_id')->nullable(); // Kolom untuk mengaitkan dengan anggota (member) tertentu
        $table->string('award_name')->nullable(); // Nama penghargaan
        $table->text('description')->nullable(); // Deskripsi penghargaan (opsional)
        $table->date('award_date')->nullable(); // Tanggal diterimanya penghargaan
        $table->timestamp('deleted_at')->nullable();
        $table->timestamps(); // Kolom created_at dan updated_at otomatis
    
        // Definisikan indeks dan kunci asing jika diperlukan
        // $table->foreign('member_id')
        //   ->references('id')->on('member')
        //   ->onUpdate('cascade')
        //   ->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_data_award');
    }
};
