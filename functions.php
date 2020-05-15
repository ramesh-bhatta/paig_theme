
<?php

require get_template_directory() . "/inc/customizer.php";

require get_template_directory() . "/inc/menus/class-bootstrap-navwalker.php";

define("VUE_COMPONENT_URL",get_template_directory_uri()."/assets/vue/components/");


add_action('after_setup_theme','theme_setup');

function theme_setup(){
    add_theme_support('custom-logo');
    add_theme_support('menus');
    add_theme_support( 'customize-selective-refresh-widgets' );
    register_nav_menus( array(
        'primary_menu' => __( 'Primary Menu', 'text_domain' )
    ) );
}

add_action( 'widgets_init', 'wpdocs_register_widgets' );
 
function wpdocs_register_widgets() {
    register_sidebar( array(
        'name'          => __( 'Main Sidebar', 'textdomain' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 1', 'textdomain' ),
        'id'            => 'footer-1',
        'description'   => __( 'Widgets in this footer', 'textdomain' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 2', 'textdomain' ),
        'id'            => 'footer-2',
        'description'   => __( 'Widgets in this footer 2', 'textdomain' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 3', 'textdomain' ),
        'id'            => 'footer-3',
        'description'   => __( 'Widgets in this footer 3', 'textdomain' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}


    
add_action("wp_footer","register_query_scripts");

function register_query_scripts(){
    
    wp_enqueue_script("axios-script","https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js");
    wp_enqueue_script("vue-script","https://cdn.jsdelivr.net/npm/vue/dist/vue.js");
    wp_enqueue_script("searchbar-script",VUE_COMPONENT_URL."searchbar.js");
    wp_enqueue_script("carousel-script",VUE_COMPONENT_URL."properties-carousel.js");
    //Main File should always be in bottom
    wp_enqueue_script("main-script",get_template_directory_uri().'/scripts/main.js');
    // wp_enqueue_script("",get_template_directory_uri().'/scripts/main.js');
}

function getCFSValue($name){
	if(function_exists("CFS")){
		return CFS()->get($name);
	}
	else{
		return "";
	}
}

?>