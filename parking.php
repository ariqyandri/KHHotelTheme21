<?php
/**
 * Template Name: Parking
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



<!-- Location -->
<div class="map-display">
  <div class="map-title">
    <h1>Park and Ride (P+R)</h1>
  </div>
  <div class="display-map">
  <?php global $post;
    $post_slug = $post->post_name; 
    echo $post_slug?>
  <?php $loopb = new WP_Query( array( 'post_type' =>
    'post', 'tax_query' => array( array( 'taxonomy' => 'category', 'field' =>
    'slug', 'terms' => $post_slug, ) ) ) ); ?>
  <?php while ( $loopb->have_posts() ) : $loopb->the_post();?>
    <?php
        get_template_part('template-parts/display-parking','parking');
    ?>
  <?php endwhile;?>
  <?php wp_reset_postdata();?>
  </div>
</div>
<!---->

</div>
<!---->

<?php get_footer(); ?>