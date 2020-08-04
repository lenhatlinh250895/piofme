<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    public $timestamps = false;
    public function menu_child()
    {
        return $this->hasMany('App\Model\Menu', 'menu_id', 'id');
    }
}
