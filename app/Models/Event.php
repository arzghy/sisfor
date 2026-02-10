<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'banner',
        'event_date',
        'location',
        'registration_link',
        'status',
    ];

    protected $casts = [
        'event_date' => 'datetime',
    ];
}
