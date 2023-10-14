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
          $table->bigIncrements('id'); // Kolom ID otomatis
          $table->string('name')->nullable(); // Tambahkan kolom 'name' dengan tipe data string
          $table->integer('age')->nullable(); // Tambahkan kolom 'age' dengan tipe data integer
          $table->text('address')->nullable(); // Tambahkan kolom 'address' dengan tipe data text
          $table->timestamp('deleted_at')->nullable();
          $table->timestamps();
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
