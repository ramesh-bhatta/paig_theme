<?php

if (!class_exists("HashTagTheme")) {
    class HashTagTheme
    {
        public function __construct()
        {
            add_action('after_setup_theme', array($this, "themeSetup"));
            add_action('wp', array($this, "installThemePage"));
            add_action('widgets_init', array($this, "registerWidgets"));

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

            register_nav_menus(array(
                'policy_menu' => __('Policy Menu', 'text_domain')
            ));

        }

        public function installThemePage()
        {
            $version = get_option("hashtag_theme_version");
            if (HASHTAG_THEME_VERSION === $version) return;
            $is_projects = strpos(get_site_url(), "projects") !== false;
//            $template=$is_projects?'page-templates/page-listings.php':'page-templates/page-standard.php';
            $home_page_id = $this->createPage("home", "Home", true);
            $about_page = $this->createPage("about", "About");
            $contact_page = $this->createPage("contact", "Contact", false, 'page-templates/page-contact.php');
            $privacy_page = $this->createPage('privacy-policy', "Privacy Policy");
            $terms_page = $this->createPage('terms-of-use', "Terms of Use");
            $this->setupMenuItems($home_page_id, $about_page, $contact_page);
            $this->setupPolicyMenu($terms_page, $privacy_page);
            $this->createWhatWeDo($home_page_id);
            $this->createWhatWeOffer($home_page_id); // what we offer is just description
            $this->createWhyChooseUs($home_page_id);
//            $this->storeCustomizerValues();
            //set new version
            update_option("hashtag_theme_version", HASHTAG_THEME_VERSION);
        }

        private function createPage($page_slug, $title, $is_front = false, $template_name = "")
        {
            $page = get_page_by_path($page_slug);

            if (!$page) {
                $page_details = array(
                    'post_title' => $title,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_type' => 'page'
                );

                $post_id = wp_insert_post($page_details);
            } else {
                $post_id = $page->ID;
            }
            if (!empty($template_name)) {
                update_post_meta($post_id, '_wp_page_template', $template_name);
            }
            if ($is_front) {
                update_option('page_on_front', $post_id);
                update_option('show_on_front', 'page');
            }
            return $post_id;
        }

        private function createWhatWeDo($home_id)
        {
            $offer_arr = getCustomMetaValues($home_id, "offer_meta_");

            if (!empty($offer_arr)) return;
            $offers = [
                [
                    "title" => "House",
                    "iconClass" => "im im-icon-Office",
                    "icon" =>"",
                    "content"=>""
                ],
                [
                    "title" => "Lands",
                    "iconClass" => "im im-icon-Landscape-2",
                    "icon" =>"",
                    "content"=>""
                ],
                [
                    "title" => "Apartments",
                    "iconClass" => "im im-icon-Building",
                    "icon" =>"",
                    "content"=>""
                ],
                [
                    "title" => "Garages",
                    "iconClass" => "im im-icon-Car",
                    "icon" =>"",
                    "content"=>""
                ],
            ];
            foreach ($offers as $index => $offer) {
                update_post_meta($home_id, "offer_meta_" . $index, $offer);
            }
        }

        private function createWhyChooseUs($home_id)
        {
            $service_arr = getCustomMetaValues($home_id, "service_meta_");

            if (!empty($service_arr)) return;

            $why_content = "To us, it's not just work - we take pride in the solutions we deliver. As everyone have a different journey we make sure you will have a unique experience.  With 100% transparency we guarantee you we will find the best deal to you. What does this mean? Tomorrow, we will be here for you. Helping you with everything that you need to purchase a house under only one roof.";
            $services = [
                [
                    "title" => "100% Secure",
                    "iconClass"=>"",
                    "icon"=>"",
                    "content" => $why_content
                ],
                [
                    "title" => "100% Reliable",
                    "iconClass"=>"",
                    "icon"=>"",
                    "content" =>$why_content
                ],
                [
                    "title" => "100% Trustable",
                    "iconClass"=>"",
                    "icon"=>"",
                    "content" => $why_content
                ]
            ];
            foreach ($services as $index => $service) {
                update_post_meta($home_id, "service_meta_" . $index, $service);
            }
        }


        private function createWhatWeOffer($home_id)
        {
            $service_arr = get_post_meta($home_id, "what_we_do_desc", true);
            if (!empty($service_arr)) return;

            $default_desc = "We work for you to provide the greatest result possible. This begins from the very initial point of communication and goes into our time spent with you to comprehend your requirements and your property. We will take the time to ensure you are capable to get an information decision that is right for your investment. We always understand the need of continually improving and modernizing our products and technology to keep our clients engaged and help each single one to achieve their goals. Making the most of our experience and doing it right.";

            update_post_meta($home_id, "what_we_do_desc", $default_desc);

        }


        private function setupMenuItems($home_page_id, $about_page_id, $contact_page_id)
        {
            $menuName = "Header Menu";
            $menu = wp_get_nav_menu_object($menuName);

            if ($menu) return;

            $menu_id = wp_create_nav_menu($menuName);
            // Set up default BuddyPress links and add them to the menu.
            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' => __('Home'),
                'menu-item-object-id' => $home_page_id,
                'menu-item-object' => 'page',
                'menu-item-status' => 'publish',
                'menu-item-type' => 'post_type',
            ));

            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' => __('Properties'),
                'menu-item-url' => home_url('/search_properties/'),
                'menu-item-status' => 'publish'));

            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' => __('About'),
                'menu-item-object-id' => $about_page_id,
                'menu-item-object' => 'page',
                'menu-item-status' => 'publish',
                'menu-item-type' => 'post_type',
            ));

            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' => __('Contact'),
                'menu-item-object-id' => $contact_page_id,
                'menu-item-object' => 'page',
                'menu-item-status' => 'publish',
                'menu-item-type' => 'post_type',
            ));
            //Set Header
            $locations = get_theme_mod('nav_menu_locations');
            $locations['primary_menu'] = $menu_id;
            set_theme_mod('nav_menu_locations', $locations);
        }

        private function setupPolicyMenu($terms_menu_id, $policy_menu_id)
        {
            $menuName = "Policy Menu";
            $menu = wp_get_nav_menu_object($menuName);

            if ($menu) return;

            $menu_id = wp_create_nav_menu($menuName);
            // Set up default BuddyPress links and add them to the menu.
            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' => __('Terms of Use'),
                'menu-item-object-id' => $terms_menu_id,
                'menu-item-object' => 'page',
                'menu-item-status' => 'publish',
                'menu-item-type' => 'post_type',
            ));
            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' => __('Privacy Policy'),
                'menu-item-object-id' => $policy_menu_id,
                'menu-item-object' => 'page',
                'menu-item-status' => 'publish',
                'menu-item-type' => 'post_type',
            ));

            $locations = get_theme_mod('nav_menu_locations');
            $locations['policy_menu'] = $menu_id;
            set_theme_mod('nav_menu_locations', $locations);
        }



        private function storeCustomizerValues()
        {
            $social_links = [
                "facebook" => "https://www.facebook.com/paigtechnologies/",
                "twitter" => "https://twitter.com/KaranPAIG",
                "youtube" => "https://www.youtube.com/channel/UCmRUGH5lgfDvFEklCerXOUA/featured",
                "instagram" => "https://www.instagram.com/paigtechnologies/",
                "linkedin" => "https://www.linkedin.com/company/paig-tech"
            ];
            foreach ($social_links as $index => $social_link) {
                $this->setCustomizerValues($index, $social_link);
            }
            $this->setCustomizerValues("custom_logo_url", "");
            $this->setCustomizerValues("hashtag_portal_logo", "https://www.hashtagportal.com/wp-content/uploads/1/2020/06/logo.png");
            $this->setCustomizerValues("login_url", "https://paighub.paig.com.au/auth/login");
            $this->setCustomizerValues("hashtag_portal_url", "https://hashtagportal.com");
        }

        private function setCustomizerValues($key, $value)
        {
            if (empty(get_theme_mod($key, ""))) {
                set_theme_mod($key, $value);
            }
        }

        public function registerWidgets()
        {
            register_sidebar(array(
                'name' => __('Main Sidebar', 'textdomain'),
                'id' => 'sidebar-1',
                'description' => __('Widgets in this area will be shown on all posts and pages.', 'textdomain'),
                'before_widget' => '<li id="%1$s" class="widget %2$s">',
                'after_widget' => '</li>',
                'before_title' => '<h2 class="widgettitle">',
                'after_title' => '</h2>',
            ));

            register_sidebar(array(
                'name' => __('Footer 1', 'textdomain'),
                'id' => 'footer-1',
                'description' => __('Widgets in this footer', 'textdomain'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widgettitle">',
                'after_title' => '</h2>',
            ));

            register_sidebar(array(
                'name' => __('Footer 2', 'textdomain'),
                'id' => 'footer-2',
                'description' => __('Widgets in this footer 2', 'textdomain'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widgettitle">',
                'after_title' => '</h2>',
            ));

            register_sidebar(array(
                'name' => __('Footer 3', 'textdomain'),
                'id' => 'footer-3',
                'description' => __('Widgets in this footer 3', 'textdomain'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widgettitle">',
                'after_title' => '</h2>',
            ));
        }

    }

    new HashTagTheme();
}
