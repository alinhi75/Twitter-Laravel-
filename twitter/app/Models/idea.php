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

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
