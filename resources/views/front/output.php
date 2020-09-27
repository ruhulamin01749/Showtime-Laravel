<div id="nav-search-dropdown" class="">
<h4>SEARCH RESULT</h4>
<ul id="nav-search-results" class="list-unstyled">
                            
<?php if($movie_list){ ?>
  
<?php foreach ($movie_list as $movie) { ?>
<li class="clearfix">
  <a href="<?php echo base_url(); ?>movie/SingleMovie/<?php echo $movie->movie_id; ?>"><?php echo $movie->movie_name; ?></a><br>
  <span class="result-size pull-left">Category : <?php echo $movie->category_name; ?> |</span>
  <?php if($movie->movie_size){ ?>
  <span style="margin-left:5px;" class="result-size pull-left">Size: <?php echo $movie->movie_size; ?></span>
  <?php }else{ ?>
  <span style="margin-left:5px;" class="result-size pull-left">Size : Unknown</span>
  <?php } ?>
</li>
<?php } ?>

<?php }else{echo '<b style="color:white;">Movie Not Found</b>'; } ?>

</ul>
</div>
