<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'title',
        'image_url',
        'content',
        'views',
        'slug'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
