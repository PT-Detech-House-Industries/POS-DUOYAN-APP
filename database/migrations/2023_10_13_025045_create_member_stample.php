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
        Schema::create('member_stample', function (Blueprint $table) {
          $table->bigIncrements('id'); // Automatic ID column
          $table->unsignedBigInteger('member_id'); // Member's purchase ID
          $table->unsignedBigInteger('member_purchasing_id'); // Member's purchase ID
          $table->unsignedBigInteger('member_claim_stample_id')->nullable(); // Member's purchase ID
          // $table->integer('quantity_purchased')->nullable(); // Quantity purchased
          // $table->date('purchase_date')->nullable(); // Purchase date
          // $table->integer('purchase_card_number')->nullable(); // Purchase card number
          // $table->string('stample_card')->nullable(); // Stample card (if applicable)
          $table->timestamp('deleted_at')->nullable();
          $table->timestamps();

          $table->foreign('member_purchasing_id')
            ->references('id')->on('member_purchasing')
            ->onUpdate('cascade')
            ->onDelete('cascade');
          
          $table->foreign('member_id')
            ->references('id')->on('member')
            ->onUpdate('cascade')
            ->onDelete('cascade');

          $table->foreign('member_claim_stample_id')
            ->references('id')->on('member_claim_stample')
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
        Schema::dropIfExists('member_stample');
    }
};
