<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Blog;

class AdministradoresController extends Controller
{
    //
        public function index(){
            $users = Users::all();
            
            return view("paginas.administradores", array("users"=>$users));
             
    }
}
