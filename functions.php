<?php
define("PAIG_THEME_VERSION","1.0");
define("PAIG_THEME_URL", get_template_directory_uri());

require get_template_directory() ."/inc/theme-setup.php";

require get_template_directory() . "/inc/customizer.php";

require get_template_directory() . "/inc/menus/class-bootstrap-navwalker.php";

require get_template_directory() ."/inc/custom-block.php";

require get_template_directory() ."/inc/home-meta-field.php";

require get_template_directory() ."/inc/contact_email.php";






define("VUE_COMPONENT_URL", get_template_directory_uri() . "/assets/vue/components/");


add_action('after_setup_theme', 'theme_setup');

function theme_setup()
{
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('menus');
    add_theme_support('customize-selective-refresh-widgets');
    register_nav_menus(array(
        'primary_menu' => __('Primary Menu', 'text_domain')
    ));
    register_nav_menus(array(
        'footer_menu' => __('Footer Menu', 'text_domain')
    ));
}

add_action('widgets_init', 'wpdocs_register_widgets');

function wpdocs_register_widgets()
{
    register_sidebar(array(
        'name'          => __('Main Sidebar', 'textdomain'),
        'id'            => 'sidebar-1',
        'description'   => __('Widgets in this area will be shown on all posts and pages.', 'textdomain'),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 1', 'textdomain'),
        'id'            => 'footer-1',
        'description'   => __('Widgets in this footer', 'textdomain'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 2', 'textdomain'),
        'id'            => 'footer-2',
        'description'   => __('Widgets in this footer 2', 'textdomain'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 3', 'textdomain'),
        'id'            => 'footer-3',
        'description'   => __('Widgets in this footer 3', 'textdomain'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ));
}



add_action("wp_footer", "register_query_scripts");

function register_query_scripts()
{

    wp_enqueue_script("chosen-script", get_template_directory_uri() . '/scripts/chosen.min.js', array('jquery'));
    wp_enqueue_script("magnific-script", get_template_directory_uri() . '/scripts/magnific-popup.min.js"', array('jquery'));
    wp_enqueue_script("rangeSlider", get_template_directory_uri() . '/scripts/rangeSlider.js"', array('jquery'));
    wp_enqueue_script("sticky-kite", get_template_directory_uri() . '/scripts/sticky-kit.min.js"', array('jquery'));
    wp_enqueue_script("masonry", get_template_directory_uri() . '/scripts/masonry.min.js"', array('jquery'));
    wp_enqueue_script("mmenu", get_template_directory_uri() . '/scripts/mmenu.min.js"', array('jquery'));
    wp_enqueue_script("tooltips", get_template_directory_uri() . '/scripts/tooltips.min.js"', array('jquery'));
    wp_enqueue_script("theme-custom", get_template_directory_uri() . '/scripts/custom.js"', array('jquery'));


    // wp_enqueue_script("",get_template_directory_uri().'/scripts/main.js');
}

function getCFSValue($name)
{
    if (function_exists("CFS")) {
        return CFS()->get($name);
    } else {
        return "";
    }
}

function getCustomThemeValue($name,$default_value="")
{
    return !empty(get_theme_mod($name)) ? get_theme_mod($name) : $default_value;
}




/**
 * Add a custom link to the end of a specific menu that uses the wp_nav_menu() function
 */


// add_filter('wp_nav_menu_items', 'add_admin_link', 10, 2);
// function add_admin_link($items, $args)
// {
//     $link = get_theme_mod("login_url");

//     if ($args->theme_location == 'primary_menu') {
//         $items .= "<li>
//                     <a href='{$link}' class='sign-in' target='__blank'>
//                         <i class='fa fa-user'></i> Log In / Register 
//                     </a></li>";
//     }
//     return $items;
// }

