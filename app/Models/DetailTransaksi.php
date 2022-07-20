<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table = 't_detail_transaksi';
    
    protected $primaryKey = 'id_detail_transaksi';
    
    protected $fillable =[
        'id_barang',
        'id_transaksi', 
        'qty', 
        'jumlah_penjualan'
    ];

    public function barang()
    {
        return $this->belongsTo('App\Models\Barang', 'id_barang', 'id_barang');
    }
}
