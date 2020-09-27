
<footer id="footer">        
      <div class="footer_bottom">
        <p class="copyright">
          All Rights Reserved <a href="<?php echo base_url();?>">ShowTime</a>
        </p>
        <!-- <p style="color:orange;" class="developer">Developed By <a style="color:silver;" href="https://www.facebook.com/ruhulamin.imran" target="_blank">Md.Ruhul Amin</a></p> -->
      </div> 
      <?php include 'modal.php';  ?>
</footer>
    <script>
      $(document).ready(function(){
         $("#search").keyup(function(){
             var str=  $("#search").val();
             if(str == "") {
                     $( "#search_result" ).hide(); 
             }else {
                     $.get( "<?php echo base_url();?>movie/ajax_movie_search?id="+str, function( data ){
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
<script>
    jQuery(function(){
      jQuery('#camera_wrap_1').camera({
        thumbnails: true
      });
    });
  </script>
<!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?534WKJhYREW324rCUynLjEZZBGWkj6LW";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zendesk Chat Script-->

  <!-- jQuery Library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
      <script type='text/javascript' src='<?php echo base_url();?>slider/scripts/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url();?>slider/scripts/jquery.easing.1.3.js'></script> 
    <script type='text/javascript' src='<?php echo base_url();?>slider/scripts/camera.min.js'></script> 
  <!-- For content animatin  -->
  <script src="<?php echo base_url();?>kachajal/js/wow.min.js"></script>
  <!-- bootstrap js file -->
  <script src="<?php echo base_url();?>kachajal/js/bootstrap.min.js"></script> 
  <!-- slick slider js file -->
  <script src="<?php echo base_url();?>kachajal/js/slick.min.js"></script> 
  <!-- news ticker jquery file -->
  <script src="<?php echo base_url();?>kachajal/js/jquery.li-scroller.1.0.js"></script>
  <!-- for news slider -->
  <script src="<?php echo base_url();?>kachajal/js/jquery.newsTicker.min.js"></script>
  <!-- for fancybox slider -->
  <script src="<?php echo base_url();?>kachajal/js/jquery.fancybox.pack.js"></script>
  <!-- custom js file include -->    
  <script src="<?php echo base_url();?>kachajal/js/custom.js"></script> 
   <script src="http://vjs.zencdn.net/6.2.0/video.js"></script>
   

  <!-- If you'd like to support IE8 -->
  <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
   

     
  </body>
</html>