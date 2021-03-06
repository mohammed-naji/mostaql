<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'type',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }

    public function messagesin()
    {
        return $this->hasMany(Message::class, 'reciver_id');
    }

    public function messagesout()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'user_skills');
    }
}
