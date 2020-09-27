@extends('front.layouts.layout')
@section('main_content')

<section id="contentSection">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="left_content">
            <div style="border:none;" class="single_post_content">
              <h2 style='text-align:center;'><span>{{$title}} Movies (<?php echo count($num_of_movie); ?>)</span></h2>
              <ul class="photograph_nav wow fadeInDown"> 
                  <?php foreach ($movies as $show_movie): ?>
                  <div style="padding-left:10px;padding-right:0px;" class="col-md-2">   
                      <li>
                        <figure class="bssmall_fig">
                          <div class="photo_grid">
                            <figure>
                              <a href="{{URL::to('/view-movie')}}/<?php echo $show_movie['movie_id']; ?>"><img src="{{asset('/')}}<?php echo $show_movie['movie_image']; ?>" alt=""/></a>
                              <?php if($show_movie['trailor']){ ?>
                              <h4 id="trailor1" data-id="<?php echo $show_movie['trailor']; ?>">Watch Trailor</h4>
                              <?php } if($show_movie['rating']){ ?>
                              <h5><i class="fa fa-star-o" aria-hidden="true"></i> <?php echo $show_movie['rating']; ?></h5>
                              <?php }if($show_movie['movie_size']){ ?>
                              <h6><?php echo $show_movie['movie_size']; ?></h6>
                              <?php } ?>
                            </figure>
                          </div>
                          <figcaption>
                            <a href="{{URL::to('/view-movie')}}/<?php echo $show_movie['movie_id']; ?>"><?php echo $show_movie['movie_name']; ?></a><br>
                            <p>Views : <?php echo $show_movie['hit_count']; ?> , &nbsp;&nbsp;&nbsp;&nbsp;<a style="" href="<?php echo $show_movie['movie_link']; ?>">Download <i class="fa fa-download" aria-hidden="true"></i></a></p>
                          </figcaption>
                        </figure>
                      </li>
                  </div>
                  <?php endforeach; ?>
              </ul>           
            </div> 
            {{ $movies->links() }}    
          </div>
        </div>
      </div>  
    </div>
</section>

@endsection