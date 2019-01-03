<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class servisan extends Model
{
    protected $table = 'servisan';
    protected $primaryKey = 'id_servisan';
    
    public function merk(){
        return $this->belongsTo('App\Merk');
    }
    
    public function status(){
        return $this->belongsTo('App\Status');
    }
}
