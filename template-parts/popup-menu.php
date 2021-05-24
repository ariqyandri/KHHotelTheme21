<div class="popup-menu">
  <button type="button" class="btn btn-secondary offer-button" data-bs-toggle="modal"  
  data-bs-target="#offerModal">
    <i data-bs-toggle="tooltip" 
      data-bs-placement="bottom" 
      title="Offers"
      class="fas fa-ticket-alt"></i>
  </button>
  <?php get_template_part('template-parts/contact-popup','contact-popup'); ?>
</div>

<?php get_template_part('template-parts/display-offer','offer'); ?>