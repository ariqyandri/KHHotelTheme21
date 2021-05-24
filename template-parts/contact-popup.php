  <button
    type="button"
    class="btn btn-secondary dropdown-toggle"
    data-bs-toggle="dropdown"
    aria-expanded="false"
  > 				
    <i data-bs-toggle="tooltip" 
      data-bs-placement="bottom" 
      title="Contacts"
      class="far fa-comment-dots"></i>
  </button>
  <ul class="contact-popup-list dropdown-menu">
    <?php $loopb = new WP_Query( array( 'post_type' =>
    'contactinfo', 'tax_query' => array( array( 'taxonomy' => 'contacttype',
    'field' => 'slug', 'terms' => 'popup', ) ) ) ); ?>
    <?php while ( $loopb->have_posts() ) : $loopb->the_post();?>

    <a
      class="dropdown-item contact-popup-item"
      href="<?php the_field('link'); ?>"
      rel="noreferrer"
      target="_blank"

    >
    <li>
      <button        
        data-bs-toggle="tooltip" 
        data-bs-placement="left" 
        title="<?php the_title(); ?>">        
        <?php the_field('icon'); ?>
      </button>
    </li>
    </a>

    <?php endwhile;?>
    <?php wp_reset_postdata();?>
  </ul>
