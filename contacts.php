<?php
/**
 * Template Name: Contacts
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
        get_template_part('template-parts/contact-page-info','contact-page-info');
    ?>
<?php endwhile;?>
<?php wp_reset_postdata();?>
<!---->

<!-- Location -->
<div class="map-display">
  <div class="map-title">
    <h1>Our Location</h1>
  </div>
  <div class="display-map">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2436.487841502098!2d4.883971615801589!3d52.361573679784534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c60993015364c1%3A0x707093e498d49097!2sHotel%20Museum%20Lane!5e0!3m2!1sen!2snl!4v1590490271250!5m2!1sen!2snl"
      frameborder="0"
      aria-hidden="false"
      tabindex="0"
      title="contact-map"
    ></iframe>
  </div>
</div>
<!---->

</div>
<!---->

<?php get_footer(); ?>