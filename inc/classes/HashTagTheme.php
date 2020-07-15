<?php

if(!class_exists("HashTagTheme")){
    class HashTagTheme
    {
        public function __construct()
        {
            add_action('after_setup_theme',array($this,"themeSetup"));
            add_action('wp',array($this,"installThemePage"));
            add_action('widgets_init',array($this,"registerWidgets"));

        }

        public function themeSetup()
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

        public function installThemePage() {
            $version=get_option("hashtag_theme_version");
            if(HASHTAG_THEME_VERSION===$version) return;
            $template=strpos(get_site_url(),"projects")!==false?'page-templates/page-listings.php':'page-templates/page-standard.php';
            $home_page_id=$this->createPage("home","Home",true,$template);
            $about_page=$this->createPage("about","About");
            $contact_page=$this->createPage("contact","Contact",false,'page-templates/page-contact.php');
            $privacy_page=$this->createPage('privacy-policy',"Privacy Policy",false);
            $this->setupMenuItems($home_page_id,$about_page,$contact_page);
            $this->storeCustomizerValues();
            //set new version
            update_option("hashtag_theme_version",HASHTAG_THEME_VERSION);
        }

        private function createPage($page_slug,$title,$is_front=false,$template_name=""){
            $page=get_page_by_path($page_slug);

            if(!$page){
                $page_details = array(
                    'post_title'    => $title,
                    'post_status'   => 'publish',
                    'post_author'   => 1,
                    'post_type' => 'page'
                );
                $post_id=wp_insert_post( $page_details );
            }
            else{
                $post_id=$page->ID;
            }
            if(!empty($template_name)){
                update_post_meta( $post_id, '_wp_page_template', $template_name);
            }
            if($is_front){

                update_option( 'page_on_front', $post_id);
                update_option( 'show_on_front', 'page' );
            }
            return $post_id;
        }

        private function setupMenuItems($home_page_id,$about_page_id,$contact_page_id){
            $menuName = "Header Menu";
            $menu = wp_get_nav_menu_object( $menuName );
            if($menu){
               wp_delete_nav_menu($menu);
            }
            $menu_id = wp_create_nav_menu($menuName);
            // Set up default BuddyPress links and add them to the menu.
            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' =>  __('Home'),
                'menu-item-object-id'=>$home_page_id,
                'menu-item-object' => 'page',
                'menu-item-status' => 'publish',
                'menu-item-type' => 'post_type',
            ));

            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' =>  __('Properties'),
                'menu-item-url' => home_url( '/search_properties/' ),
                'menu-item-status' => 'publish'));

            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' =>  __('About'),
                'menu-item-object-id'=>$about_page_id,
                'menu-item-object' => 'page',
                'menu-item-status' => 'publish',
                'menu-item-type' => 'post_type',
            ));

            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' =>  __('Contact'),
                'menu-item-object-id'=>$contact_page_id,
                'menu-item-object' => 'page',
                'menu-item-status' => 'publish',
                'menu-item-type' => 'post_type',
            ));
            //Set Header
            $locations = get_theme_mod('nav_menu_locations');
            $locations['primary_menu'] = $menu_id;
            set_theme_mod( 'nav_menu_locations', $locations );
        }

        private function storeCustomizerValues(){
            $social_links=[
                "facebook"=>"https://www.facebook.com/paigtechnologies/",
                "youtube"=>"https://www.youtube.com/channel/UCmRUGH5lgfDvFEklCerXOUA/featured",
                "instagram"=>"https://www.instagram.com/paigtechnologies/",
                "linkedin"=>"https://www.linkedin.com/company/paig-tech"
            ];
            foreach($social_links as $index=>$social_link){
                set_theme_mod($index, $social_link);
            }
            set_theme_mod("custom_logo_url","");
            set_theme_mod("hashtag_portal_logo","https://www.hashtagportal.com/wp-content/uploads/1/2020/06/logo.png");
            set_theme_mod("login_url","https://paighub.paig.com.au/auth/login");
            set_theme_mod("hashtag_portal_url","https://hashtagportal.com");
        }

        public function registerWidgets()
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

    }

    new HashTagTheme();
}
