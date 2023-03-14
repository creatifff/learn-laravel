<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'short_text',
        'image_path',
        'view_count',
        'is_published',
        'author_id',
    ];

    // Получения пользователя привязанного к статье
    public function author() {
        return $this->hasOne(User::class, 'id', 'author_id')->first();
    }

    //    Статья имеет много комментариев
    public function comments() {
        return $this->hasMany(Comment::class, 'article_id', 'id')->get();
    }

    public function getImageUrlAttribute() {
        return url(Storage::url($this->image_path));
    }
}
