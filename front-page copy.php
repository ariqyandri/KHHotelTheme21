<?php
    get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
    
<!-- Home Headline -->
    <?php
        get_template_part('template-parts/h-slider','slider');
    ?>
<!---->



<div class="page-content">

<!-- Page Info -->
    
    <?php
        get_template_part('template-parts/page-info','page-info');
    ?>

<?php endwhile;?>
<!---->

<!--Display Rooms Home-->
<div class="home-rooms-display">
  <div class="home-rooms-title">
    <h1>Our Rooms</h1>
  </div>
  <div class="home-rooms-section">
    <div class="home-rooms-section-margin owl-carousel room-slider">
    <?php $loopb = new WP_Query( array( 'post_type' =>
    'rooms' ) ); ?>
    <?php while ( $loopb->have_posts() ) : $loopb->the_post(); ?>

      <?php
          get_template_part('template-parts/display-room-card','room-card');
      ?>

    <?php endwhile;?>
    <?php wp_reset_postdata();?>
    </div>
  </div>
</div>
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

<!-- Guestbook Entries -->
<div class="guestbook-entries-display">
  <div class="guestbook-entries-title">
    <h1>Guestbook</h1>
  </div>
  <div class="display-guestbook-entries">
    <div class="content-info">
      <div class="owl-carousel owl-theme guestbook-slider">

        <?php $loopb = new WP_Query( array( 'post_type' =>'guestbook' ) ); ?>
        <?php while ( $loopb->have_posts() ) : $loopb->the_post(); ?>
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'medium' ); ?>
        
        <div class="content-item">
          <h2><?php the_content(); ?></h2>
          <p><strong><?php the_field('name'); ?></strong> | <?php the_field('date'); ?></p>
        </div>
        
        <?php endwhile;?>

      </div>
    </div>
  </div>
</div>
<?php wp_reset_postdata();?>


<?php
    get_footer();
?>