<!DOCTYPE html>
<html lang="en">
<head>

  <title>E- Magazine Online</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{ asset('custom/images/favicon.png') }}" />  


    <link rel="stylesheet" href="https://unpkg.com/simplebar@latest/dist/simplebar.min.css" />

     <link href="https://fonts.googleapis.com/css?family=Noto+Serif&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('custom/css/bootstrap.min.css') }}">

    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('custom/slider/bxslider/css/jquery.bxslider.css')}}">
    <link href="{{ asset('custom/css/default.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('custom/css/typeanim.css') }}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('custom/css/animate.min.css')}}" />

      <link rel="stylesheet" href="{{ asset('custom/css/swiper.min.css')}}">
    

     

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

   <script src="{{ asset('custom/js/jquery.min.js')}}"></script>

   <script src=" {{ asset('custom/js/jquery.bxslider.min.js')}}"></script>
   
   <script src="{{ asset('custom/js/bootstrap.min.js')}}"></script>



<style>
  

.fixedsize  { 

  width: 400px;
  height: 420px;
  max-width: 100%;
  font-size: 12px;   

}



    .swipee {
      font-size: 18px;
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
      padding: 30px;
    }


.right-tab { list-style: none; margin: 0; padding: 0; background: #00d4ed; }


.right-tab  li { padding: 15px;  }


.read  { width: 100px;  margin: auto; background:#00d4ed; padding: 8px; border-radius: 5px;  }



.share1 { background: url('{{ asset('custom/images/twitter.png') }}'); 
          padding: 20px;
          background-repeat: no-repeat; }


.share2 { background: url('{{ asset('custom/images/facebook.png') }}'); 
          padding: 20px;
          background-repeat: no-repeat; }


.share3 { background: url('{{ asset('custom/images/instagram.png') }}'); 
          padding: 20px;
          background-repeat: no-repeat; }


.share4 { background: url('{{ asset('custom/images/whatsapp.png') }}'); 
          padding: 20px;
          background-repeat: no-repeat; }


.social_bottom { margin-top: 18px !important; }

 .social-link { list-style: none; 
                 padding:0;
                 margin: 0;

                   }   
 
 .social-link li { display: inline; }     


 .lol {
    height:340px;
    display:block;
    padding:10px;
    overflow:hidden;
} 


.button { background: none; 
          border: none;
          padding: 3px; }


.mainpage { padding: 25px;  }



</style>

  
</head>



<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top nobg absoluted">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="/"><img src="{{ asset('custom/images/logo.png') }}" alt="Logo"  height="35"></a>
    </div>
   <div class="collapse navbar-collapse navbar-right teel-nav" id="myNavbar">
      <ul class="nav navbar-nav ">
        <li><a href="#">Home</a></li>
        <li><a href="#">Contact Us</a></li>
        <li><a href="#">Advertisement</a></li>
        <li><a href="#">Download App</a></li>
      </ul>
    </div>
  </div>
</nav>



<div class="container-fluid nopadding">
 <div class="banner">
  <div class="swiper-container">
        <div class="swiper-wrapper">
           <img src="{{ asset('custom/images/banner1.jpg') }}" class="swiper-slide">
           <img src="{{ asset('custom/images/banner2.jpg') }}" class="swiper-slide">
           <img src="{{ asset('custom/images/banner3.jpg') }}" class="swiper-slide">
           <img src="{{ asset('custom/images/banner4.jpg') }}" class="swiper-slide">
        </div>
         <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
 </div>
</div>




  <div class="container-fluid teelbg">
       <div class="col-sm-12">
      <ul class="menu">
        @foreach($cates as $cats)
         <li><a href="/{{ $cats->category_name }}">{{ $cats->category_name }}</a></li>
        @endforeach
      </ul>
    </div>
  </div>


<div class="mainpage"> @yield('content') </div>





@yield('footer')

<div class="container-fluid teelbg ">


 <div class="container">
    <div class=row>


      <div class="col-sm-9 textblack">
      <h2>Content</h2>
      <p>Categories</p>
      <p>News</p>
      <p>Magazine</p>
      <p>Tags</p>
    </div>
    <div class="col-sm-3">
      <h2>Social Media</h2>

       <ul class="social-link social_bottom">
          <li><a href="#"><span class="share1"></span></a></li>
          <li><a href="#"><span class="share2"></span></a></li>
          <li><a href="#"><span class="share3"></span></a></li>
          <li><a href="#"><span class="share4"></span></a></li>
        </ul>

       <h6 class="textblack">Get Exclusive Resources Straight to your inbox</h6> 


      <a href="#"><input type="button" value="Sign Up" class="signupkey"></a>

    
    </div>


  </div>  
 </div>
</div>

<div class="container-fluid text-center blackbg white">
 Powered By webexinfotech.com   
</div>






 <script src="{{ asset('custom/js/swiper.min.js') }}"></script>

<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        spaceBetween: 2
    });




    </script>





<script>

$('#readbutton').click(function() {
     
     var max = 1000;
  var tot, str;
  $('.content').each(function() {
    str = String($(this).html());
    tot = str.length;
    str = (tot <= max)
      ? str
      : str.substring(0,(max + 1))+"...";

    $(this).html(str);
  });
  
});



$('#more').click(function(e) {

    e.stopPropagation();

    $('.lol').css({
        'height': 'auto'
    });
  
});


$('#more').click(function(e) {

    e.stopPropagation();
    
    $('.read').css({
        'display': 'none'
    });
  
});




</script>





</body>
</html>
