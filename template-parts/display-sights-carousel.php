<?php 
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
?>
<div class="sights-carousel">
  <div class="sights-carousel-box">
    <div
      id="sightsCarousel"
      class="carousel slide carousel-fade"
      data-bs-ride="carousel"
    >
      <div class="carousel-inner">
        
        <div class="carousel-item active">
          <img src="<?php the_field('image_1');?>" class="d-block w-100" alt="<?php the_title(); ?>" />
        </div>

        <?php if (get_field('image_2')){         ?> 
        <div class="carousel-item ">
          <img src="<?php the_field('image_2');?>" class="d-block w-100" alt="<?php the_title(); ?>" />
        </div>
        <?php }; ?> 

        <?php if (get_field('image_3')){         ?> 
        <div class="carousel-item ">
          <img src="<?php the_field('image_3');?>" class="d-block w-100" alt="<?php the_title(); ?>" />
        </div>
        <?php }; ?> 

        <?php if (get_field('image_4')){         ?> 
        <div class="carousel-item ">
          <img src="<?php the_field('image_4');?>" class="d-block w-100" alt="<?php the_title(); ?>" />
        </div>
        <?php }; ?> 

      </div>
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#sightsCarousel"
        data-bs-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button
        id="initiate-sight-carousel"
        class="carousel-control-next"
        type="button"
        data-bs-target="#sightsCarousel"
        data-bs-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</div>
