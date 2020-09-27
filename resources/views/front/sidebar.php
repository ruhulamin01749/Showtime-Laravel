
        <div class="col-lg-3 col-md-3 col-sm-3">
           <div class="right_content">
            <div class="single_sidebar wow fadeInDown">
                  <h2><span>Live Cricket Score</span></h2>
                 <script type="text/javascript"> 
             app="www.cricwaves.com"; mo="f1_zd"; nt="ban"; mats =""; tor =""; Width="100%"; Height="252px"; wi ="w"; 
             co ="ban"; ad="1"; 
            </script>
            <script type="text/javascript" src="http://www.cricwaves.com/cricket/widgets/script/scoreWidgets.js">
          </script>
              </div>
         </aside>

                  <div class="single_sidebar">
          <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab" data-toggle="tab">Common</a></li>      
              </ul>
              <div class="tab-content">

            <div id='cssmenu'>
<ul>
<li><a href='<?php echo base_url(); ?>movie/all_movie'><span>All Movies</span></a>
    <?php
                  foreach ($publish_resulation as $p_resulation) {
                   
                  ?>
                    <li class="active has-sub"><a href=""><span><?php echo $p_resulation->resulation_name." Movies" ;  ?></span></a>

                      <ul>
                      <?php
                  foreach ($publish_resulation_category as $p_category) {
                   
                  ?>
                        <li><a href='<?php echo base_url(); ?>movie/movie_by_resulation/<?php echo $p_resulation->resulation_id; ?>/<?php echo $p_category->category_id; ?>'><span> <?php echo $p_category->category_name;  ?></span></a>
                        </li>

                           <?php } ?>
                      </ul>

                   
            </li>
                    <?php } ?>

   

</ul>
        </div>
