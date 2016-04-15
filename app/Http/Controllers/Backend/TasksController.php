<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
# Dependecias
use App\Models\Backend\Tasks;
use App\Models\Backend\Priority;
use App\User;
# para más información de facades puedes consultar el siguiente link
# https://laravel.com/docs/master/facades
# DB nos permite utilizar transacciones
use DB;
# Auth nos permite utiilizar la variable de session en el controlador
use Auth;

class TasksController extends Controller
{
    protected function index()
    {
        $data['data'] = Tasks::getData();
        return view('backend.tasks.index',$data);
    }

    protected function create()
    {
        $data['user']       =  User::all();
        $data['priority']   =  Priority::all();
        return view('backend.tasks.create',$data);
    }

    protected function update($id)
    {
        $data['user']       =  User::all();
        $data['data']       =  Tasks::find($id);
        $data['priority']   =  Priority::all();
        return view('backend.tasks.update',$data);
    }

    protected function actions()
    {
        $action = request()->input('action');
        $id     = request()->input('id');

        # arreglo para crear un elemento y así mismo para actualizarlo
        # link moment http://momentjs.com/
        # link datetimepicker https://eonasdan.github.io/bootstrap-datetimepicker/#custom-formats
        # https://www.digitalocean.com/pricing/ servidor de pruebas o producción

        $data   = array(
            'responsible_id'    => request()->input('responsible_id'),
            'priority_id'       => request()->input('priority_id'),
            'name'              => request()->input('name'),
            'description'       => request()->input('description'),
            'fecha_inicio'      => $this->dateFormatDD(request()->input('fecha_inicio')),
            'fecha_fin'         => $this->dateFormatDD(request()->input('fecha_fin'))
        );

        # empieza el insert
        if( $action == 'create' ):
            $data['users_id']   =  Auth::user()->id;

            DB::beginTransaction();
            try{
                # para saber más sobre los metodos de eloquent puedes consultar la documentación
                # https://laravel.com/docs/master/eloquent
                $dataInsert         = Tasks::firstOrCreate($data);
                $response['data']   = Tasks::find($dataInsert->id);
                $response['action'] = 'create';
                DB::commit();
            }catch(\Exception $e){
                $response['error']  = $e->errorInfo[2];
                $response['action'] = 'Error de Transacción';
                DB::rollback();
            }
        endif;
        # termina el insert y caputaramos los errores

        # empieza el update
        if( $action == 'update' ):

            $data['users_id_update'] =  Auth::user()->id;
            DB::beginTransaction();
            try{
                # para saber más sobre los metodos de eloquent puedes consultar la documentación
                # https://laravel.com/docs/master/eloquent
                Tasks::where('id',$id)->update($data);
                $response['data']   = Tasks::find($id);
                $response['action'] = 'update';
                DB::commit();
            }catch(\Exception $e){
                $response['error']  = $e->errorInfo[2];
                $response['action'] = 'Error de Transacción';
                DB::rollback();
            }
        endif;
        # termina el update y caputaramos los errores

        return view('backend.tasks.actions',$response);

    }

    protected function delete($id)
    {

        DB::beginTransaction();
        try{
            # para saber más sobre los metodos de eloquent puedes consultar la documentación
            # https://laravel.com/docs/master/eloquent
            Tasks::where('id',$id)->update(array(
                'users_id_delete'   => Auth::user()->id,
                'deleted_at'        => date('Y-m-d H:i:s')
            ));
            $response['data']   = Tasks::find($id);
            $response['action'] = 'delete';
            DB::commit();
        }catch(\Exception $e){
            $response['error']  = $e->errorInfo[2];
            $response['action'] = 'Error de Transacción';
            DB::rollback();
        }

        return view('backend.tasks.actions',$response);
    }
}
