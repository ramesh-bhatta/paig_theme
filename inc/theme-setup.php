<?php

add_action('after_switch_theme', 'page_install_custom');

function page_install_custom () {
    // DO ALL THE THINGS
    $option=get_option("paig_theme_version");
    if(!$option||$option!==PAIG_THEME_VERSION){
        $page_name='home-page';
        if(get_page_by_path('$page_name')!=='home-page'){
            install_home_page($page_name);
        }
        
        die;
    }
}

function install_home_page($page_name){
    $post = array(
        'menu_order'=>1,
        'post_title'=>'Home Page',
        'post_status'=>'publish',
        'post_slug'=>'',
        'post_name'=>$page_name,
        'post_type'=>'page'
    );
    wp_insert_post($post);  
}
