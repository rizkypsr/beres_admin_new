<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailppob extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $table = "detailppob";
    protected $primaryKey = "id_detailppob";
    public $timestamps = false;
=======

    protected $table = 'detailppob';

    protected $primaryKey = 'id_detailppob';

    public $timestamps = false;

>>>>>>> 0943348 (initial commit)
    protected $fillable = [
        'id_ppob_detail',
        'gambar_detailppob',
        'harga_detailppob',
        'bayar_detailppob',
<<<<<<< HEAD
        
    ];
    public function ppob()
    {
        return $this->belongsTo(ppob::class, "id_ppob_detail","id_ppob");
=======

    ];

    public function ppob()
    {
        return $this->belongsTo(ppob::class, 'id_ppob_detail', 'id_ppob');
>>>>>>> 0943348 (initial commit)
    }
}
