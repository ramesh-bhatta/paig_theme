<?php
use PAIG\Common\Option;

add_action('init', 'contact_form_enquerer');


function contact_form_enquerer()
{
    wp_register_script("custom_mail", PAIG_THEME_URL . '/scripts/custom_mail.js', array('jquery'));

    //pass wordpress variable to custom_mail.js file
    wp_localize_script('custom_mail', 'myAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce("contact_security_nonce")
    ));
    wp_enqueue_script('custom_mail');
}


//wordpress to submit form through ajax
add_action("wp_ajax_custom_form_submit", "custom_form_submit");
add_action("wp_ajax_nopriv_custom_form_submit", "custom_form_submit");

function custom_form_submit()
{

    if (!wp_verify_nonce($_POST['nonce'], "contact_security_nonce")) {
        wp_send_json_error(array(
            "msg" => "Not Valid"
        ));
    }

    $name = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : "";
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : "";
    $phone = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : "";
    $subject = isset($_POST['subject']) ? sanitize_text_field($_POST['subject']) : "";
    $message = isset($_POST['comments']) ? sanitize_text_field($_POST['comments']) : "";
    $headers = array('Content-Type: text/html; charset=UTF-8');
    $to = Option::getValue("email");

    $body = body_template($name, $email,$phone, $message);

    $mail = wp_mail($to, $subject, $body, $headers);



    if ($mail) {
        wp_send_json_success(array(
            "msg" => "Successfully Send"
        ));

        replyBackEmail($email,$name);

    } else {
        wp_send_json_error(array(
            "error" => "failed "
        ));
    }
}

add_action("wp_mail_failed", function ($wp_error) {
    write_log($wp_error);
});

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


function replyBackEmail($email,$name){
  $to = $email;
  $subject = "Email From ".bloginfo("title");
  $body = "Dear".$name."Thankyou for your enquiry <br> We will be get back to you very soon !.";
  $headers = array('Content-Type: text/html; charset=UTF-8');
  $send_mail = wp_mail($to, $subject, $body, $headers);

    if ($send_mail) {
        wp_send_json_success(array(
            "reply_msg" => "Replied Successfully "
        ));

    } else {
        wp_send_json_error(array(
            "reply_error" => "Repy Failed "
        ));
    }

}



function body_template($name,$email,$phone,$message){
    ob_start();
        include(get_stylesheet_directory()."/template-parts/page-components/body-template.php");
    $str=ob_get_contents();
    ob_end_clean();
    return $str;
}



