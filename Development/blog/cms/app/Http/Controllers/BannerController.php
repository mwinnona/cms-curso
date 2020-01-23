<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
class BannerController extends Controller
{
    //
    public function index(){
        $banner = Banner::all();
        
        return view("paginas.banner", array("banner"=>$banner));
         
}
}
