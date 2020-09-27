<?php include "header.php"; ?>

<section id="contentSection">
  <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-9">
      <div class="left_content">
        <div class="single_page">
          <h1><?php echo $movie_detail->movie_name ?></h1>
          <div class="post_commentbox">
            <span><i class="fa fa-calendar"></i><b>Publish Date</b> : <?php echo $movie_detail->date ?></span>
            <span><i class="fa fa-user"></i><b>Views</b> : <?php echo $movie_detail->hit_count ?></span>
          </div>
          <div class="single_post_content">
            <br>
            <?php if($movie_detail->trailor){ ?>
              <button id="trailor1" data-id="<?php echo $movie_detail->trailor; ?>" class="btn btn-green">Watch Trailor</button>
            <?php } ?>
              <a href="<?php echo $movie_detail->movie_link ?>"><button class="btn btn-theme">Click For Download</button></a>

            <?php if($movie_detail->movie_category == 14){ ?>
            <p>There Is No video</p>
            <?php }elseif($movie_detail->movie_category == 15) { ?>
              <p>There Is No video</p>
            <?php }elseif ($movie_detail->movie_category == 9) { ?>
             <p>There Is No video</p>
            <?php }else{ ?>
            <video id="my-video" class="video-js" controls preload="auto" poster="<?php echo base_url();?>kachajal/images/show-time.jpg" data-setup="{}">
              <source src="<?php echo $movie_detail->movie_link; ?>" type='video/mp4'>
              <source src="MY_VIDEO.webm" type='video/webm'>
              <p class="vjs-no-js">
                To view this video please enable JavaScript, and consider upgrading to a web browser that
                <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
              </p>
            </video>
            <?php } ?>

          </div>
          <div class="single_page_content">
            <ul>
                <?php if($genre_name){ ?>
              <li><b>Genre</b> : <?php echo $genre_name->genre_name ?></li>

              <?php } if($resulation_name){ ?>
              <li><b>Resulation</b> : <?php echo $resulation_name->resulation_name ?></li>
              <?php } if($movie_detail->realese_date ){ ?>

              <li><b>Realese Date</b> : <?php echo $movie_detail->realese_date ?></li>
              <?php } if($movie_detail->director ){ ?>

              <li><b>Director</b> : <?php echo $movie_detail->director ?></li>
              <?php } if($movie_detail->cast ){ ?>

              <li><b>Cast</b> : <?php echo $movie_detail->cast ?></li>
              <?php } ?>
            </ul>
          </div>
        </div> 
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-5399430913773502",
    enable_page_level_ads: true
  });
</script>
      
      <div class="single_post_content">
      <h4 style="color:#2AAA2A;font-weight:bold;" >Related Content</h4><br>
        <ul class="photograph_nav  wow fadeInDown"> 
          <?php foreach ($related as $show_movie) { ?>   
          <div style="padding-left:10px;padding-right:0px;" class="col-md-3">             
            <li>
              <figure class="bssmall_fig">
                <div class="photo_grid">
                  <figure>
                    <a href="<?php echo base_url(); ?>movie/SingleMovie/<?php echo $show_movie->movie_id; ?>"><img src="<?php echo base_url();?><?php echo $show_movie->movie_image; ?>" alt=""/></a>
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
                  <a href="<?php echo base_url(); ?>movie/SingleMovie/<?php echo $show_movie->movie_id; ?>"><?php echo $show_movie->movie_name; ?></a><br>
                  <p>Views : <?php echo $show_movie->hit_count; ?> , &nbsp;&nbsp;&nbsp;&nbsp;<a style="" href="<?php echo $show_movie->movie_link ?>">Download <i class="fa fa-download" aria-hidden="true"></i></a></p>
                </figcaption>
              </figure>
            </li>
          </div>
          <?php } ?>
        </ul>            
      </div>           
      </div>
    <div class="fb-comments" data-href="<?php echo current_url(); ?>" data-width="100%" data-numposts="8"></div>
  </div>
  <?php include"sidebar.php";  ?>
</section>
<?php include "footer.php"; ?>