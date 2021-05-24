<div class="home-carousel">
  <div class="home-carousel-box">
    <div
      id="homeCarousel"
      class="carousel slide carousel-fade"
      data-bs-ride="carousel"
    >
      <div class="carousel-inner">
        
        <div class="carousel-item active">
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );?>
            <div class="display-home-hedline">
                <div class="content-image">
                    <img src="<?php echo $image[0];?>" alt="<?php the_title(); ?>" />
                </div>
                <div class="content-box">
                    <div class="content-info">
                        <h1><?php the_field('headline'); ?></h1>
                    </div>
                    <div id="home" class="book-now-float">
                        <button
                            id="home"
                            class="book-now distributor"
                            rel="noreferrer"
                            target="_blank"
                        >
                        BOOK NOW
                        </button>
                    </div>
                 </div>
            </div>
        </div>

        <?php $loopb = new WP_Query( array( 'post_type' => 'slider' ) ); ?>
            <?php while ( $loopb->have_posts() ) : $loopb->the_post(); ?>
            <div id="slider" class="carousel-item">
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
            <img id="bg"src="<?php echo $image[0];?>" alt="<?php the_title(); ?>" />
            <div class="page-content">
            <div class="slider-display">
                <div class="display-content">
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
                </div>
            </div>
            </div>
            </div>

            <?php endwhile;?>
        <?php wp_reset_postdata();?>

      </div>
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#homeCarousel"
        data-bs-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button
        id="initiate-sight-carousel"
        class="carousel-control-next"
        type="button"
        data-bs-target="#homeCarousel"
        data-bs-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</div>