</div>
</div>

        

          <div class="single_sidebar">
          <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab" data-toggle="tab">Category</a></li>      
              </ul>
              <div class="tab-content">

            <div id='cssmenu'>
           <ul> 
             
                         <?php
                  foreach ($publish_first_4_catagory as $p_category) {
                   
                  ?>

                    <li class="active has-sub"><a href="#"><span><?php echo $p_category->category_name ;  ?></span></a>

                      <ul>
                      <li><a href="<?php echo base_url(); ?>movie/category_movie/<?php echo $p_category->category_id; ?>"><span>All <?php echo $p_category->category_name ;  ?></span></a></li>
                <li class='has-sub'><a href="#"><span><?php echo $p_category->category_name ;  ?> By Year</span></a>
            <ul>
                      <?php
                  foreach ($publish_year as $p_year) {
                   
                               ?>    
                        <li><a href='<?php echo base_url(); ?>movie/category_movie_by_year/<?php echo $p_year->year_id; ?>/<?php echo $p_category->category_id; ?>'><span> <?php echo $p_year->year_name ;  ?></span></a>
                        </li>

                           <?php } ?>
                           </ul>
                           </li>
                      <li class='has-sub'><a href="#"><span><?php echo $p_category->category_name ;  ?> By Alphabate</span></a>

            <ul>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_category/<?php echo $p_category->category_id ;  ?>/a">A</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_category/<?php echo $p_category->category_id ; ?>/b">B</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_category/<?php echo $p_category->category_id ;  ?>/c">C</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_category/<?php echo $p_category->category_id ;  ?>/d">D</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_category/<?php echo $p_category->category_id ;  ?>/e">E</a></li>       
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_category/<?php echo $p_category->category_id ;  ?>/f">F</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_category/<?php echo $p_category->category_id ;  ?>/g">G</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_category/<?php echo $p_category->category_id ;  ?>/h">H</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_category/<?php echo $p_category->category_id ;  ?>/i">I</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_category/<?php echo $p_category->category_id ;  ?>/j">J</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_category/<?php echo $p_category->category_id ;  ?>/k">K</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_category/<?php echo $p_category->category_id ;  ?>/l">L</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_category/<?php echo $p_category->category_id ;  ?>/m">M</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_category/<?php echo $p_category->category_id ;  ?>/n">N</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_category/<?php echo $p_category->category_id ;  ?>/o">O</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_category/<?php echo $p_category->category_id ;  ?>/p">P</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_category/<?php echo $p_category->category_id ;  ?>/q">Q</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_category/<?php echo $p_category->category_id ;  ?>/r">R</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_category/<?php echo $p_category->category_id ;  ?>/s">S</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_category/<?php echo $p_category->category_id ;  ?>/t">T</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_category/<?php echo $p_category->category_id ;  ?>/u">U</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_category/<?php echo $p_category->category_id ;  ?>/v">V</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_category/<?php echo $p_category->category_id ;  ?>/w">W</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_category/<?php echo $p_category->category_id ;  ?>/x">X</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_category/<?php echo $p_category->category_id ;  ?>/y">Y</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_category/<?php echo $p_category->category_id ;  ?>/z">Z</a></li> 
            </ul>

                      </li>
            
                      </ul>

                   
            </li>
                    <?php } ?>
                  
                    <li class="active has-sub"><a href="#"><span>Bangla</span></a>
                      <ul>
                      <?php foreach ($publish_sub_category_1 as $sub_category) {
                         ?>
                        <li><a href='<?php echo base_url(); ?>movie/movie_by_sub_category/<?php echo $sub_category->sub_category_id; ?>/<?php echo $sub_category->main_category_id; ?>'><span> <?php echo $sub_category->sub_category_name; ?></span></a>
                        </li>
                        <li class='has-sub'><a href="#"><span><?php echo $sub_category->sub_category_name;  ?> By Alphabate</span></a>

            <ul>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/a">A</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/b">B</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/c">C</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/d">D</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/e">E</a></li>       
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/f">F</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/g">G</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/h">H</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/i">I</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/j">J</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/k">K</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/l">L</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/m">M</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/n">N</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/o">O</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/p">P</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/q">Q</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/r">R</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/s">S</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/t">T</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/u">U</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/v">V</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/w">W</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/x">X</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/y">Y</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/z">Z</a></li> 
            </ul>

                      </li>

                        <?php } ?>
                      </ul>
                      <li class="active has-sub"><a href="#"><span>Others</span></a>
                      <ul>
                      <?php foreach ($publish_sub_category_2 as $sub_category) {
                         ?>
                        <li><a href='<?php echo base_url(); ?>movie/movie_by_sub_category/<?php echo $sub_category->sub_category_id; ?>/<?php echo $sub_category->main_category_id; ?>'><span> <?php echo $sub_category->sub_category_name; ?></span></a>
                        </li>
                        <li class='has-sub'><a href="#"><span><?php echo $sub_category->sub_category_name;  ?> By Alphabate</span></a>

            <ul>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/a">A</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/b">B</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/c">C</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/d">D</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/e">E</a></li>       
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/f">F</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/g">G</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/h">H</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/i">I</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/j">J</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/k">K</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/l">L</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/m">M</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/n">N</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/o">O</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/p">P</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/q">Q</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/r">R</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/s">S</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/t">T</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/u">U</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/v">V</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/w">W</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/x">X</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/y">Y</a></li>
               <li><a style="padding-top:4px;padding-bottom:4px;" href="<?php echo base_url(); ?>movie/key_search_sub_category/<?php echo $sub_category->sub_category_id; ?>/z">Z</a></li> 
            </ul>

                      </li>
                        <?php } ?>
                      </ul>
                      <li class="active has-sub"><a href="#"><span>TV Series</span></a>
                      <ul>
                      <?php foreach ($publish_sub_category_3 as $sub_category) {
                         ?>
                        <li><a href='<?php echo base_url(); ?>movie/movie_by_sub_category/<?php echo $sub_category->sub_category_id; ?>/<?php echo $sub_category->main_category_id; ?>'><span> <?php echo $sub_category->sub_category_name; ?></span></a>
                        </li>
                        <?php } ?>
                      </ul>

                      <?php
                       foreach ($publish_last_catagory as $last_category) {
                       ?>

                      <li><a href='<?php echo base_url(); ?>movie/category_movie/<?php echo $last_category->category_id ?>'><span><?php echo $last_category->category_name ?></span></a>
                      </li>
            
                     <?php } ?>
 
            </ul>

        </div>
</div>
</div>


      
         <aside class="right_content">

          <div class="single_sidebar">
          <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab" data-toggle="tab">Genre</a></li>      
              </ul>
              <div class="tab-content">

            <div id='cssmenu'>
<ul>
  <?php
                  foreach ($publish_genre as $p_genre) {
                   
                  ?>
                    <li class="active has-sub"><a style="padding:10px 18px;" href="#"><span><?php echo $p_genre->genre_name ;  ?></span></a>

                      <ul>
                      <?php
                  foreach ($publish_genre_category as $p_category) {
                   
                  ?>
                        <li><a href='<?php echo base_url(); ?>movie/movie_by_genre/<?php echo $p_genre->genre_id; ?>/<?php echo $p_category->category_id; ?>'><span> <?php echo $p_category->category_name ;  ?></span></a>
                        </li>

                           <?php } ?>
                      </ul>

                   
            </li>
                    <?php } ?>
   
</ul>
        </div>
</div>
</div>
</aside>


<br>
            <div style="margin-top:20px;" class="single_sidebar wow fadeInDown">
              <h2><span>Find Us On Facebook</span></h2>
            <center> <div style="width:100%;" class="fb-page" data-href="https://www.facebook.com/ShowTimeFTP/" data-tabs="timeline" data-width="400" data-height="300" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"></div></center>
            </div>

            <br/>
           

        </div> 
