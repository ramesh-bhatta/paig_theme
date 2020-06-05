
<?php

require get_template_directory() . "/inc/customizer.php";

require get_template_directory() . "/inc/menus/class-bootstrap-navwalker.php";

define("VUE_COMPONENT_URL", get_template_directory_uri() . "/assets/vue/components/");
define("PAIG_THEME_URL", get_template_directory_uri());




add_action('init', 'contact_form_enquerer');

function contact_form_enquerer()
{
    wp_register_script("custom_mail", PAIG_THEME_URL . '/scripts/custom_mail.js', array('jquery'));

    wp_localize_script('custom_mail', 'myAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce("contact_security_nonce")
    ));

    wp_enqueue_script('custom_mail');
}


add_action("wp_ajax_custom_form_submit", "custom_form_submit");
add_action("wp_ajax_nopriv_custom_form_submit", "custom_form_submit");
function custom_form_submit()
{

    if (!wp_verify_nonce($_POST['nonce'], "contact_security_nonce")) {
        wp_send_json_error(array(
            "msg" => "Not Valid"
        ));
    }

    $name = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : "";
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']): "";
    $subject = isset($_POST['subject']) ? sanitize_text_field($_POST['subject']) : "";
    $message = isset($_POST['comments']) ? sanitize_text_field($_POST['comments']) : "";
    $headers = array('Content-Type: text/html; charset=UTF-8');
    $to = "ramesh.paig@outlook.com";
    $mail = wp_mail($to, $subject, $message, $headers);

    if ($mail) {
        wp_send_json_success(array(
            "msg" => "Succesfully Send"
        ));
    } else {
        wp_send_json_error(array(
            "error" => "Failed "
        ));
    }
}

add_action("wp_mail_failed",function($wp_error){
    write_log($wp_error);
});

if ( ! function_exists('write_log')) {
    function write_log ( $log )  {
       if ( is_array( $log ) || is_object( $log ) ) {
          error_log( print_r( $log, true ) );
       } else {
          error_log( $log );
       }
    }
 }



add_action('after_setup_theme', 'theme_setup');

function theme_setup()
{
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

function getCustomThemeValue($name)
{
    return !empty(get_theme_mod($name)) ? get_theme_mod($name) : null;
}




/**
 * Add a custom link to the end of a specific menu that uses the wp_nav_menu() function
 */
add_filter('wp_nav_menu_items', 'add_admin_link', 10, 2);
function add_admin_link($items, $args)
{
    $link = get_theme_mod("login_url");

    if ($args->theme_location == 'primary_menu') {
        $items .= "<li>
                    <a href='{$link}' class='sign-in' target='__blank'>
                        <i class='fa fa-user'></i> Log In / Register 
                    </a></li>";
    }
    return $items;
}
