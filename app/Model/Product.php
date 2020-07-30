<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $table = 'product';

    public function service(){
        return $this->belongsTo('App\Model\Service', 'service_id', 'id');
    }
}
