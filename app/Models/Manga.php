<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    use HasFactory;

    protected $table = 'mangas';
    protected $guarded = ['id'];

    protected $fillable = [
        'title', 'author', 'rate', 'desc','genre', 'gambar'
    ];
}
