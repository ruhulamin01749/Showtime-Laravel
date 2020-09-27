<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ShowTime | <?php echo $title ?></title>
    <!-- Bootstrap -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" > 
    <link rel="shortcut icon" href="{{asset('/public/front')}}/images/favicon.ico">
<!--New Category-->
    <link rel="stylesheet" href="{{asset('/public/front')}}/css/styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="{{asset('/public/front')}}/js/script.js"></script>
<!--New Category-->
    <!-- <link href="{{asset('/public/front')}}/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <!-- for fontawesome icon css file -->
    <link href="{{asset('/public/front')}}/css/font-awesome.min.css" rel="stylesheet">
    <!-- for content animate css file -->
    <link rel="stylesheet" href="{{asset('/public/front')}}/css/animate.css">
    <!-- google fonts  -->
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Varela' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>   
    <!-- for news ticker css file -->
     <link href="{{asset('/public/front')}}/css/li-scroller.css" rel="stylesheet">
     <!-- slick slider css file -->
    <link href="{{asset('/public/front')}}/css/slick.css" rel="stylesheet">
    <!-- for fancybox slider -->
     <link href="{{asset('/public/front')}}/css/jquery.fancybox.css" rel="stylesheet">    
    <!-- website theme file -->
    <!-- <link href="{{asset('/public/front')}}/css/theme-red.css" rel="stylesheet"> -->
    <link href="{{asset('/public/front')}}/css/theme.css" rel="stylesheet">
    <!-- main site css file -->    
    <link href="{{asset('/public/front')}}/style.css" rel="stylesheet">
    <link rel='stylesheet' id='camera-css'  href='{{asset("/public/front")}}/slider/css/camera.css' type='text/css' media='all'> 
    <!-- Start WOWSlider.com HEAD section -->
    <link href="http://vjs.zencdn.net/6.2.0/video-js.css" rel="stylesheet">
    <link href="{{asset('/public/front')}}/custom.css" rel="stylesheet">
  </head>
<body>
    <!--Facebook code  -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <!-- end Facebook code  -->
    
    <header id="header">  
      <div class="container"> 
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="header_bottom">
              <div class="logo_area">
                 <a href="{{URL::to('/')}}" class="logo">
                 <img style="width: 300px; margin-top: 15px;" src="{{asset('/public/front')}}/images/showtime2.png" alt="ShowTime" >
                </a> 
              </div>
               <div class="logo_area_2">
                <form class="" action="" class="search-form" method="get" enctype >
                    <div class="form-group has-feedback">
                        <input autocomplete="off" id="search" type="text" class="form-control search_input_form" name="search" placeholder="Search Movies Here">
                        <span style="color: silver" class="glyphicon glyphicon-search form-control-feedback"></span>
                        <div id="search_result"></div>
                    </div>
                </form>
            </div>  
            </div>
          </div>
        </div>  
      </div>
    </header><!-- End header section --> 

    @include('front.layouts.menu')
    @yield("main_content")

<footer id="footer">        
  <div class="footer_bottom">
    <div style="background: #303030" class="container">
      <p class="copyright">
        All Rights Reserved <a href="{{URL::to('/')}}">ShowTime</a>
      </p>
      <p style="color:orange;" class="developer">Design & Developed By <a style="color:silver;" href="https://ruhulamin.cf" target="_blank">Md.Ruhul Amin</a></p>
    </div>
  </div> 
  @include('front.modal')
</footer>
    <script>
      $(document).ready(function(){
         $("#search").keyup(function(){
             var str=  $("#search").val();
             if(str == "") {
                     $( "#search_result" ).hide(); 
             }else {
                     $.get( "{{URL::to('/')}}movie/ajax_movie_search?id="+str, function( data ){
                        $( "#search_result" ).show();
                         $( "#search_result" ).html( data );  
                  });
             }
         });  
      });  
    </script>
<script type="text/javascript">
  $(document).on("click", "#trailor1", function () {
     var myBookId = $(this).data('id');
     var link = '<a id="trailor" class="embedly-card" data-card-controls="0" href="'+myBookId+'"></a>';
      $(".modal-body").empty();
     $(".modal-body").append(link);
     $('#myModal').modal('show');
});
  </script>




  <!-- jQuery Library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
  <!-- bootstrap js file -->
  <script src="{{asset('/public/front')}}/js/bootstrap.min.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
<!-- Slider -->
  <script src="{{URL::to('/public/front')}}/slider/scripts/jquery.mobile.customized.min.js"></script>
  <script src="{{URL::to('/public/front')}}/slider/scripts/jquery.easing.1.3.js"></script> 
  <script src="{{URL::to('/public/front')}}/slider/scripts/camera.min.js"></script> 
  <!-- For content animatin  -->
  <script src="{{asset('/public/front')}}/js/wow.min.js"></script>
  <!-- slick slider js file -->
  <script src="{{asset('/public/front')}}/js/slick.min.js"></script> 
  <!-- news ticker jquery file -->
  <script src="{{asset('/public/front')}}/js/jquery.li-scroller.1.0.js"></script>
  <!-- for news slider -->
  <script src="{{asset('/public/front')}}/js/jquery.newsTicker.min.js"></script>
  <!-- for fancybox slider -->
  <script src="{{asset('/public/front')}}/js/jquery.fancybox.pack.js"></script>
  <!-- custom js file include -->    
  <script src="{{asset('/public/front')}}/js/custom.js"></script> 
   <script src="http://vjs.zencdn.net/6.2.0/video.js"></script>
   

  <!-- If you'd like to support IE8 -->
  <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
   
  </body>
</html>