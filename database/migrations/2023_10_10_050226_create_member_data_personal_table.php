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
        Schema::create('member_data_personal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('member_id')->nullable();
            $table->date('birthday')->nullable();
            $table->string('age')->nullable();
            $table->string('gender')->nullable(); // jenis kelamin
            $table->string('geographic_location')->nullable(); // lokasi geografi
            $table->string('education')->nullable(); // pendidikan 
            $table->string('income')->nullable(); // penghasilan
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('member_data_personal');
    }
};
