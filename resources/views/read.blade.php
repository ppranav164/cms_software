
@extends('layouts.page')

@section('content')


 

<div class="container ">
  <div class="row">
    <div class="col-sm-9">
    	<ul class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="/{{$posts->category_id}}">{{ $posts->category_id }}</a></li>
        </ul>
    </div>
  </div>
</div>






<div class="container newsfont">
  <div class="row">

   

    <div class=" col-sm-9 ">
      <h2>{{ $posts->post_titile }}   </h2>

      <h5>By <a href="#"> {{ $posts->posted_by }} </a> {{$posts->posted_at}}  <a href="#">{{ $posts->category_id }}</a> </h5>
      <br/>
      <h4>{{ $posts->description }} </h4>
      <br/>
      <ul class="social-link">
          <li><a target="_blank" href="https://twitter.com/intent/tweet?text={{$posts->post_titile}}&url={{url()->current()}}"><span class="share1"></span></a></li>
          <li><a  target="_blank"href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}"><span class="share2"></span></a></li>
          <li><a target="_blank" href="mailto:?subject={{ $posts->post_titile }}&body={{url()->current()}}"><span class="share3"></span></a></li>
          <li><a target="_blank" href="https:api.whatsapp.com/send?text={{ $posts->post_titile }} {{url()->current()}}" data-action="share/whatsapp/share"><span class="share4"></span></a></li>
        </ul>
    </div>


 


  </div>
</div>


<div class="container text-left newsfont">
  <div class="row">
    <div class="col-sm-9">
     <img src="{{ asset("storage/".$posts->image) }}" class="img-responsive">
    </div>
    <div class="col-sm-9 lol">
    <p class="content" id="get">
    
    {{ $posts->post_content }}

    </p>

    </div>
  </div>
  <div class="read">  <button class="button" id="more">Read More</button>        </div>

</div>


<script>

var txt = document.getElementById("get").textContent;

str = txt.replace(/,/g,'<br />');

document.getElementById("get").innerHTML = str;

</script>


@endsection




@section('footer')


@endsection

