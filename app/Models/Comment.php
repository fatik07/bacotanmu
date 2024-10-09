<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = ['curhat_id', 'isi', 'ghost_name', 'tanggal_komentar'];

    const CREATED_AT = 'tanggal_komentar';
}
