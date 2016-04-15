<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;


class Tasks extends Model
{
	protected $table	= 'tasks';
    #guarded?
    protected $guarded  = array();
    #public $timestamps  = true;


    protected function getData()
    {
        return tasks::select(
            'tasks.id AS id',
            'tasks.name AS name',
            'tasks.description AS description',
            'tasks.fecha_inicio AS fecha_inicio',
            'tasks.fecha_fin AS fecha_fin',
            DB::raw(" CONCAT(users.names,' ', IFNULL(users.surnames,'')  ) AS responsable "),
            'priority.name AS prioridad'
        )
        ->leftJoin('users','tasks.responsible_id','=','users.id')
        ->leftJoin('priority','tasks.priority_id','=','priority.id')
        ->where('tasks.deleted_at','=',NULL)
        ->get();
    }
}
