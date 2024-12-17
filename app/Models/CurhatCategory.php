<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurhatCategory extends Model
{
    use HasFactory;

    protected $table = 'curhat_categories';

    protected $fillable = ['curhat_id', 'category_id'];
}
