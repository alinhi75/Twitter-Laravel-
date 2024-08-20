<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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
        'idea_id',


    ];

    protected $with = ['user:id,name,image','comments.user:id,name,image'];
    protected $withCount = ['likes'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'idea_like')->withtimestamps();
    }

    public function scopeSearch($query , $search ='')
    {
        return $query->where('content', 'like', '%' . $search . '%');
    }
}
