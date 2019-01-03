<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sparepart extends Model
{   
    protected $table = 'sparepart';
    protected $primaryKey = 'id_sparepart';
    // protected $fillable = ['nama_barang','qty','harga','total'];
}
