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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_code')->nullable();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->integer('price')->nullable();
            $table->integer('stock')->nullable();
            $table->integer('amount')->nullable();
            $table->text('image_url')->nullable();
            $table->boolean('status')->default(true)->nullable();
            $table->boolean('is_recommended')->default(false)->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('ticket_id')->nullable();
            $table->timestamps(); // Fecha de creación / actualización
            $table->softDeletes(); // Fecha de eliminación
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
