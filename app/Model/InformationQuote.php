<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class InformationQuote extends Model
{
    protected $table = 'information_quote';
    public $timestamps = false;

    public function quote(){
        return $this->belongsTo('App\Model\Quote', 'quote_id', 'id');
    }
}
