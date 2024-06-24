<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('toppage');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }


}
