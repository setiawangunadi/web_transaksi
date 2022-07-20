<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = "t_barang";
    protected $primaryKey = "id_barang";
    protected $fillable =[
        'id_barang','nama_barang', 'harga_barang', 'stok_barang'
    ];

    static function list_produk(){
        $data = Produk::all();
        return $data;
    }
}
