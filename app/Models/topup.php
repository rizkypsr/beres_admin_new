<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class topup extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $table = "logtopup";
    protected $primaryKey = "id_topup";
    public $timestamps = false;
=======

    protected $table = 'logtopup';

    protected $primaryKey = 'id_topup';

    public $timestamps = false;

>>>>>>> 0943348 (initial commit)
    protected $fillable = [
        'nama_customer_topup',
        'id_kecamatan_topup',
        'tanggal_topup',
        'nominal_topup',
        'total_saldo_topup',
<<<<<<< HEAD
        
    ];
    public function kecamatan()
    {
        return $this->belongsTo(kecamatan::class, "id_kecamatan_topup","id_kecamatan");
=======

    ];

    public function kecamatan()
    {
        return $this->belongsTo(kecamatan::class, 'id_kecamatan_topup', 'id_kecamatan');
>>>>>>> 0943348 (initial commit)
    }
}
