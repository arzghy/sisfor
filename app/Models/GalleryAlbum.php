<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryAlbum extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'event_date',
        'thumbnail',
    ];

    protected $casts = [
        'event_date' => 'date',
    ];

    public function photos()
    {
        return $this->hasMany(GalleryPhoto::class);
    }
}
