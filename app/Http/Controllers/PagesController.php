<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //welcome
    public function welcome()
    {
        return view ('welcome');
    }

    //about
    public function about()
    {
        return view ('about');
    }

    public function service()
    {
        return view ('services');
    }
}
