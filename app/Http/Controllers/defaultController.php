<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\categories;

use App\posts;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;



class defaultController extends Controller
{
  
    

    public function index()

    { 

    	$cates = categories::all();

        $recents = posts::all();

    	$articles = posts::orderBy('created_at','desc')->paginate(3);

        return response()->json($cates);

        //return response($cates);

    	//return view('welcome')

    	//->with('cates',$cates)

    	//->with('posts',$articles)

        //->with('recents',$recents);

    }




    public function show($id)
     {

     	$post = posts::find($id);

        $cates = categories::all();

     	return view('read')->with('posts',$post)->with('cates',$cates);

        

     }




     public function trends($id)


     {
            
            $search =  posts::where('category_id',$id)->get();

            $cates = categories::all();

            return view('trends')->with('checks',$search)->with('cates',$cates);

     }




   


}
