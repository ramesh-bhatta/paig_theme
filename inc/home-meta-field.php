<?php

add_action('admin_enqueue_scripts', 'enqueue_scripts_front_end');

function enqueue_scripts_front_end()
{
    wp_enqueue_media();
    wp_enqueue_script('custom-admin-ui', get_stylesheet_directory_uri() . "/assets/admin/field.js", array('jquery-ui-droppable'));
    wp_enqueue_style("admin-tailwind", PAIG_API_PLUGIN_URL . "/assets/css/tailwind.css");
}


//metabox for what we do section
add_action('add_meta_boxes', 'what_we_do_box');

function what_we_do_box()
{
    add_meta_box(
        'what-we-do-desc',
        'What We Do',
        'what_we_do_html',
        'page',
        'normal',
        'high'
    );
}


function what_we_do_html($post)
{
    $content = get_post_meta($post->ID, "what_we_do_desc", true);
    view_postMeta("inc/meta-templates/what-we-do-meta", compact('content'));
}

add_action("save_post", "what_we_do_save");

function what_we_do_save($post_id)
{
    $what_we_do_desc = isset($_POST['what_we_do_desc']) ? $_POST['what_we_do_desc'] : "";
    update_post_meta($post_id, "what_we_do_desc", $what_we_do_desc);
}



function view_postMeta($template, $data)
{
    extract($data);
    ob_start();
    include(get_stylesheet_directory() . "/" . $template . ".php");
    $str = ob_get_contents();
    ob_end_clean();
    echo $str;
}



//Metabox for what we offer

add_action('add_meta_boxes', 'what_we_offer');
function what_we_offer()
{
    add_meta_box(
        'what-we-offer',
        'What We Offer',
        'what_we_offer_html',
        'page',
        'normal',
        'high'
    );
}

function what_we_offer_html($post)
{
    view_postMeta("inc/meta-templates/what-we-offer-meta", array('post_id' => $post->ID));
}

add_action("save_post", "save_post_custom_meta_offer");

function save_post_custom_meta_offer($post_id)
{

    $offers = [];
    $offer_title = isset($_POST['offer_title']) ? $_POST['offer_title'] : "";
    $offer_iconClass = isset($_POST['offer_iconClass']) ? $_POST['offer_iconClass'] : "";
    $offer_icons = isset($_POST['offer_image_icon']) ? $_POST['offer_image_icon'] : "";
    $offer_desc = isset($_POST['offer_content']) ? $_POST['offer_content'] : "";

    //only work if offer has values
    if (isset($_POST['is_offer_page'])) {
        if (is_array($offer_title)) {
            for ($i = 0; $i < count($offer_title); $i++) {
                $offers = array(
                    "title" => sanitize_text_field($offer_title[$i]),
                    "iconClass" => sanitize_text_field($offer_iconClass[$i]),
                    "icon" => sanitize_text_field($offer_icons[$i]),
                    "content" => sanitize_text_field($offer_desc[$i])
                );

                $key = "offer_meta_" . $i;
                update_post_meta($post_id, $key, $offers);
            }
        }

        //database offer value
        $offer_metas = getOfferCustomMeta($post_id);

        $total = isset($_POST["offer_title"]) ? count($offer_title) : 0;
        //remove unnecessary field
        if (!empty($offer_metas)) {
            if (count($offer_metas) > $total) {
                for ($i = $total; $i < count($offer_metas); $i++) {
                    delete_post_meta($post_id, "offer_meta_" . $i);
                }
            }
        }
    }
}


//function to return existing offer array
function getOfferCustomMeta($post_id)
{
    $custom_meta = get_post_meta($post_id);

    if (!is_array($custom_meta)) {
        $custom_meta = [];
    }

    $offer_arr =  array_filter($custom_meta, function ($value) {
        return  strpos($value, "offer_meta_") > -1;
    }, ARRAY_FILTER_USE_KEY);

    return count($offer_arr) > 0 ? $offer_arr : [];
}

function getOfferMeta($post_id)
{
    $offer_array = array_map(function ($value) {
        return unserialize($value[0]);
    }, getOfferCustomMeta($post_id));
    return $offer_array;
}












//Metabox for services section
add_action('add_meta_boxes', 'why_choose_us');

function why_choose_us()
{
    add_meta_box(
        'what-choose-us',
        'Why Choose Us',
        'why_choose_us_html',
        'page',
        'normal',
        'high'
    );
}

function why_choose_us_html($post)
{
    view_postMeta("inc/meta-templates/why-choose-us-meta", array('post_id' => $post->ID));
}

add_action("save_post", "save_post_custom_meta_service");

function save_post_custom_meta_service($post_id)
{

    $services = [];
    $services_title = isset($_POST["service_title"]) ? $_POST["service_title"] : isset($_POST["service_title"]);
    $services_iconClass = isset($_POST["service_iconClass"]) ? $_POST["service_iconClass"] : isset($_POST["service_iconClass"]);
    $service_icons = isset($_POST["service_image_icon"]) ? $_POST["service_image_icon"] : "";
    $services_content = isset($_POST["service_content"]) ? $_POST["service_content"] : "";

    //only work if service has values
    if (isset($_POST["is_service_page"])) {
        if (is_array($services_title)) {
            for ($i = 0; $i < count($services_title); $i++) {
                $services = array(
                    "title" => sanitize_text_field($services_title[$i]),
                    "iconClass" => sanitize_text_field($services_iconClass[$i]),
                    "icon" => sanitize_text_field($service_icons[$i]),
                    "content" => sanitize_text_field($services_content[$i]),
                );
                $key = "service_meta_" . $i;
                update_post_meta($post_id, $key, $services);
            }
        }
        //database service value
        $service_metas = getServiceCustomMeta($post_id);

        $total = isset($_POST["service_title"]) ? count($services_title) : 0;
        //remove unnecessary field
        if (!empty($service_metas)) {
            if (count($service_metas) > $total) {
                for ($i = $total; $i < count($service_metas); $i++) {
                    delete_post_meta($post_id, "service_meta_" . $i);
                }
            }
        }
    }
}


//function to return existing serives array
function getServiceCustomMeta($post_id)
{
    $custom_meta = get_post_meta($post_id);

    return array_filter($custom_meta, function ($value) {
        return  strpos($value, "service_meta_") > -1;
    }, ARRAY_FILTER_USE_KEY);
}

function getServiceMeta($post_id)
{
    $service_array = array_map(function ($value) {
        return unserialize($value[0]);
    }, getServiceCustomMeta($post_id));
    return $service_array;
}
