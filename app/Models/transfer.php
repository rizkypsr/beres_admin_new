<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    protected $table = 'logtransfer';

    protected $primaryKey = 'id_tf';

    public $timestamps = false;

    protected $fillable = [
        'id_kecamatan_transfer',
        'pengirim',
        'penerima',
        'tanggal',
        'nominal',
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan_transfer', 'id_kecamatan');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'pengirim', 'id_customer')->withTrashed();
    }

    public function customerpenerima()
    {

        return $this->belongsTo(Customer::class, 'penerima', 'id_customer')->withTrashed();
    }
}
