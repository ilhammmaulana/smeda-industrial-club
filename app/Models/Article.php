<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'articles';
    protected $fillable = ['subject', 'image'];


    public function contentAttribute()
    {
        return $this->hasOne(ArticleAttribute::class, 'article_id', 'id');
    }
}
