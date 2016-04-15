<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
# depedencias
use App\Models\Backend\Priority;

# para más información de facades puedes consultar el siguiente link
# https://laravel.com/docs/master/facades
# DB nos permite utilizar transacciones
use DB;
# Auth nos permite utiilizar la variable de session en el controlador
use Auth;

class PriorityController extends Controller
{
    protected function index()
    {
        $data['data'] = Priority::getData();
        return view('backend.priority.index',$data);
    }

    protected function create()
    {
        return view('backend.priority.create');
    }

    protected function update($id)
    {
        $data['data']   = Priority::find($id);
        return view('backend.priority.update',$data);
    }

    protected function actions()
    {
        $action = request()->input('action');
        # a cual hace referencia si es para el update?
        $id     = request()->input('id');

        # arreglo para crear un elemento y así mismo para actualizarlo
        $data   = array(
            'name'              => request()->input('name'),
            'priority'       => request()->input('priority'),
            'color'             => request()->input('color')
        );

        # empieza el insert
        if( $action == 'create' ):
            $data['users_id']   =  Auth::user()->id;

            DB::beginTransaction();
            try{
                # para saber más sobre los metodos de eloquent puedes consultar la documentación
                # https://laravel.com/docs/master/eloquent
                $dataInsert         = Priority::firstOrCreate($data);
                # que data?
                $response['data']   = Priority::find($dataInsert->id);
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
        	#Update el id de inicio de sesión en la BD
            $data['users_id_update'] =  Auth::user()->id;
            DB::beginTransaction();
            try{
                # para saber más sobre los metodos de eloquent puedes consultar la documentación
                # https://laravel.com/docs/master/eloquent
                Priority::where('id',$id)->update($data);
                $response['data']   = Priority::find($id);
                $response['action'] = 'update';
                DB::commit();
            }catch(\Exception $e){
                $response['error']  = $e->errorInfo[2];
                $response['action'] = 'Error de Transacción';
                DB::rollback();
            }
        endif;
        # termina el update y caputaramos los errores

        return view('backend.priority.actions',$response);

    }

    protected function delete($id)
    {

        DB::beginTransaction();
        try{
            # para saber más sobre los metodos de eloquent puedes consultar la documentación
            # https://laravel.com/docs/master/eloquent
            Priority::where('id',$id)->update(array(
                'users_id_delete'   => Auth::user()->id,
                'deleted_at'        => date('Y-m-d H:i:s')
            ));
            $response['data']   = Priority::find($id);
            $response['action'] = 'delete';
            DB::commit();
        }catch(\Exception $e){
            $response['error']  = $e->errorInfo[2];
            $response['action'] = 'Error de Transacción';
            DB::rollback();
        }

        return view('backend.priority.actions',$response);
    }
}
