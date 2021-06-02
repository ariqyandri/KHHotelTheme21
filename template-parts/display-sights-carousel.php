<div class=splide id="sight-splide">
	<div class="splide__track">
		<ul class="splide__list">
           
            <li class="splide__slide">
                <div class="splide__slide__container">          
                <img src="<?php the_field('image_1');?>" class="d-block w-100" alt="<?php the_title(); ?>" />
                </div>
            </li>

        <?php if (get_field('image_2')){         ?> 
          <li class="splide__slide">
                <div class="splide__slide__container">             
                <img src="<?php the_field('image_2');?>" class="d-block w-100" alt="<?php the_title(); ?>" />
                </div>
            </li>
        <?php }; ?> 

        <?php if (get_field('image_3')){         ?> 
          <li class="splide__slide">
                <div class="splide__slide__container">             
                <img src="<?php the_field('image_3');?>" class="d-block w-100" alt="<?php the_title(); ?>" />
                </div>
            </li>
        <?php }; ?> 


        <?php if (get_field('image_4')){         ?> 
          <li class="splide__slide">
                <div class="splide__slide__container">             
                <img src="<?php the_field('image_4');?>" class="d-block w-100" alt="<?php the_title(); ?>" />
                </div>
            </li>
        <?php }; ?> 
		</ul>
	</div>
</div>