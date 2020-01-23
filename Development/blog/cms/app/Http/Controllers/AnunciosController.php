<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anuncios;

class AnunciosController extends Controller
{
    //
    public function index(){
        $anuncios = Anuncios::all();
       // dd($anuncios);
        return view("paginas.anuncios", array("anuncios"=>$anuncios));
         
}
}
