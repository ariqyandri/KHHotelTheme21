<?php
/**
 * Template Name: Our Hotel
 *
 * Selectable from a dropdown menu on the edit page screen.
 */
?>

<?php
    get_header();
?>
<!-- Page Title -->
<?php
  get_template_part('template-parts/page-header','page-header');
?>
<!---->

<!-- Page Info -->
<?php
    get_template_part('template-parts/post','post');
?>
<!--  -->

<div class="page-content">

<!--Display Rooms Home-->
<?php
  get_template_part('template-parts/room-slider','room-slider');
?>
<!---->

<!-- Display Post -->
<?php global $post;
    $post_slug = $post->post_name; ?>
<?php $loopb = new WP_Query( array( 'post_type' =>
'post', 'tax_query' => array( array( 'taxonomy' => 'category', 'field' =>
'slug', 'terms' => $post_slug, ) ) ) ); ?>
<?php while ( $loopb->have_posts() ) : $loopb->the_post();?>
    
        <?php
            get_template_part('template-parts/post','post');
        ?>

<?php endwhile;?>
<?php wp_reset_postdata();?>
<!---->

<?php
    get_footer();
?>