<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Opiniones;

class OpinionesController extends Controller
{
    //
    public function index(){
        $opiniones = Opiniones::all();
        //dd($opiniones);
        return view("paginas.opiniones", array("opiniones"=>$opiniones));
         
}
}
