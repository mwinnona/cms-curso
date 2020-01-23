<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    //
    public function index(){
        $blog = Blog::all(); //funcion para traer todos los registros de la tabla blog como fetch all
        return view("paginas.blog",array("blog"=>$blog));

    }
}
