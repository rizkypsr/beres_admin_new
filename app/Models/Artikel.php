<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $table = "artikel";
=======
    protected $table = 'artikel';
>>>>>>> 0943348 (initial commit)

    protected $guarded = [];

    public function artikel_images()
    {
        return $this->hasMany(ArtikelImage::class);
    }
}
