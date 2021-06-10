    <div class="splide" id="sight-slider">
        <div class="splide__track">
		    <ul class="splide__list">
            <?php // https://wordpress.stackexchange.com/questions/162402/get-image-url-inside-the-content-in-wordpress
            $regex = '/src="([^"]*)"/';
            preg_match_all( $regex, get_the_content(), $gallery);
            $gallery = array_reverse($gallery);
            if($gallery[0]){        
                foreach ($gallery[0] as $src) { ?> 
    
                    <li class="splide__slide">
                        <img src="<?php echo $src?>"/>
                    </li>
    
            <?php   }
                }   ?>
	        </ul>
        </div>
    </div>
