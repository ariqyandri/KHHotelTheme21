<div class=splide id="home-slider">
	<div class="splide__track">
		<ul class="splide__list">
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );?>
            <li class="splide__slide">
                <div class="splide__slide__container">
                <img src="<?php echo $image[0];?>" alt="<?php the_title(); ?>" />
                <div class="content-box">
                    <div class="content-info">
                        <h1><?php the_field('headline'); ?></h1>
                    </div>
                    <div id="home" class="book-now-float">
                        <button
                            id="home"
                            class="book-button distributor"
                            rel="noreferrer"
                            target="_blank"
                        >
                        BOOK NOW
                        </button>
                    </div>
                 </div>
                </div>
            </li>
        
            <?php $loopb = new WP_Query( array( 'post_type' => 'slider' ) ); ?>
            <?php while ( $loopb->have_posts() ) : $loopb->the_post(); ?>
            <li class="splide__slide">
            <div class="splide__slide__container">
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
            <img id="bg"src="<?php echo $image[0];?>" alt="<?php the_title(); ?>" />
            <div class="content-box">
                <div class="content-info">
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
                </div>
            </div>
            </div>
            </li>
            <?php endwhile;?>
            <?php wp_reset_postdata();?>
		</ul>
	</div>
</div>