<?php

if (!class_exists("HashTagContact")) {
    class HashTagContact
    {

        public function __construct()
        {
            add_action('wp_head',array($this,'contactStyles'));
            //wordpress to submit form through ajax
            add_action("wp_ajax_custom_form_submit",array($this,"custom_form_submit"));
            add_action("wp_ajax_nopriv_custom_form_submit",array($this,"custom_form_submit"));
            add_action("wp_mail_failed", function ($wp_error) {
                write_log($wp_error);
            });
        }


        public function contactStyles()
        {
            $js_folder=get_stylesheet_directory_uri()."/assets/js/";
            wp_register_script("custom_mail", $js_folder. 'custom_mail.js', array('jquery'));

            //pass wordpress variable to custom_mail.js file
            wp_localize_script('custom_mail', 'myAjax', array(
                'ajaxurl' => admin_url('admin-ajax.php'),
                'nonce' => wp_create_nonce("contact_security_nonce")
            ));
            wp_enqueue_script('custom_mail');
        }

        public function custom_form_submit()
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
            $to = get_option("admin_email");

            $body = body_template($name, $email, $phone, $message);

            $mail = wp_mail($to, $subject, $body, $headers);


            if ($mail) {
                wp_send_json_success(array(
                    "msg" => "Successfully Send"
                ));

                replyBackEmail($email, $name);

            } else {
                wp_send_json_error(array(
                    "error" => "failed "
                ));
            }
        }


        public function replyBackEmail($email, $name)
        {
            $to = $email;
            $subject = "Email From " . bloginfo("title");
            $body = "Dear" . $name . "Thankyou for your enquiry <br> We will be get back to you very soon !.";
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

    }

    new HashTagContact();
}
