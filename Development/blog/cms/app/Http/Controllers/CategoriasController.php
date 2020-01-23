<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorias;
class CategoriasController extends Controller
{
    //
    public function index(){
        $categorias = Categorias::all();
        
        return view("paginas.categorias", array("categorias"=>$categorias));
         
}
}
