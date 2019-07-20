<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\posts;

use DB;

class apiController extends Controller
{
   
   public function index()
   
   {
       


    $posts = posts::all();

    return "ok";

   }




}
