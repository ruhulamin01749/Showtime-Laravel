    <div class="fluid_container">
        <div style="margin-bottom:0" class="camera_wrap camera_azure_skin" id="camera_wrap_1">
        <?php foreach ($slider_movie as $s_movie) { ?>
            <?php if($s_movie->slider_image){ ?>
                <div data-src="{{asset('/')}}<?php echo $s_movie->movie_image; ?>">
                <!-- <div data-src="{{asset('/')}}<?php echo $s_movie->slider_image ?>"> -->
                    <div class="camera_caption fadeFromBottom">
                        <?php echo $s_movie->movie_name ?><a href="{{URL::to('/view-movie')}}/<?php echo $s_movie->movie_id ?>"><button type="button" class="btn btn-primary slider-download">Download</button></a>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
        </div>
    </div><!-- .fluid_container -->  