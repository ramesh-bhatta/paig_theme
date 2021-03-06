
<?php 

function paig_metadata_customize_register( $wp_customize ) {

    // Create our panels

    $wp_customize->add_panel( 'paig_site_meta', array(
        'capability'     => 'edit_theme_options',
        'title'          => 'Paig Site Meta',
    ));

            
    // Create our sections
    $wp_customize->add_section( 'paig_contact_details' , array(
        'title'             => 'PAIG Contact Details',
        'panel'             => 'paig_site_meta',
    ));
            
    // Create our settings

    $wp_customize->add_setting( 'phone_number1' , array(
        'type'          => 'theme_mod',
        'transport'     => 'refresh',
    ));
    $wp_customize->add_control( 'phone_number_control1', array(
        'label'      => 'Phone Number 1',
        'section'    => 'paig_contact_details',
        'settings'   => 'phone_number1',
        'type'       => 'text',
    ) );

    $wp_customize->add_setting( 'phone_number2' , array(
        'type'          => 'theme_mod',
        'transport'     => 'refresh',
    ));
    $wp_customize->add_control( 'phone_number_control2', array(
        'label'      => 'Phone Number 2',
        'section'    => 'paig_contact_details',
        'settings'   => 'phone_number2',
        'type'       => 'text',
    ) );

    $wp_customize->add_setting( 'email_address' , array(
        'type'          => 'theme_mod',
        'transport'     => 'refresh',
    ));
    $wp_customize->add_control( 'email_address_control', array(
        'label'      => 'Email Address',
        'section'    => 'paig_contact_details',
        'settings'   => 'email_address',
        'type'       => 'text',
    ) );

    $wp_customize->add_setting( 'address' , array(
        'type'          => 'theme_mod',
        'transport'     => 'refresh',
    ));
    $wp_customize->add_control( 'address_control', array(
        'label'      => 'Address',
        'section'    => 'paig_contact_details',
        'settings'   => 'address',
        'type'       => 'text',
    ) );



    $wp_customize->add_setting( 'map_iframe', array(
        'type'           => 'theme_mod',
        'transport' => 'refresh',
       // 'sanitize_callback' => 'sanitize_textarea_field'
    ) );
    // Add control
    $wp_customize->add_control( new WP_Customize_Control(
            $wp_customize,
            'map_iframe_control',
            array(
                'label'    => 'Embed Map',
                'section'  => 'paig_contact_details',
                'settings' => 'map_iframe',
                'type'     => 'textarea'
            )
        )
    );







    $wp_customize->add_section( 'paig_social_media_links' , array(
        'title'             => 'PAIG Social Media Links',
        'panel'             => 'paig_site_meta',
    ));


    $social_media=getPaigSocialMedia();

    foreach($social_media as $social){
        $wp_customize->add_setting( $social , array(
            'type'          => 'theme_mod',
            'transport'     => 'refresh',
        ));
    
        $wp_customize->add_control( $social.'_control', array(
            'label'      => $social,
            'section'    => 'paig_social_media_links',
            'settings'   => $social,
            'type'       => 'text',
        ) );
    }

    $wp_customize->add_section( 'paig_custom_settings' , array(
        'title'             => 'PAIG Custom Settings',
        'panel'             => 'paig_site_meta',
    ));

    $wp_customize->add_setting( "login_url" , array(
        'type'          => 'theme_mod',
        'transport'     => 'refresh',
    ));

    $wp_customize->add_control( 'login_url_control', array(
        'label'      => "Login URL",
        'section'    => 'paig_custom_settings',
        'settings'   => "login_url",
        'type'       => 'text',
    ) );

    $wp_customize->add_setting('hashtag_portal_logo', array(
        'type'=>'theme_mod',
        'transport'      => 'refresh',
        'height'         => 325,
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hashtag_portal_logo_control', array(
        'label'             => "Hashtag Portal Logo",
        'section'           => 'paig_custom_settings',
        'settings'          => 'hashtag_portal_logo',
    )));

    $wp_customize->add_setting('hashtag_portal_logo_white', array(
        'type'=>'theme_mod',
        'transport'      => 'refresh',
        'height'         => 325,
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hashtag_portal_logo_white_control', array(
        'label'             => "Hashtag Portal White Logo",
        'section'           => 'paig_custom_settings',
        'settings'          => 'hashtag_portal_logo_white',
    )));


    $wp_customize->add_setting('hashtag_portal_url', array(
        'type'=>'theme_mod',
        'transport'      => 'refresh',
        'height'         => 325,
    ));

    $wp_customize->add_control( 'hashtag_portal_url',array(
        'label'             => "Hashtag Portal URL",
        'section'           => 'paig_custom_settings',
        'settings'          => 'hashtag_portal_url',
    ));

    $wp_customize->add_setting('show_hashtag_portal_logo', array(
        'type'=>'theme_mod',
        'transport'      => 'refresh',
        'height'         => 325,
        'default' => 'yes'
    ));

    $wp_customize->add_control( 'show_hashtag_portal_logo',array(
        'type' => 'select',
        'label'             => "Show Hashtag Portal",
        'section'           => 'paig_custom_settings',
        'settings'          => 'show_hashtag_portal_logo',
        'choices' => array(
            'no' => 'No',
            'yes' => 'Yes'
        ),
    ));


    $wp_customize->add_setting('custom_logo_url', array(
        'type'=>'theme_mod',
        'transport'      => 'refresh',
        'height'         => 325,
    ));

    $wp_customize->add_control( 'custom_logo_url_control', array(
        'label'             => "Custom Logo URL",
        'section'           => 'paig_custom_settings',
        'settings'          => 'custom_logo_url',
    ));


    $wp_customize->add_section( 'paig_footer_settings' , array(
        'title'             => 'PAIG Footer Settings',
        'panel'             => 'paig_site_meta',
    ));

    //for copyright text and url

    $wp_customize->add_setting( "copyright_text" , array(
        'type'          => 'theme_mod',
        'transport'     => 'refresh',
    ));

    $wp_customize->add_control( 'copyright_text_control', array(
        'label'      => "Copyright Text",
        'section'    => 'paig_footer_settings',
        'settings'   => "copyright_text",
        'type'       => 'text',
    ) );

    $wp_customize->add_setting( "copyright_url" , array(
        'type'          => 'theme_mod',
        'transport'     => 'refresh',
    ));

    $wp_customize->add_control( 'copyright_url_control', array(
        'label'      => "Copyright URL",
        'section'    => 'paig_footer_settings',
        'settings'   => "copyright_url",
        'type'       => 'text',
    ) );

   // for powered by text and url
    $wp_customize->add_setting( "poweredby_text" , array(
        'type'          => 'theme_mod',
        'transport'     => 'refresh',
    ));

    $wp_customize->add_control( 'poweredby_text_control', array(
        'label'      => "Powered By Text",
        'section'    => 'paig_footer_settings',
        'settings'   => "poweredby_text",
        'type'       => 'text',
    ) );

    $wp_customize->add_setting( "poweredby_url" , array(
        'type'          => 'theme_mod',
        'transport'     => 'refresh',
    ));

    $wp_customize->add_control( 'poweredby_url_control', array(
        'label'      => "Powered By URL",
        'section'    => 'paig_footer_settings',
        'settings'   => "poweredby_url",
        'type'       => 'text',
    ) );


    $wp_customize->add_setting( "terms_url" , array(
        'type'          => 'theme_mod',
        'transport'     => 'refresh',
    ));

    $wp_customize->add_control( 'terms_url_control', array(
        'label'      => "Terms of Use URL",
        'section'    => 'paig_footer_settings',
        'settings'   => "terms_url",
        'type'       => 'text',
    ) );

    $wp_customize->add_setting( "privacy_url" , array(
        'type'          => 'theme_mod',
        'transport'     => 'refresh',
    ));

    $wp_customize->add_control( 'privacy_url_control', array(
        'label'      => "Privacy URL",
        'section'    => 'paig_footer_settings',
        'settings'   => "privacy_url",
        'type'       => 'text',
    ) );


    // theme color settings
    $wp_customize->add_panel( 'color_settings', array(
        'capability'     => 'edit_theme_options',
        'title'          => 'PAIG Theme Color',
    ));
    $wp_customize->add_section( 'paig_color_settings' , array(
        'title'             => 'PAIG Color Settings',
        'panel'             => 'color_settings',
    ));

    $wp_customize->add_setting( "primary_color" , array(
        'type'          => 'theme_mod',
        'transport'     => 'refresh',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'paig_theme_color',
            array(
                'label'      => "Theme Color",
                'section'    => 'paig_color_settings',
                'settings'   => 'primary_color',
            ) )
    );




    // theme color settings
    $wp_customize->add_panel( 'paig_analytics', array(
        'capability'     => 'edit_theme_options',
        'title'          => 'PAIG Analytics Setup',
    ));
    $wp_customize->add_section( 'paig_analytics_section' , array(
        'title'             => 'PAIG Analytics',
        'panel'             => 'paig_analytics',
    ));

    $wp_customize->add_setting( "facebook_pixel" , array(
        'type'          => 'theme_mod',
        'transport'     => 'refresh',
    ));

    $wp_customize->add_control( 'facebook_pixel_control', array(
        'label'      => "Facebook Pixel",
        'section'    => 'paig_analytics_section',
        'settings'   => "facebook_pixel",
        'type'       => 'text'
    ) );

    $wp_customize->add_setting( "google_analytics" , array(
        'type'          => 'theme_mod',
        'transport'     => 'refresh',
    ));

    $wp_customize->add_control( 'google_analytics_control', array(
        'label'      => "Google Analytics ",
        'section'    => 'paig_analytics_section',
        'settings'   => "google_analytics",
        'type'       => 'text'
    ) );



//    // theme layout settings
//    $wp_customize->add_panel( 'layout_setting', array(
//        'capability'     => 'edit_theme_options',
//        'title'          => 'PAIG Layout Settings',
//    ));
//    $wp_customize->add_section( 'paig_layout_settings' , array(
//        'title'             => 'PAIG Layout Settings',
//        'panel'             => 'layout_settings',
//    ));
//
//    $wp_customize->add_setting( "header_layout_type" , array(
//        'type'          => 'theme_mod',
//        'transport'     => 'refresh',
//    ));
//
//    $wp_customize->add_control(
//        new WP_Customize_Color_Control(
//            $wp_customize,
//            'paig_theme_color',
//            array(
//                'label'      => "Theme Color",
//                'section'    => 'paig_color_settings',
//                'settings'   => 'primary_color',
//            ) )
//    );


}
add_action( 'customize_register', 'paig_metadata_customize_register' );
