
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

}
add_action( 'customize_register', 'paig_metadata_customize_register' );


function getPaigSocialMedia(){
    return ["facebook","youtube","instagram","linkedin"];
}