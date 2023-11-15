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
        Schema::create('member', function (Blueprint $table) {
            $table->bigIncrements('id'); // Automatic ID column
            $table->unsignedBigInteger('user_id')->nullable(); // User ID associated with the member
            $table->string('name')->nullable(); // Name of the member
            $table->string('number_member')->nullable(); // Name of the member
            $table->string('whatsapp_number')->nullable(); // WhatsApp number of the member
            $table->timestamp('deleted_at')->nullable();
            // $table->integer('purchases')->default(0); // Number of purchases (if applicable)
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')->on('users')
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
        Schema::dropIfExists('member');
    }
};
