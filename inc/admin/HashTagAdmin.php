<?php

define("HASHTAG_ADMIN_BASE_PATH",__DIR__);
if(!class_exists("HashTagAdmin")){
    class HashTagAdmin
    {
        private $meta_boxes=[WhatWeDoMeta::class,WhatWeOfferMeta::class,WhyChooseUsMeta::class];
        public function __construct()
        {
//            var_dump($_GET);
            if(!isset($_GET["post"])&&!isset($_POST["post_ID"])) return;
            $id=0;
            if(isset($_GET["post"])){
                $id=$_GET["post"];
            }
            if(isset($_POST["post_ID"])){
                $id=$_POST["post_ID"];
            }
            if($id!==get_option( 'page_on_front' )) return;
            add_action('admin_enqueue_scripts',array($this,'enqueue_scripts_front_end'));
            add_action("admin_init",array($this,"removeDefaultContent"));
            add_action("admin_init",array($this,"registerMetas"));
            add_action("admin_init",array($this,"registerBannerBoxes"));
        }

        public function remove_default_post_type(){
            remove_menu_page( 'edit.php' );
        }

        public function enqueue_scripts_front_end()
        {
            $folder_path=get_stylesheet_directory_uri(). "/inc/admin/assets/";
            wp_enqueue_media();
            wp_enqueue_script('custom-admin-ui', $folder_path."js/field.js", array('jquery-ui-droppable'));
            wp_enqueue_style("admin-tailwind", $folder_path."css/tailwind.css",null,HASHTAG_THEME_VERSION);
        }

        public function removeDefaultContent(){
            remove_post_type_support( 'page', 'editor' );
        }

        public function registerMetas(){
            foreach($this->meta_boxes as $meta_box){
                if(!class_exists($meta_box)) return;
                new $meta_box();
            }
        }

        public function registerBannerBoxes(){
//            new BannerMeta("top_banner","Top Banner");
            new BannerMeta("middle_banner","Banner Banner");
            new BannerMeta("bottom_banner","Bottom Banner");
        }
    }
    new HashTagAdmin();
}
