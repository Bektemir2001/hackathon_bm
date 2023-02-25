<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ordered_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('size_id');
            $table->integer('count');
            $table->timestamps();


            $table->index('product_id', 'order_product_idx');
            $table->index('order_id', 'order_order_idx');
            $table->index('color_id', 'order_color_idx');
            $table->index('size_id', 'order_size_idx');


            $table->foreign('product_id', 'order_product_fk')
                ->on('products')->references('id')->cascadeOnDelete();
            $table->foreign('order_id', 'order_order_fk')
                ->on('orders')->references('id')->cascadeOnDelete();
            $table->foreign('color_id', 'order_color_fk')
                ->on('colors')->references('id')->cascadeOnDelete();
            $table->foreign('size_id', 'order_size_fk')
                ->on('sizes')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordered_products');
    }
};
