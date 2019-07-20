@extends('layouts.app')

@section('content')


<div class="container">
  

  <div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-'.$msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div> <!-- end .flash-message -->


 

    <div class="row">


        <div class="col-sm-8">
            <div class="card">
                <div class="card-header "><h2>Create Post</h2> </div>

                <div class="card-body">

                  <form class="form" action="createpost" enctype="multipart/form-data" method="POST">

                   <input type="hidden" name="_token" value="{{ csrf_token() }}">



                    <div class="form-group">
                     <label class="sr-only" for="post_titile">Post Title:</label>
                      <input type="text" name="post_titile" class="form-control border_bottom" id="category" placeholder="Post Title">
                       @if ($errors->has('post_titile'))
                         <div class="alert alert-danger error">{{ $errors->first('post_titile') }}</div>
                      @endif
                    </div>


                    <div class="form-group">
                     <label class="sr-only" for="description">Post Description:</label>
                      <input type="text" name="description" class="form-control border_bottom" id="description" placeholder="Post Description">
                       @if ($errors->has('description'))
                         <div class="alert alert-danger error">{{ $errors->first('description') }}</div>
                      @endif
                    </div>


                     <div class="form-group">
                      <label class="sr-only" for="post_content"> </label>
                      <textarea  placeholder="Write Something" name="post_content" class="content" id="post_content"></textarea>
                       @if ($errors->has('post_content'))
                         <div class="alert alert-danger error">{{ $errors->first('post_content') }}</div>
                      @endif
                    </div>



                    <div class="form-group">
                      <label class="sr-only" for="posted_by"> </label>
                      <input type="hidden" name="posted_by" value="{{ Auth::user()->name }}" >
                    </div>



                     <div class="form-group">
                      <select name="category_id" class="form-control border_bottom">
                        @foreach($cates as $cat)
                        <option value="{{$cat->category_name}}">{{ $cat->category_name}}</option>
                        @endforeach
                      </select>
                       @if ($errors->has('category_id'))
                         <div class="alert alert-danger error">{{ $errors->first('category_id') }}</div>
                      @endif
                    </div>



                  <input type="hidden" name="posted_at"   value="{{ now()->toRfc850String() }}" >

                  <input type="hidden" name="month"   value="{{ now()->month }}" >

                  <input type="hidden" name="year"   value="{{ now()->year }}" >

                  <input type="hidden" name="time"   value="{{ date("h:ia") }}" >


                    <div class="form-group">
                     <label class="sr-only" for="post_titile">Image:</label>
                      <input type="file" name="image" class="form-control border_bottom" id="category"  placeholder="Image" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                    </div>


                    <button type="submit" class="btn btn-success">Post Article</button>
                 </form>



               </div>
            </div>
        </div> <!-- End Column  -->

    
     <div class="col-sm-2">
      <div class="thumbnail">
        <div class="caption">
          <h4>Preview Image</h4>
        </div>
      <img id="output" src="" width="300" height="300">
      </div>
     </div>
     



    </div>




     

     
      

    </div>
</div>



  




@endsection
