<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'trip_number',
        'driver_id',
        'department_id',
        'driver_car_id',
        'brand_id',
        'modell_id',
        'color_id',
        'price_per_person',
        'trip_date',
        'trip_time_from',
        'trip_time_to',
        'chairs',
        'air_cond',
        'bags',
        'from_lat',
        'from_lng',
        'from_address_ar',
        'from_address_en',
        'to_lat',
        'to_lng',
        'to_address_ar',
        'to_address_en',
        'end_lat',
        'end_lng',
        'end_address_ar',
        'end_address_en',
        'started_at',
        'finished_at',
        'cancelled_at',
        'cancel_reason',
    ];

    protected $appends = ['brand_name', 'modell_name', 'color_name', 'booked_chairs', 'available_chairs', 'from_address', 'to_address'];

    public function getBookedChairsAttribute()
    {
        return TripRequest::where('trip_id', $this->id)
            ->whereNotNull('accept_at')
            ->whereNull('reject_at')
            ->whereNull('user_cancel_at')
            ->count('chairs');
    }


    public function getToAddressAttribute()
    {
        if (request()->header('lang') == 'en')
            return $this->to_address_en;
        return $this->to_address_ar;
    }

    public function getFromAddressAttribute()
    {
        if (request()->header('lang') == 'en')
            return $this->from_address_en;
        return $this->from_address_ar;
    }

    public function getAvailableChairsAttribute()
    {
        return $this->chairs - $this->booked_chairs;
    }

    public function getBrandNameAttribute()
    {
        if (request()->header('lang') == 'en')
            return $this->brand()->first()->title_en;
        return $this->brand()->first()->title_ar;
    }

    public function getModellNameAttribute()
    {
        if (request()->header('lang') == 'en')
            return $this->modell()->first()->title_en;
        return $this->modell()->first()->title_ar;
    }

    public function getColorNameAttribute()
    {
        if (request()->header('lang') == 'en')
            return $this->color()->first()->title_en;
        return $this->color()->first()->title_ar;
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function modell()
    {
        return $this->belongsTo(Modell::class, 'modell_id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
