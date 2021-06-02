<div id="post-a" class="post">
    <div class="post_img">
    <?php
        if (has_block('gallery', $post->post_content)) { 
    ?>
        <div class="splide" id="post-a-slider">
	        <div class="splide__track">
		        <ul class="splide__list">
	<?php
        // https://wordpress.stackexchange.com/questions/162402/get-image-url-inside-the-content-in-wordpress
        $regex = '/src="([^"]*)"/';
        preg_match_all( $regex, get_the_content(), $gallery);
        $gallery = array_reverse($gallery);
            if($gallery[0]){        
                foreach ($gallery[0] as $src) {
    ?> 
                    <li class="splide__slide">
                        <img src="<?php echo $src?>"/>
                    </li>
    <?php       
                }
            }
    ?>
		        </ul>
	        </div>
        </div>
    <?php
        } else {
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
    ?>
                <img src="<?php echo $image[0];?>" alt="<?php the_title(); ?>" />
    <?php 
        }
    ?>
    </div>
    <div class="post_text">
        <h1><?php the_field('header'); ?></h1>
        <h2><?php the_field('header_second'); ?></h2>
        <?php the_content(); ?>
    </div>
</div>

