<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table    = 'status';
    protected $guarded  = array();
    #public $timestamps  = true;


    protected function getData()
    {
        return Status::select('*')->where('deleted_at','=',NULL)->get();
    }

}
