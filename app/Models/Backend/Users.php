<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table    = 'users';
    protected $guarded  = array();
    #public $timestamps  = true;


    protected function getData()
    {
        return Users::select('*')->where('deleted_at','=',NULL)->get();
    }

}
