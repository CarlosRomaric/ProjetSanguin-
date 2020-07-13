<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __contruct()
    {
        # code...
    }

    public function index($value='')
    {
        $data = [
            'title'=>'Bienvenu La Plateforme Univerelle de don de Saang'
        ];
        return view('main/index')->with($data);
    }
}
