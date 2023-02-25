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
        Schema::create('basket_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('basket_id');
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('size_id');
            $table->integer('count');
            $table->timestamps();

            $table->index('product_id', 'basket_product_idx');
            $table->index('basket_id', 'basket_basket_idx');
            $table->index('color_id', 'basket_color_idx');
            $table->index('size_id', 'basket_size_idx');


            $table->foreign('product_id', 'basket_product_fk')
                ->on('products')->references('id')->cascadeOnDelete();
            $table->foreign('basket_id', 'basket_order_fk')
                ->on('baskets')->references('id')->cascadeOnDelete();
            $table->foreign('color_id', 'basket_color_fk')
                ->on('colors')->references('id')->cascadeOnDelete();
            $table->foreign('size_id', 'basket_size_fk')
                ->on('sizes')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basket_products');
    }
};
