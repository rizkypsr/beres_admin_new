<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class banner extends Model
{
    use HasFactory;

    protected $table = 'banner';

    protected $primaryKey = 'id';

    protected $fillable = [
        'deskripsi_banner',
        'gambar_banner',

    ];
}
