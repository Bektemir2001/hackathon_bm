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
        Schema::create('comment_videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('comment_id');
            $table->string('video');
            $table->timestamps();

            $table->index('comment_id', 'comment_video_idx');
            $table->foreign('comment_id', 'comment_video_fk')
                ->on('comments')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment_videos');
    }
};
