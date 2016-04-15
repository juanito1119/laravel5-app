<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
# depedencias
use App\Models\Backend\pagination;

# para más información de facades puedes consultar el siguiente link
# https://laravel.com/docs/master/facades
# DB nos permite utilizar transacciones
use DB;
# Auth nos permite utiilizar la variable de session en el controlador
use Auth;

class PaginationController extends Controller
{
    protected function index()
    {
    	#Pagination?
        $data['data'] = Pagination::getData();
        return view('backend.pagination.index',$data);
    }

    protected function create()
    {
        return view('backend.pagination.create');
    }

    protected function update($id)
    {
        $data['data']   = Pagination::find($id);
        return view('backend.pagination.update',$data);
    }

    #Acciones
    protected function actions()
    {
        $action = request()->input('action');
        $id     = request()->input('id');

        # arreglo para crear un elemento y así mismo para actualizarlo
        $data   = array(
            'name'              => request()->input('name'),
            'pagination'        => request()->input('pagination'),
            'color'             => request()->input('color')
        );

        # empieza el insert
        if( $action == 'create' ):
            $data['users_id']   =  Auth::user()->id;

            DB::beginTransaction();
            try{
                # para saber más sobre los metodos de eloquent puedes consultar la documentación
                # https://laravel.com/docs/master/eloquent
                $dataInsert         = Pagination::firstOrCreate($data);
                $response['data']   = Pagination::find($dataInsert->id);
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
                Pagination::where('id',$id)->update($data);
                #?
                $response['data']   = Pagination::find($id);
                $response['action'] = 'update';
                DB::commit();
            }catch(\Exception $e){
                $response['error']  = $e->errorInfo[2];
                $response['action'] = 'Error de Transacción';
                DB::rollback();
            }
        endif;
        # termina el update y caputaramos los errores

        return view('backend.pagination.actions',$response);

    }

    protected function delete($id)
    {

        DB::beginTransaction();
        try{
            # para saber más sobre los metodos de eloquent puedes consultar la documentación
            # https://laravel.com/docs/master/eloquent
            Pagination::where('id',$id)->update(array(
                'users_id_delete'   => Auth::user()->id,
                'deleted_at'        => date('Y-m-d H:i:s')
            ));
            $response['data']   = Pagination::find($id);
            $response['action'] = 'delete';
            DB::commit();
        }catch(\Exception $e){
            $response['error']  = $e->errorInfo[2];
            $response['action'] = 'Error de Transacción';
            DB::rollback();
        }

        return view('backend.pagination.actions',$response);
    }

}