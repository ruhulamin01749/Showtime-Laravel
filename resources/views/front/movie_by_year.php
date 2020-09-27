<?php
  include "header.php";
?>
<section id="contentSection">
  <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-9">
      <div class="left_content">
        <div class="single_post_content">
          <h2><span><?php echo $year_name->year_name; ?> <?php echo $title; ?> (<?php echo $total_rows; ?>)</span></h2>
          <ul class="photograph_nav wow fadeInDown"> 
              <?php foreach ($movie_by_year as $show_movie): $segment++;?>
              <div style="padding-left:10px;padding-right:0px;" class="col-md-3">   
                  <li>
                    <figure class="bssmall_fig">
                      <div class="photo_grid">
                        <figure>
                          <a href="<?php echo base_url(); ?>movie/SingleMovie/<?php echo $show_movie['movie_id']; ?>"><img src="<?php echo base_url();?><?php echo $show_movie['movie_image']; ?>" alt=""/></a>
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
                        <a href="<?php echo base_url(); ?>movie/SingleMovie/<?php echo $show_movie['movie_id']; ?>"><?php echo $show_movie['movie_name']; ?></a><br>
                        <p>Views : <?php echo $show_movie['hit_count']; ?> , &nbsp;&nbsp;&nbsp;&nbsp;<a style="" href="<?php echo $show_movie['movie_link']; ?>">Download <i class="fa fa-download" aria-hidden="true"></i></a></p>
                      </figcaption>
                    </figure>
                  </li>
              </div>
              <?php endforeach; ?>
          </ul>           
        </div> 
        <?php echo $this->pagination->create_links();?>    
      </div>
    </div>
  <?php include "sidebar.php"; ?>
  </div>  
</section>
<?php
include "footer.php";
?>