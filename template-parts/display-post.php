<div class="display-post">
  <div class="content-info">
    <h1><?php the_title(); ?></h1>
    <h2><?php the_field('sub_header'); ?></h2>
    <?php the_content(); ?>
  </div>
  <div class="content-box">
    <!-- Features -->
    <div class="display-feature">
      <div class="display-feature-box">
        <div class="content-image">
          <img src="<?php the_field('feature_icon_one'); ?>" alt="<?php the_field('feature_one'); ?>" />
        </div>
        <div class="content-text">
          <h1><?php the_field('feature_one'); ?></h1>
          <p><?php the_field('feature_description_one'); ?></p>
        </div>
      </div>
    </div>
    <div class="display-feature">
      <div class="display-feature-box">
        <div class="content-image">
          <img src="<?php the_field('feature_icon_two'); ?>" alt="<?php the_field('feature_two'); ?>" />
        </div>
        <div class="content-text">
          <h1><?php the_field('feature_two'); ?></h1>
          <p><?php the_field('feature_description_two'); ?></p>
        </div>
      </div>
    </div>
    <div class="display-feature">
      <div class="display-feature-box">
        <div class="content-image">
          <img src="<?php the_field('feature_icon_three'); ?>" alt="<?php the_field('feature_three'); ?>" />
        </div>
        <div class="content-text">
          <h1><?php the_field('feature_three'); ?></h1>
          <p><?php the_field('feature_description_three'); ?></p>
        </div>
      </div>
    </div>
    <div class="display-feature">
      <div class="display-feature-box">
        <div class="content-image">
          <img src="<?php the_field('feature_icon_four'); ?>" alt="<?php the_field('feature_four'); ?>" />
        </div>
        <div class="content-text">
          <h1><?php the_field('feature_four'); ?></h1>
          <p><?php the_field('feature_description_four'); ?></p>
        </div>
      </div>
    </div>
    <!-- -->
  </div>
</div>