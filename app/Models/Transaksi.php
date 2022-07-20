<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = "t_transaksi";
    protected $primaryKey = "id_transaksi";
    protected $fillable =[
        'tanggal_transaksi'
    ];
}
