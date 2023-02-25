<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentVideo extends Model
{
    use HasFactory;
    protected $table = 'comment_videos';
    protected $guarded = false;
}
