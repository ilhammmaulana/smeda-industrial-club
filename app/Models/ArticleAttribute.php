<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ArticleAttribute extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'article_attributes';

    protected $fillable = ['content_id', 'header', 'body', 'footer'];

    public function content()
    {
        return $this->belongsTo(Article::class, 'content_id', 'id');
    }
}

