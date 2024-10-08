<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'image',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
        ];
    }
    public function ideas()
    {
        return $this->hasMany(Idea::class)->latest();
    }
    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }
    public function profileImage()
    {
        return $this->image ? '/storage/' . $this->image : 'https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario';
    }
    public function followers() : BelongsToMany
    {
        return $this->belongsToMany(User::class, 'follower_user', 'user_id', 'follower_id');
    }
    public function followings() : BelongsToMany
    {
        return $this->belongsToMany(User::class, 'follower_user', 'follower_id', 'user_id');
    }
    public function follow(User $user)
    {
        return $this->followings()->attach($user->id);
    }
    public function unfollow(User $user)
    {
        return $this->followings()->detach($user->id);
    }
    public function isFollowing(User $user)
    {
        return $this->followings()->where('user_id', $user->id)->exists();
    }
    public function likes()
    {
        return $this->belongsToMany(User::class, 'idea_like')->withtimestamps();
    }
    public function likedIdeas()
    {
        return $this->belongsToMany(Idea::class, 'idea_like');
    }

    public function likesIdea(Idea $idea)
    {
        return $this->likedIdeas()->where('idea_id', $idea->id)->exists();
    }


}
