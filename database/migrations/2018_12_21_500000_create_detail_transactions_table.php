<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transactions', function (Blueprint $table) {
            $table->unsignedInteger('header_id');
            $table->foreign('header_id')->references('id')->on('header_transactions')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('phone_id');
            $table->foreign('phone_id')->references('id')->on('phones')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('qty');
            $table->primary(['header_id', 'phone_id']);
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
        Schema::dropIfExists('detail_transactions');
    }
}
