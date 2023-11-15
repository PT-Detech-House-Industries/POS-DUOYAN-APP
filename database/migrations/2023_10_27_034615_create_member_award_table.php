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
        Schema::create('member_award', function (Blueprint $table) {
            $table->bigIncrements('id'); // Automatic ID column
            $table->string('name');
            $table->integer('point_minimum');
            $table->timestamps(); // Atribut created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_award');
    }
};
