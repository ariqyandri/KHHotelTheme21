<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Blog Site Template" />
    <?php 
        if(function_exists('the_custom_logo')){
          $custom_logo_id=get_theme_mod('custom_logo');		
          $logo=wp_get_attachment_image_src($custom_logo_id);
		}
    ?>
    <link
      rel="shortcut icon"
      href="<?php echo $logo[0] ?>"
    />	
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <!---->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-K05Y1FSWLS"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-K05Y1FSWLS');
    </script>
    <!---->
    <?php wp_head(); ?>
  </head>

  <body>
    <header class="header text-center main-nav">
      <nav class="navbar navbar-expand-md navbar-light bg-none">
        <a aria-current="page" class="navbar-brand active" href="<?php echo get_home_url() ?>">
          <img
            class="logo"
             src='<?php echo get_template_directory_uri()."/assets/images/logo.png" ?>'
            alt="logo" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarNav">
            <?php
				wp_nav_menu(
					array(
						'menu' => 'primary',
                        'container' => '', 
                        'theme_location' => 'primary',
                        'items_wrap' => '
                        <div class="navbar-nav" style="width:100&#37;;">%3$s</div>' 
                    ) 
                ); 
            ?>
        </div>
      </nav>
    </header>
    <main class="main-content">
        <div class="page">