<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountProduct extends Model
{
    use HasFactory;
    protected $table = 'count_products';
    protected $guarded = false;
}
