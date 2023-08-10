<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'message',
        'writer_type',
        'writer_id',
    ];

    use HasFactory;

    public function writer()
    {
        return $this->morphTo();
    }
}
