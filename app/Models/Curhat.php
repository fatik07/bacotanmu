<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curhat extends Model
{
    use HasFactory;

    protected $table = 'curhats';

    protected $fillable = ['isi', 'tanggal_posting', 'jumlah_like', 'jumlah_komentar'];

    const CREATED_AT = 'tanggal_posting';

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'curhat_categories', 'curhat_id', 'category_id');
    }
}
