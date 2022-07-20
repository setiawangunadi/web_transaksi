<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = "t_transaksi";

    protected $primaryKey = "id_transaksi";

    protected $fillable =[
        'cara_pembayaran',
        'total_pembayaran',
        'tanggal_pembayaran'
    ];
    
    public function detailTransaksi()
    {
        return $this->hasMany('App\Models\DetailTransaksi', 'id_transaksi', 'id_transaksi');
    }
}
