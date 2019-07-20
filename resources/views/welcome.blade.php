@extends('layouts.page')

@section('content')



<div class="container-fluid newsfont">
  
  <div class="right_bar">
    <div class="swiper-slide">
       <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Recent Articles</a></li>
  </ul>

  <div class="tab-content fixedsize" data-simplebar>
    <div id="home" class="tab-pane fade in active">
  @foreach($recents as $post)
     <a href="read/{{$post->id}}"><h3>{{$post->post_titile}}</h3></a>
  @endforeach
    </div>


   
  </div>

    </div>
  </div>

  @foreach($posts as $post)

  <div class="row">



<a href="read/{{$post->id}}">
   <div class="col-sm-2">

    <img src="{{ asset("storage/".$post->image) }}" class="img-responsive">
   </div>

    <div class=" col-sm-6 ">
      <h2>{{ $post->post_titile }}   </h2>

      <h5>By <a href="#"> {{ $post->posted_by }} </a> {{$post->posted_at}}  <a href="#">{{ $post->category_id }}</a> </h5>
      <br/>
      <br/>
     
    </div> <!-- End Col six -->
  </a>

  </div> <!-- End Row -->

  @endforeach
</div>

 <div class="pager">
    {{ $posts->render() }}
 </div>

 
<script src="https://unpkg.com/simplebar@latest/dist/simplebar.js"></script>


@endsection

@section('footer')
@endsection


 





