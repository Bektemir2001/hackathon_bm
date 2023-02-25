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
        Schema::create('count_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('size_id');
            $table->string('image');
            $table->integer('count');
            $table->timestamps();

            $table->index('product_id', 'count_product_idx');
            $table->index('color_id', 'count_color_idx');
            $table->index('size_id', 'count_size_idx');

            $table->foreign('product_id', 'count_product_fk')
                ->on('products')->references('id')->cascadeOnDelete();
            $table->foreign('color_id', 'count_color_fk')
                ->on('colors')->references('id')->cascadeOnDelete();
            $table->foreign('size_id', 'count_size_fk')
                ->on('sizes')->references('id')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('count_products');
    }
};
