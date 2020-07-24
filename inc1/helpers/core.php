<?php

if (!function_exists('write_log')) {
    function write_log($log)
    {
        if (is_array($log) || is_object($log)) {
            error_log(print_r($log, true));
        } else {
            error_log($log);
        }
    }
}

function body_template($name, $email, $phone, $message)
{
    ob_start();
    include(get_stylesheet_directory() . "/template-parts/page-components/body-template.php");
    $str = ob_get_contents();
    ob_end_clean();
    return $str;
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

function getPaigSocialMedia(){
    return ["facebook","twitter","youtube","instagram","linkedin"];
}

function getCustomMetaValues($post_id,$custom_meta_key){
    $custom_meta = get_post_meta($post_id);
    if (!is_array($custom_meta)) {
        $custom_meta = [];
    }

    $service_arr = array_filter($custom_meta, function ($value) use ($custom_meta_key) {
        return  strpos($value, $custom_meta_key) > -1;
    }, ARRAY_FILTER_USE_KEY);

    return count($service_arr)>0?array_map(function ($value) {
        return unserialize($value[0]);
    }, $service_arr):[];
}

function getOfferMetaValues($post_id){
    return getCustomMetaValues($post_id,"offer_meta_");
}

function getServiceMetaValues($post_id){
    return getCustomMetaValues($post_id,"service_meta_");
}