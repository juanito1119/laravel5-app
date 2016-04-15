<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Pagination extends Model
{
    protected $table    = 'pagination';
    #guarded?
    protected $guarded  = array();
    #public $timestamps  = true;


    protected function getData()
    {
        return Pagination::select('*')->where('deleted_at','=',NULL)->get();
    }
}
