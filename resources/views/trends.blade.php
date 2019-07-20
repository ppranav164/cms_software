

@extends('layouts.page')


@section('content')



  @foreach($checks as $post)


<div class="container newsfont">
  <div class="row">

<a href="read/{{$post->id}}">
   <div class="col-sm-4">

    <img src="{{ asset("storage/".$post->image) }}" class="img-responsive">
   </div>

    <div class=" col-sm-6 ">
      <h2>{{ $post->post_titile }}   </h2>

      <h5>By <a href="#"> {{ $post->posted_by }} </a> {{$post->posted_at}}  <a href="#">{{ $post->category_id }}</a> </h5>
      <br/>
      <br/>
      <ul class="social-link">
          <li><a href="#"><span class="share1"></span></a></li>
          <li><a href="#"><span class="share2"></span></a></li>
          <li><a href="#"><span class="share3"></span></a></li>
          <li><a href="#"><span class="share4"></span></a></li>
        </ul>
    </div>
  </a>

  </div>
</div>



 @endforeach

@endsection

@section('footer')


@endsection
