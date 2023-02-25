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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->text('comment');
            $table->timestamps();

            $table->index('user_id', 'comment_user_idx');
            $table->index('product_id', 'comment_product_idx');

            $table->foreign('user_id', 'comment_user_fk')
                ->on('users')->references('id')->cascadeOnDelete();
            $table->foreign('product_id', 'comment_product_fk')
                ->on('products')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
