<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Driver extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'parent_id',
        'name',
        'email',
        'phone',
        'password',
        'image',
        'driver_licence_image',
        'id_number',
        'gender',
        'fcm_token',
        'rate',
        'active',
        'suspend',
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

    protected $appends = ['message'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getMessageAttribute()
    {
        if (\app()->getLocale() == "ar") {
            return $this->message_ar;
        } else {
            return $this->message_en;
        }
    }

    public function setPasswordAttribute($password)
    {
        if (!empty($password)) {
            $this->attributes['password'] = bcrypt($password);
        }
    }


    public function getImageAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/drivers') . '/' . $image;
        }
        return asset('defaults/user_default.png');
    }

    public function setImageAttribute($image)
    {
        if (is_file($image)) {
            $img_name = upload($image, 'drivers');
            $this->attributes['image'] = $img_name;
        } else {
            $this->attributes['image'] = $image;
        }
    }

    public function getDriverLicenceImageAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/driver_licences') . '/' . $image;
        }
        return asset('defaults/default_driver_license.png');
    }

    public function setDriverLicenceImageAttribute($image)
    {
        if (is_file($image)) {
            $img_name = upload($image, 'driver_licences');
            $this->attributes['driver_licence_image'] = $img_name;
        } else {
            $this->attributes['driver_licence_image'] = $image;
        }
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

    public function driverCar(){
        return $this->hasOne(DriverCar::class,'driver_id');
    }

    public function approvedDriverCar(){
        return $this->hasOne(DriverCar::class,'driver_id')
            ->where('approved',1);
    }
}
