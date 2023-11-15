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
        Schema::create('member_award_record', function (Blueprint $table) {
            $table->bigIncrements('id'); // Automatic ID column
            $table->unsignedBigInteger('member_award_id');
            $table->unsignedBigInteger('member_id');
            $table->timestamps();

            $table->foreign('member_award_id')
            ->references('id')->on('member_award')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('member_id')
            ->references('id')->on('member')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            // $table->foreign('member_award_id')->references('id')->on('member_award');
            // $table->foreign('member_id')->references('id')->on('members');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_award_record');
    }
};
