<?php
function enqueue_scripts_front_end(){
//    wp_enqueue_script('jquery-ui-droppable');
    wp_enqueue_script('custom-admin-ui',get_stylesheet_directory_uri()."/assets/admin/field.js",array('jquery-ui-droppable'));

    wp_enqueue_style("admin-tailwind", PAIG_API_PLUGIN_URL . "/assets/css/tailwind.css");
}
add_action('admin_enqueue_scripts','enqueue_scripts_front_end');



add_action('add_meta_boxes', 'what_we_do_box');
function what_we_do_box()
{
     add_meta_box(
         'what-we-do-desc',
         'What We Do',
         'what_we_do_field',
         'page',
         'normal',
         'high');
}
?>
<?php
function what_we_do_field()
{
    ?>
    <textarea name="what_we_do_desc" id="what_we_do_desc" cols="90" rows="10"></textarea>
    <?php
}


add_action('add_meta_boxes', 'why_choose_us');
function why_choose_us()
{
    add_meta_box(
        'what-choose-us',
        'Why Choose Us',
        'why_choose_us_html',
        'page',
        'normal',
        'high');
}
?>
<?php
function why_choose_us_html()
{


    ?>
    <a href="#" class="mb-2" id="add_services" style="text-decoration: none;">
        <span class="dashicons dashicons-plus-alt"></span>
    </a>

    <div id="services-block" class="flex flex-wrap my-2">


    </div>


    <?php
}

add_action("save_post","save_post_custom_meta");
function save_post_custom_meta($post_id){
    $services=[];
    $services_title=$_POST["service_title"];
    $services_icons=$_POST["service_image_icon"];
    $services_content=$_POST["service_content"];
    for($i=0;$i<count($services_title);$i++){
        $service=array(
            "title"=>sanitize_text_field($services_title[$i]),
            "icon"=>sanitize_text_field($services_icons[$i]),
            "content"=>sanitize_text_field($services_content[$i]),

        );
        $key="service_meta".$i;
        if(isset($_POST["service_meta"])){
            $key=$_POST["service_meta"];
        }
        update_post_meta($post_id,$key,$service);
    }
    die;
}

?>
