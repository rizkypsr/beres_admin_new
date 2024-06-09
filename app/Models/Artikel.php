<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikel';

    protected $guarded = [];

    public function artikel_images()
    {
        return $this->hasMany(ArtikelImage::class);
    }
}
