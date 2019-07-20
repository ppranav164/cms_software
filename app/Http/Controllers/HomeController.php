<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

use Validator;

use App\categories;

use App\posts;

use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {     

        $cates = categories::all();

        $articles = posts::all();

        return view('articlePage')->with("cates",$cates)->with("posts",$articles);
        
    }
   

    public function dashboard()
    {     

        $cates = categories::all();

        $articles = posts::all();

        $july = posts::all();

        return view('dashboard')
        ->with("cates",$cates)
        ->with("posts",$articles)
        ->with('july',$july);
        
    }





    public function create_category(Request $request){
            
           
          $validate = validator::make($request->all(), [

            'category_name' => 'required|max:30',

            ]);


          if($validate->fails())

          {

            session()->flash('alert-danger', 'Please Insert Category Name!');

            return redirect('category')->withErrors($validate);

          }

        
          $input = $request->all();
        
          $storeall = categories::create($input); 

          session()->flash('alert-success', 'Saved Successfully!');


          return redirect('category');

     }




     public function createpost(Request $request)

     {   

       $validate = validator::make($request->all(),[
               

               'post_titile'  => 'required',
               'post_content' => 'required',
               'description'  => 'required',
               'category_id'  => 'required',
               'image'        => 'required'
            
        ]);


        if($validate->fails()) {

         return redirect('article')->withErrors($validate);
           
           }


           $post_titile = $request->input('post_titile');

           $post_content = $request->input('post_content');

           $posted_by = $request->input('posted_by');

           $category_id = $request->input('category_id');

           $posted_at = $request->input('posted_at');

           $description = $request->input('description');

           $year = $request->input('year');

           $month = $request->input('month');

           $time = $request->input('time');


           $cover = $request->file('image');

           $extension = $cover->getClientOriginalExtension();

           Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));


           $getall = array(

            'post_titile' => $post_titile ,

            'post_content' =>  $post_content,

            'posted_by'   => $posted_by,

            'category_id' => $category_id,

            'posted_at'  => $posted_at,

            'description' => $description,

            'year' => $year,

            'time' => $time,

            'month' => $month,

            'image' => $cover->getFilename().'.'.$extension,  File::get($cover)

            );

           $message = "Saved Successfully";


           $insert = posts::create($getall);


           session()->flash('alert-success', 'Data was successful added!');

           return redirect('article');


     }



     public function managepost($id)
     { 


      $posts =posts::find($id);

      return view('layouts.manage')->with('editable',$posts);

     }


        public function edit($id)
     { 

      
       $cates = categories::all();

       $articles = posts::find($id);


      return view('layouts.edit')->with('cates',$cates)->with('posts',$articles);

     }
   


    public function update(Request $request)
 
    {      
         $validate = validator::make($request->all(),[
               

               'post_titile'  => 'required',
               'post_content' => 'required',
               'category_id'  => 'required',
               'description'  => 'required',
               'category_id'  => 'required'
            
        ]);


        if($validate->fails()) {

         return back()->withErrors($validate);
           
           }






           $modify = posts::find($request->get('id'));

           $modify->post_titile = $request->get('post_titile');

           $modify->post_content = $request->get('post_content');

           $modify->description = $request->get('description');

           $modify->category_id = $request->get('category_id');

           
           if($request->hasFile('image')){
             
           $cover = $request->file('image');

           $extension = $cover->getClientOriginalExtension();

           Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
          
           $modify->image = $cover->getFilename().'.'.$extension;


           }


           $modify->save();

           session()->flash('alert-warning', 'Updated Successfully!');

           return redirect('home');

    }
   


   public function delete($id)

    {     

          
           
          $del = posts::find($id);

          Storage::disk('public')->delete($del->image);
          
          session()->flash('alert-danger', 'Deleted Successfully!');

          $del->delete();

          return redirect('home');
          
    }


    


      public function deleteimg($id)

    {
           
          $part = posts::find($id);

          $part->where('image',$part->image);

          Storage::disk('public')->delete($part->image);

          $part->update(['image' => null ]);

          return Back();

          
    }


    public function article()
    {

      return view('articlePage');
    }

   

   public function categoryMethod()
   {
    
    $cats = categories::all();

    return view('category')->with('categories',$cats);

   }


   public function removeCat($id)
   {  



      $removeby = categories::find($id);

      session()->flash('alert-success','Deleted Successfully');

      $removeby->delete();

      return redirect('category');

     

   }







}
