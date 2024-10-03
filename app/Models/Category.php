<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['name', 'warna'];

    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->warna)) {
                $model->warna = '#DF2A7C'; // Nilai default
            }
        });
    }
}
