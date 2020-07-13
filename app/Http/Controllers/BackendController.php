<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function __construct($value='')
    {
        # code...
    }

    public function index()
    {
       $data = [
           'title'=>'administration'
       ];
       return view('backend/home')->with($data);
    }
}
