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
      Schema::create('member_claim_stample', function (Blueprint $table) {
        $table->bigIncrements('id'); // Kolom ID otomatis
        $table->unsignedBigInteger('member_id')->nullable();
        $table->unsignedBigInteger('product_id')->nullable();
        $table->date('claim_date')->nullable();
        $table->enum('status_claim', ['belum', 'sudah']);
        $table->integer('periode_claim')->nullable();
        $table->timestamp('deleted_at')->nullable();
        $table->timestamps(); // Kolom created_at dan updated_at otomatis
        
        // $table->bigIncrements('id'); // Kolom ID otomatis
        // $table->unsignedBigInteger('member_stample_id')->nullable(); // Member's stample ID yang diklaim
        // $table->integer('purchase_card_number')->nullable();
        // $table->date('claim_date')->nullable(); // Tanggal klaim
        // $table->timestamp('deleted_at')->nullable();
        // $table->timestamps(); // Kolom created_at dan updated_at otomatis

        $table->foreign('member_id')
          ->references('id')->on('member')
          ->onUpdate('cascade')
          ->onDelete('cascade');

        $table->foreign('product_id')
          ->references('id')->on('product')
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
        Schema::dropIfExists('member_claim_stample');
    }
};
