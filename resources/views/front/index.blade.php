@extends('front.layouts.layout')
@section('main_content')
<section id="contentSection">
  <div class="container">
    <div class="row">
		  <div id="mainpage" class="col-lg-9 col-md-9 col-sm-9">
			  <div id="maindata" class="left_content">
          <div style="border-top: 0px;padding-top: 0px;" class="single_post_content">
            <!-- Camera Slider -->
              <div class="fluid_container">
                <div style="margin-bottom:0" class="camera_wrap camera_azure_skin" id="camera_wrap_1">
                <?php foreach ($slider_movie as $s_movie) { ?>
                    <?php if($s_movie->movie_image){ ?>
                        <div data-src="{{asset('/')}}<?php echo $s_movie->movie_image; ?>">
                        
                            <div class="camera_caption fadeFromBottom">
                                <?php echo $s_movie->movie_name ?><a href="{{URL::to('/view-movie')}}/<?php echo $s_movie->movie_id ?>"><button type="button" class="btn btn-primary slider-download">Download</button></a>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
                </div>
              </div><!-- .fluid_container -->  
              <!-- End Camera Slider -->
          </div>
        </div>
      </div>
      <div id="mainpage" class="col-md-3 col-xs-12">
        <div id="maindata" class="right_content">
            <div class="single_sidebar wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
            <h2><span>Movie Request</span></h2>
            <form action="http://showtimebd.com/movie/save_request" method="post" class="request_form" id="request_form" data-toggle="validator" role="form" novalidate="true">
              <!-- <div style="display: none;" class="alert alert-success"></div> -->
              <div style="display: none;" class="alert alert-danger"></div>
                <div class="form-group">
                    <label class="control-label request_form_label" for="requertername">Your Name <i style="color: red">{required}</i></label>
                    <input type="text" id="requertername" data-trim="trim" name="requester_name" class="form-control" placeholder="Please Enter Your Name" required="">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label class="control-label request_form_label" for="moviename">Movie Name (With Year) <i style="color: red">{required}</i></label>
                    <input type="text" name="movie_name" data-trim="trim" id="moviename" class="form-control" placeholder="Please Enter Movie Name With Year" required="">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label class="control-label request_form_label" for="moviecategory">Movie Category <i style="color: red">{required}</i></label>
                    <select name="movie_category" id="moviecategory" class="form-control" required="">
                        <option value="">Select Category</option>
                        <option value="English Movie">English Movie</option>
                        <option value="Hindi Movie">Hindi Movie</option>
                        <option value="Tamil &amp; Telegu Movie">Tamil &amp; Telegu Movie</option>
                      
                        <option value="Hindi Dubbed Movie">Hindi Dubbed Movie</option>
                        <!-- <option value="Bangla Natok">Bangla Natok</option>
                        <option value="Bangla Tv Series">Bangla Tv Series</option> -->
                        <option value="Hindi Tv Series">Hindi Tv Series</option>
                        <option value="English Tv Series">English Tv Series</option>
                        <option value="Award Show">Award Show</option>
                        <option value="Short Film">Short Film</option>
                        <option value="Korean Movie">Korean Movie</option>
                        <option value="China Movie">China Movie</option>
                        <option value="Animation Movie">Animation Movie</option>
                        <option value="Foreign Movie">Foreign Movie</option>
                        <option value="PC Games">PC Games</option>
                        <option value="Software">Software</option>
                        <option value="Sport Heighlight">Sport Highlight</option>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <center><button type="submit" class="btn request_submit disabled" id="btnSave">Send Request</button></center>
                </div>
            </form>
        </div>
        </div>
      </div>
      <div id="mainpage" class="col-lg-12 col-md-12 col-sm-12">
        <div id="maindata" class="left_content">
        <div class="single_post_content">
            <h3 class="topic_h3_home"><span class="h33">Hollywood Movies</span><a style="float: right;" href="{{URL::to('/category-movies/1')}}" ><button class="btn btn-danger"><i class="fa fa-play" aria-hidden="true"></i> &nbsp; Browse All &nbsp; (16,000)</button></a></h3>
            <ul class="photograph_nav wow fadeInDown"> 
             <?php foreach ($hollywood_movie as $show_movie){ ?>
               <div style="padding-left:10px;padding-right:0px;" class="col-md-2">   
                  <li>
                    <figure class="bssmall_fig">
                      <div class="photo_grid">
                        <figure>
                          <a href="{{URL::to('/view-movie')}}/<?php echo $show_movie->movie_id; ?>"><img src="{{asset('/')}}<?php echo $show_movie->movie_image; ?>" alt=""/></a>
                          <?php if($show_movie->trailor){ ?>
                          <h4 id="trailor1" data-id="<?php echo $show_movie->trailor; ?>">Watch Trailor</h4>
                          <?php } if($show_movie->rating){ ?>
                          <h5><i class="fa fa-star-o" aria-hidden="true"></i> <?php echo $show_movie->rating; ?></h5>
                          <?php }if($show_movie->movie_size){ ?>
                          <h6><?php echo $show_movie->movie_size; ?></h6>
                          <?php } ?>
                        </figure>
                      </div>
                      <figcaption>
                        <a href="{{URL::to('/view-movie')}}/<?php echo $show_movie->movie_id; ?>"><?php echo $show_movie->movie_name; ?></a><br>
                        <p>Views : <?php echo $show_movie->hit_count; ?> , &nbsp;&nbsp;&nbsp;&nbsp;<a style="" href="<?php echo $show_movie->movie_link ?>">Download <i class="fa fa-download" aria-hidden="true"></i></a></p>
                      </figcaption>
                    </figure>
                  </li>
                </div>
             <?php } ?>
            </ul>            
        </div>

         <!-- Trigger the modal with a button -->
        <div class="single_post_content">
            <h3 class="topic_h3_home"><span class="h33">Bollywood Movies</span> <a style="float: right;" href="{{URL::to('/category-movies/3')}}" ><button class="btn btn-danger"><i class="fa fa-play" aria-hidden="true"></i> &nbsp; Browse All &nbsp; (16,000)</button></a></h3>
            <ul class="photograph_nav wow fadeInDown"> 
             <?php foreach ($bollywood_movie as $show_movie){ ?>
               <div style="padding-left:10px;padding-right:0px;" class="col-md-2">   
                  <li>
                    <figure class="bssmall_fig">
                      <div class="photo_grid">
                        <figure>
                          <a href="{{URL::to('/view-movie')}}/<?php echo $show_movie->movie_id; ?>"><img src="{{asset('/')}}<?php echo $show_movie->movie_image; ?>" alt=""/></a>
                          <?php if($show_movie->trailor){ ?>
                          <h4 id="trailor1" data-id="<?php echo $show_movie->trailor; ?>">Watch Trailor</h4>
                          <?php } if($show_movie->rating){ ?>
                          <h5><i class="fa fa-star-o" aria-hidden="true"></i> <?php echo $show_movie->rating; ?></h5>
                          <?php }if($show_movie->movie_size){ ?>
                          <h6><?php echo $show_movie->movie_size; ?></h6>
                          <?php } ?>
                        </figure>
                      </div>
                      <figcaption>
                        <a href="{{URL::to('/view-movie')}}/<?php echo $show_movie->movie_id; ?>"><?php echo $show_movie->movie_name; ?></a><br>
                        <p>Views : <?php echo $show_movie->hit_count; ?> , &nbsp;&nbsp;&nbsp;&nbsp;<a style="" href="<?php echo $show_movie->movie_link ?>">Download <i class="fa fa-download" aria-hidden="true"></i></a></p>
                      </figcaption>
                    </figure>
                  </li>
                </div>
             <?php } ?>
            </ul>            
        </div>
        <div class="single_post_content">
            <h3 class="topic_h3_home"><span class="h33">South Indian Movies</span><a style="float: right;" href="{{URL::to('/category-movies/6')}}" ><button class="btn btn-danger"><i class="fa fa-play" aria-hidden="true"></i> &nbsp; Browse All &nbsp; (16,000)</button></a></h3>
            <ul class="photograph_nav wow fadeInDown"> 
             <?php foreach ($south_indian as $show_movie){ ?>
               <div style="padding-left:10px;padding-right:0px;" class="col-md-2">   
                  <li>
                    <figure class="bssmall_fig">
                      <div class="photo_grid">
                        <figure>
                          <a href="{{URL::to('/view-movie')}}/<?php echo $show_movie->movie_id; ?>"><img src="{{asset('/')}}<?php echo $show_movie->movie_image; ?>" alt=""/></a>
                          <?php if($show_movie->trailor){ ?>
                          <h4 id="trailor1" data-id="<?php echo $show_movie->trailor; ?>">Watch Trailor</h4>
                          <?php } if($show_movie->rating){ ?>
                          <h5><i class="fa fa-star-o" aria-hidden="true"></i> <?php echo $show_movie->rating; ?></h5>
                          <?php }if($show_movie->movie_size){ ?>
                          <h6><?php echo $show_movie->movie_size; ?></h6>
                          <?php } ?>
                        </figure>
                      </div>
                      <figcaption>
                        <a href="{{URL::to('/view-movie')}}/<?php echo $show_movie->movie_id; ?>"><?php echo $show_movie->movie_name; ?></a><br>
                        <p>Views : <?php echo $show_movie->hit_count; ?> , &nbsp;&nbsp;&nbsp;&nbsp;<a style="" href="<?php echo $show_movie->movie_link ?>">Download <i class="fa fa-download" aria-hidden="true"></i></a></p>
                      </figcaption>
                    </figure>
                  </li>
                </div>
             <?php } ?>
            </ul>            
        </div>
        <div class="single_post_content">
            <h3 class="topic_h3_home"><span class="h33">Indian Bangla Movies</span><a style="float: right;" href="{{URL::to('/category-movies/7')}}" ><button class="btn btn-danger"><i class="fa fa-play" aria-hidden="true"></i> &nbsp; Browse All &nbsp; (16,000)</button></a></h3>
            <ul class="photograph_nav wow fadeInDown"> 
             <?php foreach ($indian_bangla as $show_movie){ ?>
               <div style="padding-left:10px;padding-right:0px;" class="col-md-2">   
                  <li>
                    <figure class="bssmall_fig">
                      <div class="photo_grid">
                        <figure>
                          <a href="{{URL::to('/view-movie')}}/<?php echo $show_movie->movie_id; ?>"><img src="{{asset('/')}}<?php echo $show_movie->movie_image; ?>" alt=""/></a>
                          <?php if($show_movie->trailor){ ?>
                          <h4 id="trailor1" data-id="<?php echo $show_movie->trailor; ?>">Watch Trailor</h4>
                          <?php } if($show_movie->rating){ ?>
                          <h5><i class="fa fa-star-o" aria-hidden="true"></i> <?php echo $show_movie->rating; ?></h5>
                          <?php }if($show_movie->movie_size){ ?>
                          <h6><?php echo $show_movie->movie_size; ?></h6>
                          <?php } ?>
                        </figure>
                      </div>
                      <figcaption>
                        <a href="{{URL::to('/view-movie')}}/<?php echo $show_movie->movie_id; ?>"><?php echo $show_movie->movie_name; ?></a><br>
                        <p>Views : <?php echo $show_movie->hit_count; ?> , &nbsp;&nbsp;&nbsp;&nbsp;<a style="" href="<?php echo $show_movie->movie_link ?>">Download <i class="fa fa-download" aria-hidden="true"></i></a></p>
                      </figcaption>
                    </figure>
                  </li>
                </div>
             <?php } ?>
            </ul>            
        </div>
        <div class="single_post_content">
            <h3 class="topic_h3_home"><span class="h33">Other Language Movies</span><a style="float: right;" href="{{URL::to('/category-movies/8')}}" ><button class="btn btn-danger"><i class="fa fa-play" aria-hidden="true"></i> &nbsp; Browse All &nbsp; (16,000)</button></a></h3>
            <ul class="photograph_nav wow fadeInDown"> 
             <?php foreach ($other_movie as $show_movie){ ?>
               <div style="padding-left:10px;padding-right:0px;" class="col-md-2">   
                  <li>
                    <figure class="bssmall_fig">
                      <div class="photo_grid">
                        <figure>
                          <a href="{{URL::to('/view-movie')}}/<?php echo $show_movie->movie_id; ?>"><img src="{{asset('/')}}<?php echo $show_movie->movie_image; ?>" alt=""/></a>
                          <?php if($show_movie->trailor){ ?>
                          <h4 id="trailor1" data-id="<?php echo $show_movie->trailor; ?>">Watch Trailor</h4>
                          <?php } if($show_movie->rating){ ?>
                          <h5><i class="fa fa-star-o" aria-hidden="true"></i> <?php echo $show_movie->rating; ?></h5>
                          <?php }if($show_movie->movie_size){ ?>
                          <h6><?php echo $show_movie->movie_size; ?></h6>
                          <?php } ?>
                        </figure>
                      </div>
                      <figcaption>
                        <a href="{{URL::to('/view-movie')}}/<?php echo $show_movie->movie_id; ?>"><?php echo $show_movie->movie_name; ?></a><br>
                        <p>Views : <?php echo $show_movie->hit_count; ?> , &nbsp;&nbsp;&nbsp;&nbsp;<a style="" href="<?php echo $show_movie->movie_link ?>">Download <i class="fa fa-download" aria-hidden="true"></i></a></p>
                      </figcaption>
                    </figure>
                  </li>
                </div>
             <?php } ?>
            </ul>            
        </div>
        <div class="single_post_content">
            <h3 class="topic_h3_home"><span class="h33">Animation Movies</span><a style="float: right;" href="{{URL::to('/category-movies/9')}}" ><button class="btn btn-danger"><i class="fa fa-play" aria-hidden="true"></i> &nbsp; Browse All &nbsp; (16,000)</button></a></h3>
            <ul class="photograph_nav wow fadeInDown"> 
             <?php foreach ($animation_movie as $show_movie){ ?>
               <div style="padding-left:10px;padding-right:0px;" class="col-md-2">   
                  <li>
                    <figure class="bssmall_fig">
                      <div class="photo_grid">
                        <figure>
                          <a href="{{URL::to('/view-movie')}}/<?php echo $show_movie->movie_id; ?>"><img src="{{asset('/')}}<?php echo $show_movie->movie_image; ?>" alt=""/></a>
                          <?php if($show_movie->trailor){ ?>
                          <h4 id="trailor1" data-id="<?php echo $show_movie->trailor; ?>">Watch Trailor</h4>
                          <?php } if($show_movie->rating){ ?>
                          <h5><i class="fa fa-star-o" aria-hidden="true"></i> <?php echo $show_movie->rating; ?></h5>
                          <?php }if($show_movie->movie_size){ ?>
                          <h6><?php echo $show_movie->movie_size; ?></h6>
                          <?php } ?>
                        </figure>
                      </div>
                      <figcaption>
                        <a href="{{URL::to('/view-movie')}}/<?php echo $show_movie->movie_id; ?>"><?php echo $show_movie->movie_name; ?></a><br>
                        <p>Views : <?php echo $show_movie->hit_count; ?> , &nbsp;&nbsp;&nbsp;&nbsp;<a class="fig_cap_download" href="<?php echo $show_movie->movie_link ?>" download="<?php echo $show_movie->movie_name.'-Showtime' ?>">Download <i class="fa fa-download" aria-hidden="true"></i></a></p>
                      </figcaption>
                    </figure>
                  </li>
                </div>
             <?php } ?>
            </ul>            
        </div>
      </div>
    </div>
  </div>
</section> 
    <!-- ==================End content body section=============== -->    
@endsection