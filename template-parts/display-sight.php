<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID
),'full' ); ?>
<div class="display-sight">
  <a
    class="content-image"
    href="<?php the_field('website_link'); ?>"
    rel="noreferrer"
    target="_blank"
  >
    <img src="<?php echo $image[0];?>" alt="<?php the_title(); ?>" />
  </a>
  <div class="content-info">
    <div>
      <h1>
        <a
          href="<?php the_field('website_link'); ?>"
          rel="noreferrer"
          target="_blank"
        >
          <?php the_title(); ?>
        </a>
      </h1>
      <a
        href="<?php the_field('address_link'); ?>"
        rel="noreferrer"
        target="_blank"
      >
        <p>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="22"
            height="22"
            fill="currentColor"
            class="bi bi-geo-alt-fill"
            viewBox="0 0 16 16"
          >
            <path
              d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"
            />
          </svg>
          <?php the_field('address'); ?>
        </p>
      </a>
      <?php the_content(); ?>
    </div>
    <p class="visit-text">
      <a
        href="<?php the_field('website_link'); ?>"
        rel="noreferrer"
        target="_blank"
      >
        Visit Site
      </a>
    </p>
  </div>
</div>
