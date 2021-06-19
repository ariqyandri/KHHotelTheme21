<div id="post-<?php the_field('type'); ?>" class="post">
    <!-- Image -->
    <?php   if (has_block('gallery', $post->post_content)) {    ?>
    <div class="post_img">
        <div class="splide" id="post-slider">
	        <div class="splide__track">
		        <ul class="splide__list">
	
    <?php // https://wordpress.stackexchange.com/questions/162402/get-image-url-inside-the-content-in-wordpress
        $regex = '/src="([^"]*)"/';
        preg_match_all( $regex, get_the_content(), $gallery);
        $gallery = array_reverse($gallery);
            if($gallery[0]){        
                foreach ($gallery[0] as $src) { ?> 
    
                    <li class="splide__slide image" style="background-image: url(<?php echo $src?>)">
                    </li>
    
    <?php       }
            }   ?>
	
    	        </ul>
	        </div>
        </div>
    </div>
    <?php   } else if (wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )) { 
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
    <div class="post_img">
        <div class="splide" id="post-slider">
	        <div class="splide__track">
		        <ul class="splide__list">
                    <li class="splide__slide image" style="background-image: url(<?php echo $image[0];?>)">
                    </li>
    	        </ul>
	        </div>
        </div>
    </div>
    <?php } else {} ?>
    <!--  -->

    <!-- Features w/ Icons -->
    <?php   if (get_the_terms( $post->ID, 'features')) {    ?>
    <div class="post_features">
    <?php $terms = get_the_terms( $post->ID, 'features');
        foreach($terms as $term) {
            $name = $term->name;
            $description = $term->description;
            $id = $term->term_id;
        ?>       
        <div class="post_feature <?php if ($description ) {?>
            hvr-sweep-to-right <?php } else {?> hvr-grow <?php }?>">
            <img title="<?php echo  $name;?>" src='<?php the_field('icon', 'facilities_'.$id );?>' alt='<?php echo  $name;?>' />
            <p><?php echo $name ;?></p>
            <?php if ($description ) {?>
                <p class="post_description"><?php echo $description ;?></p>
            <?php }?>
        </div>
    <?php } ?>
    </div>
    <?php } ?>
    <!--  -->

    <!-- Text -->
    <div class="post_text">
        <div class="post_text-box">
            <h1><?php the_field('header'); ?></h1>
            <h2><?php the_field('header_second'); ?></h2>
            <?php the_content(); ?>
        </div>
    </div>
    <!--  -->

</div>

