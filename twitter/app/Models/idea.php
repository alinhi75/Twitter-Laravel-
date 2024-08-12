<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int,string>
     */

    protected $fillable = [
        'user_id',
        'content',
        'Likes',

    ];

    protected $with = ['user:id,name,image','comments.user:id,name,image'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function LikedIdeas()
    {
        return $this->belongsToMany(Idea::class, 'idea_like')->withtimestamps();
    }
}
