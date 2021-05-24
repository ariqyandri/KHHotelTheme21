<div class="page-info-display">
  <div class="display-page-info">
    <div class="content-image">
      <div class="contacts-display">
        <div class="display-contacts">
          <div class="content-title">
            <h1><?php the_field('header'); ?></h1>
            <h2><?php the_field('header_second'); ?></h2>
          </div>
          <div class="content-info-contacts">
            <div class="main">
              <?php $loopb = new WP_Query( array( 'post_type' =>
              'contactinfo', 'tax_query' => array( array( 'taxonomy' =>
              'contacttype', 'field' => 'slug', 'terms' => 'main', ) ) ) ); ?>
              <?php while ( $loopb->have_posts() ) : $loopb->the_post();?>

              <a id="first" class="display-contact" href="<?php the_field('link'); ?>" 
                rel="noreferrer"
                target="_blank">
                <div class="display-contact-box">
                  <div class="content-text">
                  <?php the_field('icon'); ?>  <h1><?php the_title(); ?></h1> 
                  </div>
                  <p><?php the_content(); ?></p>
                </div>
              </a>

              <?php endwhile;?>
              <?php wp_reset_postdata();?>

              <?php $loopb = new WP_Query( array( 'post_type' =>
              'contactinfo', 'tax_query' => array( array( 'taxonomy' =>
              'contacttype', 'field' => 'slug', 'terms' => 'secondary', ) ) ) );
              ?>
              <?php while ( $loopb->have_posts() ) : $loopb->the_post();?>

              <div id="second" class="display-contact">
                <div class="display-contact-box">
                  <div class="content-text">
                    <h1><?php the_title(); ?></h1>
                  </div>
                  <p><?php the_content(); ?></p>
                </div>
              </div>

              <?php endwhile;?>
              <?php wp_reset_postdata();?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content-info">
      <h1><?php the_field('headline'); ?></h1>
      <h2></h2>
      <?php the_content(); ?>
    </div>
  </div>
</div>