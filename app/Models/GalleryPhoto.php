<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GalleryPhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'gallery_album_id',
        'image_path',
        'caption',
    ];

    public function album()
    {
        return $this->belongsTo(GalleryAlbum::class);
    }
}
