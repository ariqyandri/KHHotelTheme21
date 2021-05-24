<?php
/**
 * Template Name: Sights
 *
 * Selectable from a dropdown menu on the edit page screen.
 */
?>

<?php get_header(); ?>

<!-- Page Title -->
<div class="page-title">
    <h1><?php the_title(); ?></h1>
</div>
<?php wp_reset_postdata();?>
<!---->

<!-- Sights Carousel -->
<?php while ( have_posts() ) : the_post(); ?> 

    <?php if (get_field('image_1')){
        get_template_part('template-parts/display-sights-carousel','sights-carousel');}
        else{
        }
    ?> 

<!---->

<!-- Content Margin -->
<div class="page-content">


<!-- Page Info -->
    <?php
        get_template_part('template-parts/page-info','page-info');
    ?>
<?php endwhile;?>
<!---->

<!-- Sights Display -->
<?php $terms = get_terms( array('taxonomy'=>'sight_category') );?>
<?php 
  foreach($terms as $term) {
      $name = $term->name; $slug = $term->slug; $id = $term->term_id; ?>
<div class="sights-display">
  <div class="sights-title">
    <h1><?php echo  $name;?></h1>
  </div>
  <div class="sights-section-margin">
    <div class="sights-section">
    <?php $loopb = new WP_Query( array( 'post_type' => 'sights', 
        'tax_query' => array( array( 
        'taxonomy' => 'sight_category',
        'field' => 'slug', 
        'terms' => $slug, ) ) ) );
    ?>
    <?php while ( $loopb->have_posts() ) : $loopb->the_post();?>

        <?php
            get_template_part('template-parts/display-sight','display-sight');
        ?>

    <?php endwhile;?>
    </div>
  </div>
</div>
<?php } ?>
<?php wp_reset_postdata();?>
<!---->

<!-- Display Post -->
<?php global $post;
    $post_slug = $post->post_name; ?>
<?php $loopb = new WP_Query( array( 'post_type' =>
'post', 'tax_query' => array( array( 'taxonomy' => 'category', 'field' =>
'slug', 'terms' => $post_slug, ) ) ) ); ?>
<?php while ( $loopb->have_posts() ) : $loopb->the_post();?>
    
    <div id="<?php echo $post_slug?>" class="post-display">
        <?php
            get_template_part('template-parts/display-post','display-post');
        ?>
    </div>

<?php endwhile;?>
<?php wp_reset_postdata();?>
<!---->

<?php wp_reset_postdata();?>
</div>
<!---->

<?php get_footer(); ?>