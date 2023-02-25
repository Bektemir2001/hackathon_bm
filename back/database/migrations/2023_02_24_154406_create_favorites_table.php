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
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->timestamps();

            $table->index('user_id', 'favorite_user_idx');
            $table->index('product_id', 'favorite_product_idx');

            $table->foreign('user_id', 'favorite_user_fk')
                ->on('users')->references('id')->cascadeOnDelete();
            $table->foreign('product_id', 'favorite_product_id')
                ->on('products')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
