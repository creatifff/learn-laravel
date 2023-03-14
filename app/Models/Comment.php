<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'user_id',
        'article_id'
    ];

    // один ко одному
    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id')->first();
    }
}
