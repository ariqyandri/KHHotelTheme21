<?php

//THEME
function mlh_theme_support(){
	//dynamic title support
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );
}
add_action('after_setup_theme','mlh_theme_support');
//

//STYLES
function mlh_register_style(){
	wp_enqueue_style( 'style-normalize', get_template_directory_uri()."/assets/css/normalize.css", array());

    wp_enqueue_style( 'style-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');

    wp_register_style( 'style-owl-carousel', get_template_directory_uri()."/assets/css/owl.carousel.min.css", array());
    
    wp_enqueue_style( 'style-bootstrap', get_template_directory_uri()."/assets/css/bootstrap.min.css", array('style-normalize'));

    wp_enqueue_style( 'style', get_template_directory_uri()."/style.css", array('style-normalize'),'','all');
}
add_action( 'wp_enqueue_scripts', 'mlh_register_style' );
//

//SCRIPTS
function mlh_register_scripts() {
	wp_enqueue_script('jquery',"https://code.jquery.com/jquery-3.4.1.slim.min.js", array(),'3.4.1', true);
	
    wp_enqueue_script('bootstrap-js',get_template_directory_uri()."/assets/js/bootstrap.min.js", array('jquery'), '5.0.0', true);
	
    wp_register_script('owl-carousel-js',get_template_directory_uri()."/assets/js/owl.carousel.min.js", array('jquery'), '2.3.4', true);

    wp_register_script('home-js',get_template_directory_uri()."/assets/js/home.js", array(), '2.3.4', true);

    wp_register_script('sights-js',get_template_directory_uri()."/assets/js/sights.js", array(), '2.3.4', true);

    wp_enqueue_script('script-js',get_template_directory_uri()."/assets/js/main.js", array(), '', true);

	wp_register_script('custom-script', get_template_directory_uri(). '/assets/js/custom.js', array('jquery'), '', true);
    // Localize the script with new data
    $script_data_array = array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'security' => wp_create_nonce( 'view_post' ),
    );
    wp_localize_script( 'custom-script', 'blog', $script_data_array );
}
add_action( 'wp_enqueue_scripts', 'mlh_register_scripts' );
//

//Enqueue Scripts
function home_scripts() {
    if(get_the_title() == 'Home'){
        wp_enqueue_style('style-owl-carousel');
        wp_enqueue_script('owl-carousel-js');
        wp_enqueue_script('home-js');
    }
}
add_action('wp_enqueue_scripts', 'home_scripts');

function sights_scripts() {
    if(get_the_title() == 'Sights'){
        wp_enqueue_script('sights-js');
    }
}
add_action('wp_enqueue_scripts', 'sights_scripts');

function custom_scripts() {
    if(get_the_title() == 'Home'||get_the_title() == 'Rooms'){
        wp_enqueue_script('custom-script');
    }
}
add_action('wp_enqueue_scripts', 'custom_scripts');
//

// remove bloat
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');
//

//MENUS
function mlh_menus(){
	$locations=array(
		'primary' => "Primary Menu",
		'sub' => "Sub Menu",
		'footer' => "Footer Menu"
	);
	register_nav_menus($locations);
}
add_action('init', 'mlh_menus');
//

// Ajax
add_action('wp_ajax_load_post_by_ajax', 'load_post_by_ajax_callback');
add_action('wp_ajax_nopriv_load_post_by_ajax', 'load_post_by_ajax_callback');
 
function load_post_by_ajax_callback() {
    check_ajax_referer('view_post', 'security');
    $args = array(
        'post_type' => 'rooms',
        'post_status' => 'publish',
        'p' => $_POST['id'],
    );
 
    $posts = new WP_Query( $args );
 
    $arr_response = array();
    if ($posts->have_posts()) {
 
        while($posts->have_posts()) {
 
            $posts->the_post();
            
            $terms = get_the_terms( $post->ID, 'facilities' );
            
            $facilities=array();

            foreach($terms as $term) {
                    $name = $term->name;
                    $id = $term->term_id;
                    $src = get_field('icon', 'facilities_'.$id );
                    $facilities[]=array('name'=>$name,'id'=>$id,'icon'=>$src);
            };

            $gallery = array(get_field('gallery_image_one'),get_field('gallery_image_two'),get_field('gallery_image_three'),get_field('gallery_image_four'));
            
            $policies = array(array('title'=>get_field('policy_title'), 'description'=>get_field('policy_text')),array('title'=>get_field('policy_title_second'), 'description'=>get_field('policy_text_second')));
            
            $arr_response = array(
                'title' => get_the_title(),
                'content' => get_the_content(),
				'facilities'=> $facilities,
                'price' => get_field('price'),
                'thumbnail'=> get_the_post_thumbnail($post->ID, 'medium'),
                'gallery'=> $gallery,
                'policies' => $policies,
                'offer' => get_field('offer'),

            );
        }
        wp_reset_postdata();
    }
    
    echo json_encode($arr_response);
 
    wp_die();
}
//