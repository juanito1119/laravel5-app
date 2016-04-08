<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
# dependencias
use App\User;


class UsersController extends Controller
{

    protected function index()
    {
        $data['data']   = User::all();
        return view('backend.users.index',$data);
    }

    protected function create()
    {
        return view('backend.user.create');
    }
}
