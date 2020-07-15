<?php

define("HASHTAG_ADMIN_BASE_PATH",__DIR__);
if(!class_exists("HashTagAdmin")){
    class HashTagAdmin
    {
        private $meta_boxes=[WhatWeDoMeta::class,WhatWeOfferMeta::class,WhyChooseUsMeta::class];

        public function __construct()
        {
            add_action('admin_enqueue_scripts',array($this,'enqueue_scripts_front_end'));
            add_action("admin_init",array($this,"registerMetas"));
        }


        public function enqueue_scripts_front_end()
        {
            $folder_path=get_stylesheet_directory_uri(). "/inc/admin/assets/";
            $front_page=get_option('page_on_front');
            if(!isset($_GET["post"])) return;
            if(intval($_GET["post"])!==intval($front_page)) return;
            wp_enqueue_media();
            wp_enqueue_script('custom-admin-ui', $folder_path."js/field.js", array('jquery-ui-droppable'));
            wp_enqueue_style("admin-tailwind", "https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css");
        }

        public function registerMetas(){
            foreach($this->meta_boxes as $meta_box){
                if(!class_exists($meta_box)) return;
                new $meta_box();
            }
        }
    }
    new HashTagAdmin();
}
