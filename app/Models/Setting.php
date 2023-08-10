<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable=[
        'key',
        'value',
        'image',
    ];

    public static function setMany($data)
    {
        foreach ($data as $key => $value) {
            Self::set($key, $value);
        }
    }

    public static function set($key, $value)
    {
        if (is_array($value)) {
            $value = json_encode($value);
        }
        if ($key == 'logo_ar' || $key == 'logo_en' || $key == 'fav_icon') {
            $img_name = time() . uniqid() . '.' . $value->getClientOriginalExtension();
            $value->move(public_path('/uploads/Settings/'), $img_name);
            $value = $img_name;
        }
        Self::updateOrCreate(['key' => $key], ['value' => $value]);
    }
}
