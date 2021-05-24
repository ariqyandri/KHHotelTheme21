<?php 
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
?>
<div class="page-info-display">
    <div class="display-page-info">
      <div class="content-image">
        <img src="<?php echo $image[0];?>" alt="<?php the_title(); ?>" />
      </div>
      <div class='content-info {title}'>
        <h1><?php the_field('header'); ?></h1>
        <h2><?php the_field('header_second'); ?></h2>
        <?php the_content(); ?>
      </div>
    </div>
</div>