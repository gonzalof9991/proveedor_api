<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('product_ticket', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->unsigned();
            $table->unsignedBigInteger('ticket_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('ticket_id')->references('id')->on('tickets');
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_ticket');
    }
};
