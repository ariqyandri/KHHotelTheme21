
<?php wp_reset_postdata();?>
<div
  class="modal fade"
  id="offerModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
<div class="modal-dialog offer-display">
  <div class="modal-content display-offer-content">
        <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">Offers</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <div class="modal-body">
            <?php wp_reset_postdata();?>   
            <?php $loopb = new WP_Query( array( 'post_type' =>
            'offers' ) ); ?>
            <?php while ( $loopb->have_posts() ) : $loopb->the_post(); ?>
              <?php 
              if (get_field('expiry_date')&&strtotime(get_field('expiry_date')) < strtotime('today')) {;
              } else {?>
              <div class="offer">
                <h2><?php the_title();?></h2>
                <p><?php the_content();?></p>
                <div class="offer-bottom">
                  <p>Code: <strong><?php the_field('code');?></strong></p>
                  <button
                    class="book-now distributor"
                    rel="noreferrer"
                    target="_blank"
                  >
                    CHECK AVAILABILITY
                  </button>
                </div>
              </div>
              <?php }?>
            <?php endwhile;?>
            <?php wp_reset_postdata();?>      
          </div>
    </div>
</div>
</div>
