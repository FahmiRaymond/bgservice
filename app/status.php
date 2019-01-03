<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    protected $table = 'status';
    protected $primaryKey = 'id_status';

    public function servisan(){
        return $this->hasMany('App\Servisan', 'id_status');
    }
}
