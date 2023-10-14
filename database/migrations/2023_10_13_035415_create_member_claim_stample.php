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
        $table->bigIncrements('id');
        $table->string('claim_type')->nullable(); // Tambahkan kolom 'claim_type' dengan tipe data string
        $table->decimal('amount', 10, 2)->nullable(); // Tambahkan kolom 'amount' dengan tipe data decimal
        $table->date('claim_date')->nullable(); // Tambahkan kolom 'claim_date' dengan tipe data date
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
        Schema::dropIfExists('member_claim_stample');
    }
};
