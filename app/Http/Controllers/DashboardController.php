<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DashboardController extends Controller
{

    protected function index()
    {
        return view('dashboard');
    }

}
