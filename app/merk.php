<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class merk extends Model
{
    protected $table = 'merk';
    protected $primaryKey = 'id_merk';
    
    // public function servisan(){
    //     return $this->hasMany('App\Servisan', 'id_merk');
    // }
}
