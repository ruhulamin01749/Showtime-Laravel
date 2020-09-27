    <!-- start nav section --> 
    <section id="navArea">
      <!-- Start navbar -->
      <nav class="navbar navbar-inverse" role="navigation">   
        <div class="container">   
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div style="height:35px;" id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="{{URL::to('/')}}"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Movies <i class="fa fa-angle-down"></i></a>
                <ul class="dropdown-menu">
                    <li><a href="{{URL::to('/all-movies')}}">All Movies</a></li>
                    <li><a href="{{URL::to('/category-movies/1')}}">Hollywood Movies</a></li>
                    <li><a href="{{URL::to('/category-movies/14')}}">Games</a></li>
                    <li><a href="http://10.100.100.134/" target="_blank">Showtime HD</a></li>
                    <li><a href="http://www.bioscopelive.com/" target="_blank">Bioscope Live </a></li>
                    <li><a href="http://www.jagobd.com/" target="_blank">Jago BD </a></li>
                    <li><a href="{{URL::to('/')}}movie/hindi_dubbed">Hindi Dubbed</a></li>
                </ul>
              </li>
              <li><a href="{{URL::to('/today-movies')}}">Today Movies</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">TV Series <i class="fa fa-angle-down"></i></a>
                <ul class="dropdown-menu">
                    <li><a href="http://10.100.100.134/" target="_blank">Showtime HD</a></li>
                    <li><a href="http://www.bioscopelive.com/" target="_blank">Bioscope Live </a></li>
                    <li><a href="http://www.jagobd.com/" target="_blank">Jago BD </a></li>
                </ul>
              </li>
              <li><a href="{{URL::to('/')}}movie/category_movie/14">Games</a></li>
              <li><a href="{{URL::to('/')}}movie/category_movie/15">Softwere</a></li>
              <li><a href="{{URL::to('/')}}movie/category_movie/15">Music</a></li>
              <li><a href="{{URL::to('/')}}movie/category_movie/15">Extraa</a></li>

              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">BDIX TV <i class="fa fa-angle-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><a href="http://10.100.100.134/" target="_blank">Showtime HD</a></li>
                    <li><a href="http://www.bioscopelive.com/" target="_blank">Bioscope Live </a></li>
                    <li><a href="http://www.jagobd.com/" target="_blank">Jago BD </a></li>
                  </ul>
              </li>
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">BDIX <i class="fa fa-angle-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><a href="http://www.crazyhd.com/" target="_blank">Crazy HD</a></li>
                    <li><a href="http://bioscopeblog.net/" target="_blank">Bioscope Blog </a></li>
                  </ul>
              </li> 
               <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Online Radio <i class="fa fa-angle-down"></i></a>
                  <ul class="dropdown-menu">
                      
                  </ul>
              </li>           
            </ul>
          </div><!--/.nav-collapse -->  
          <!-- <div class="social_area">
            <ul class="social_nav">
              <li class="facebook"><a href="https://www.facebook.com/ShowTimeFTP/" target="_blank"></a></li>
              <li class="twitter"><a href="#"></a></li>
              <li class="youtube"><a href="https://www.youtube.com/channel/UCQ7Io3nMpwtAlMVS7LsXZIw" target="_blank" ></a></li>
              <li class="mail"><a href="mailto:info@smartnews.com"></a></li>
            </ul>
          </div> -->  
        </div>   
      </nav>
    </section><!-- End nav section -->