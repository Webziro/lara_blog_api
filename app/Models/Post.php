<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'user_id',
    ];

    // Existing relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // New example relationship (you would need a Comment model and migration)
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}