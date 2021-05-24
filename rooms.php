<?php
/**
 * Template Name: Rooms
 *
 * Selectable from a dropdown menu on the edit page screen.
 */
?>

<?php get_header(); ?>

<!-- Page Title -->
<div class="page-title">
    <h1><?php the_title(); ?></h1>
</div>
<!---->

<!-- Content Margin -->
<div class="page-content">

<!-- Page Info -->
<?php while ( have_posts() ) : the_post(); ?> 
    
    <?php
        get_template_part('template-parts/page-info','page-info');
    ?>

<?php endwhile;?>
<?php wp_reset_postdata();?>
<!---->

<!-- Display Rooms -->
<div class="rooms-display">
  <div class="rooms-title">
    <h1>Our Rooms</h1>
  </div>
  <div class="rooms-section-margin">
    <div class="rooms-section">
      <?php $loopb = new WP_Query( array( 'post_type' => 'rooms' ) ); ?>
      <?php while ( $loopb->have_posts() ) : $loopb->the_post(); ?>
        
        <?php
            get_template_part('template-parts/display-room-card','room-card');
        ?>

      <?php endwhile;?>
    </div>
  </div>
</div>
<?php wp_reset_postdata();?>
<!---->

</div>
<!---->

<?php get_footer(); ?>