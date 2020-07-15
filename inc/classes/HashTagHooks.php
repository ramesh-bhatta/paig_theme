<?php

if (!class_exists("HashTagHooks")) {
    class HashTagHooks
    {
        public function __construct()
        {
            add_action("wp_enqueue_scripts",array($this,"add_stylesheet_script"));
            add_action('wp_head', array($this, "renderThemeColor"));
            add_action("wp_footer", array($this, "enqueueStyles"));

        }


        public function add_stylesheet_script(){
            $css_folder=get_stylesheet_directory_uri()."/assets/css/";
            wp_enqueue_style( 'base-ndis-style', $css_folder."style.css", array(), HASHTAG_STYLE_VERSION );
            wp_enqueue_style( 'ndis-user', $css_folder."user.css", array(), HASHTAG_STYLE_VERSION );
            wp_enqueue_style( 'ndis-color', $css_folder."color.css", array(), HASHTAG_STYLE_VERSION );
            wp_enqueue_style( 'ndis-style', get_stylesheet_uri(), array(), HASHTAG_STYLE_VERSION );
        }

        public function renderThemeColor()
        {
            ob_start();
            include get_stylesheet_directory() . "/inc/templates/custom-theme-color.php";
            $str = ob_get_contents();
            echo $str;
            ob_end_flush();
        }

        public function enqueueStyles()
        {
            $js_folder=get_stylesheet_directory_uri()."/assets/js/";
            wp_enqueue_script("sticky-kite", $js_folder . 'sticky-kit.min.js"', array('jquery'));
            wp_enqueue_script("mmenu", $js_folder . 'mmenu.min.js"', array('jquery'));
            wp_enqueue_script("theme-custom", $js_folder. 'custom.js"', array('jquery'),HASHTAG_SCRIPT_VERSION);
        }
    }

    new HashTagHooks();
}

