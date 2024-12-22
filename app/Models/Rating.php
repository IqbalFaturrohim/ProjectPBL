<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['name', 'rating', 'comment', 'article_id', 'rating'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
