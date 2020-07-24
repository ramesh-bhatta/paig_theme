<?php

/**
 * Add a custom link to the end of a specific menu that uses the wp_nav_menu() function
 */
/*
add_filter('wp_nav_menu_items', 'add_admin_link', 10, 2);
function add_admin_link($items, $args)
{
    $link = getCustomThemeValue("login_url","https://paighub.paig.com.au/auth/login");

    $hashtag_portal_img_url = getCustomThemeValue("hashtag_portal_logo","https://www.nationaldisabilityhouses.com.au/wp-content/uploads/5/2020/07/hashtag-portal-dark-menu.png");

    $hashtag_portal_url = getCustomThemeValue("hashtag_portal_url","");
    if ($args->theme_location == 'primary_menu') {

        $items .= "<li>
                    <a href='{$link}' class='sign-in' target='_blank'>
                        <i class='fa fa-user'></i> Login 
                    </a></li>";


         $show_hastag_logo = get_theme_mod("show_hashtag_portal_logo");
         if($show_hastag_logo == 'yes') {
             $items .= "<li class='portal-logo'>
                    <a href='{$hashtag_portal_url}' class='pr-0' target='__blank'>
                        <img src='{$hashtag_portal_img_url}' />
                    </a>
                    </li>";
         }
    }
    return $items;
}

*/
