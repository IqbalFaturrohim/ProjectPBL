<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'judul', 'deskripsi', 'gambar', 'sejarah'];

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
