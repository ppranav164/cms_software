@extends('layouts.app')

@section('content')

   <form  action="/delete/{{$posts->id}}" method="post"> 

    {{ csrf_field() }}

    <Button type="submit" class="btn btn-danger" >Delete Article</Button>

  </form> 


<div class="container">
    <div class="row">


        <div class="col-sm-12">
            <div class="card">

               <form class="form" action="/update" enctype="multipart/form-data" method="POST">
                <div class="card-header">Edit Article    <button id="editsub" type="submit" class="btn btn-success">Save Changes</button>
                </div>

                <div class="card-body">

                 

                   <input type="hidden" name="_token" value="{{ csrf_token() }}">



                    <div class="form-group">
                     <label class="sr-only" for="post_titile">Post Title:</label>
                      <input type="text" name="post_titile" value="{{ $posts->post_titile}}" class="form-control" id="category" placeholder="Post Title">
                       @if ($errors->has('post_titile'))
                         <div class="alert alert-danger error">{{ $errors->first('post_titile') }}</div>
                      @endif
                    </div>


                    <div class="form-group">
                     <label class="sr-only" for="post_titile">Post Description:</label>
                      <input type="text" name="description" value="{{ $posts->description}}"  class="form-control" id="category" placeholder="Post Description">
                       @if ($errors->has('description'))
                         <div class="alert alert-danger error">{{ $errors->first('description') }}</div>
                      @endif
                    </div>


                     <div class="form-group">
                      <label class="sr-only" for="post_content"> </label>
                      <textarea class="content" placeholder="Write Something" name="post_content" class="form-control" col="5" rows="10" id="post_content">{{ $posts->post_content }}</textarea>
                       @if ($errors->has('post_content'))
                         <div class="alert alert-danger error">{{ $errors->first('post_content') }}</div>
                      @endif
                    </div>



                    <div class="form-group">
                      <label class="sr-only" for="posted_by"> </label>
                      <input type="hidden" name="posted_by" value="{{ Auth::user()->name }}" >
                    </div>



                     <div class="form-group">


                      <select name="category_id" class="form-control">
                        @foreach($cates as $cat)
                        @if($cat->category_name == $posts->category_id  )
                          <option value="{{$cat->category_name}}" selected = "selected" >{{ $cat->category_name}}</option>
                          @else                
                        <option value="{{$cat->category_name}}">{{ $cat->category_name}}</option>
                         @endif
                        @endforeach
                      </select>



                       @if ($errors->has('category_id'))
                         <div class="alert alert-danger error">{{ $errors->first('category_id') }}</div>
                       @endif
                    </div>



                    <div class="form-group">
                     <label class="sr-only" for="post_titile">posted_at:</label>
                      <input type="hidden" name="posted_at" class="form-control" id="category" value="{{  now()->toRfc850String() }}" placeholder="posted_at">
                    </div>


                    <div class="form-group">


                      @if($posts->image != null)

                       <img src="{{ asset("storage/".$posts->image) }}" width="300px;" height="250px;">

                      <a href="deleteimg/{{$posts->id}}">Delete Image</a>
                      
                      @else
                      
                      <input type="file" name="image" class="form-control">

                      @endif

                       @if ($errors->has('image'))
                         <div class="alert alert-danger error">{{ $errors->first('image') }}</div>
                      @endif
                      


                      

                    </div>

                    <input type="hidden" value="{{ $posts->id}}" name="id"> 


                 </form>



               </div>
            </div>
        </div>

   


    </div>
</div>



@endsection
