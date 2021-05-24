</div>
</main>

<?php get_template_part('template-parts/popup-menu','popup-menu'); ?>

<?php get_template_part('template-parts/display-room','room'); ?>


<footer>
  <div>
    <img
      class="footer-svg"
      src='<?php echo get_template_directory_uri()."/assets/images/less high footer.svg" ?>'
      alt="footer"
    />
    <div class="footer">
      <div class="footer-content page-content">
        <section>
          <img
            class="logo"
            src='<?php echo get_template_directory_uri()."/assets/images/logo.png" ?>'
            alt="logo"
          />
          <div class="footer-contact">
            <?php $loopb = new WP_Query( array( 'post_type' =>
            'contactinfo', 'tax_query' => array( array( 'taxonomy' =>
            'contacttype', 'field' => 'slug', 'terms' => 'footer', ) ) ) ); ?>
            <?php while ( $loopb->have_posts() ) : $loopb->the_post();?>
                <a href="<?php the_field('link'); ?>"     
                rel="noreferrer"
                target="_blank">
                  <?php the_content();?>
                </a>

            <?php endwhile;?>
          </div>
        </section>
      </div>
    </div>
    <div class="footer-end">
      <div class="footer-content page-content">
        <section>
          <p>
            Hotel Museum Lane ©
            <?php echo date('Y');?>
            |
          </p>
          <a href="<?php echo get_privacy_policy_url();?>">Privacy Policy</a>
        </section>
      </div>
    </div>
  </div>
</footer>

<script type='text/javascript' src="https://kit.fontawesome.com/b1e327743d.js" crossorigin="anonymous"></script>
<?php wp_footer(); ?>

</body>

</html>
