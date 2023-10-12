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
        Schema::create('member_noted_award', function (Blueprint $table) {
          $table->bigIncrements('id'); // Kolom ID otomatis  
          $table->unsignedBigInteger('member_id')->nullable(); // Kolom untuk mengaitkan dengan anggota (member) tertentu
          $table->unsignedBigInteger('award_id')->nullable();
          $table->string('award_name')->nullable(); // Nama penghargaan
          $table->text('description')->nullable(); // Deskripsi penghargaan (opsional)
          $table->date('award_date')->nullable(); // Tanggal diterimanya penghargaan
          $table->timestamp('deleted_at')->nullable();
          $table->timestamps();

          $table->foreign('member_id')
            ->references('id')->on('member')
            ->onUpdate('cascade')
            ->onDelete('cascade');

          $table->foreign('award_id')
            ->references('id')->on('member_data_award')
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
        Schema::dropIfExists('member_noted_award');
    }
};
