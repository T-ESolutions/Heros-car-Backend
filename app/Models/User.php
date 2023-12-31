<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'rate',
        'image',
        'social_id',
        'social_type',
        'active',
        'suspend',
        'fcm_token',
        'email_verified_at',
        'fcm_token',
        'gender'
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        if (!empty($password)) {
            $this->attributes['password'] = bcrypt($password);
        }
    }


    public function getImageAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/users') . '/' . $image;
        }
        return asset('uploads/default.jpg');
    }

    public function setImageAttribute($image)
    {
        $img_name =  uniqid() . '_' . time() . random_int(0000, 9999) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('/uploads/users/'), $img_name);
        $this->attributes['image'] = $img_name;
//        if (is_file($image)) {
//            $img_name = upload($image, 'users');
//            $this->attributes['image'] = $img_name;
//        } else {
//            $this->attributes['image'] = $image;
//        }
    }

    public function getJWTIdentifier()
    {
        // Implement getJWTIdentifier() method.
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        // Implement getJWTCustomClaims() method.
        return [];
    }
}
