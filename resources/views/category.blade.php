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
    
      <div class="col-sm-4">
            <div class="card">
                <div class="card-header teelbgExtra"><h2>Add Category</h2></div>

                <div class="card-body">

                  <form class="form" action="addcategory" method="POST">

                   <input type="hidden" name="_token" value="{{ csrf_token() }}">

                     <div class="form-group">
                     <label class="sr-only" for="category">Category Name:</label>
                      <input type="text" name="category_name" class="form-control border_bottom" id="category" placeholder="Category Name">
                     </div>
                    <button type="submit" class="btn btn-success">Save</button>
                 </form>

                    @if ($errors->has('category_name'))
                         <div class="alert alert-danger error">{{ $errors->first('category_name') }}</div>
                      @endif

               </div>
            </div>
        </div>
   
   <div class="col-sm-4">
 @foreach($categories as $caty)
     <ul>
       <li>{{ $caty->category_name }} <a onClick="return confirm('are you sure?')" href="/ca_delete/{{$caty->id}}">Remove</a></li>
     </ul>
   @endforeach
   </div>

  


    </div>
</div>



@endsection
