<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class banner extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $table = "banner";
    protected $primaryKey = "id";
=======
    protected $table = 'banner';

    protected $primaryKey = 'id';

>>>>>>> 0943348 (initial commit)
    protected $fillable = [
        'deskripsi_banner',
        'gambar_banner',

    ];
}
