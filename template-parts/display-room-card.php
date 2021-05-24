<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full' ); ?>
<?php
global $post;
$post_slug = $post->post_name; ?>
<div class="display-room-card">
  <div class="content-book">
    <div id="small" class="book-now-float">
        <button
            id="small"
            class="book-now distributor"
            rel="noreferrer"
            target="_blank"
        >
            BOOK NOW
        </button>
    </div>
  </div>
  <div class="content-image show-room" href="#<?php echo $post_slug;?>">
  <button data-id="<?php the_ID(); ?>" class="view-post" data-bs-toggle="modal" data-bs-target="#postModal">
    <img src="<?php echo $image[0];?>" alt="<?php the_title(); ?>"/>
  </button>
  </div>
  <div class="content-box show-room" href="#<?php echo $post_slug;?>">
    <div class="content-info view-post" data-id="<?php the_ID(); ?>"  data-bs-toggle="modal" data-bs-target="#postModal">
      <div class="content-title">
        <h1><?php the_title(); ?></h1>
        <p><?php the_content(); ?></p>
      </div>
      <div class="content-facilities">
        <?php $terms = get_the_terms( $post->ID, 'facilities' );?>
        <?php 
        foreach($terms as $term) {
            $name = $term->name;
            $slug = $term->slug;
            $id = $term->term_id;
        ?>       
        
        <img data-bs-toggle="tooltip" 
        data-bs-placement="bottom" 
        title="<?php echo  $name;?>"
        src='<?php the_field('icon', 'facilities_'.$id );?>' alt='<?php echo  $name;?>' />

        <?php } ?>
      </div>

    </div>
    <div class="content-buttons view-post" data-id="<?php the_ID(); ?>" data-bs-toggle="modal" data-bs-target="#postModal">
      <div class="price">
        <h2><?php the_field('price'); ?> €</h2>
        <h3>p.n.</h3>
        <h3>View Room</h3>
      </div>
    </div>
  </div>
</div>
