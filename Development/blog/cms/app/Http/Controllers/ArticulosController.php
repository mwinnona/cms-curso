<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulos;
class ArticulosController extends Controller
{
    //
    public function index(){
        $articulos = Articulos::all();
        
        return view("paginas.articulos", array("articulos"=>$articulos));
         
}
}
