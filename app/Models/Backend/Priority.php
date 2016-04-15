<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    protected $table    = 'priority';
    #guarded?
    protected $guarded  = array();
    #public $timestamps  = true;


    protected function getData()
    {
        return Priority::select('*')->where('deleted_at','=',NULL)->get();
    }
}
