<?php

namespace App\Models;

 use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "users";

    public function getFullnameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }


    public function getProfilePictureUrlAttribute()
    {
        return $this->profile_picture
            ? asset('storage/' . $this->profile_picture)
            : asset('img/default_avatar.jpg'); // Default avatar path
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'profile_picture', // Make sure profile_picture is included here
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    /*     protected $hidden = [
            'password',
            'remember_token',
        ]; */

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    /*     protected $casts = [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ]; */
}
