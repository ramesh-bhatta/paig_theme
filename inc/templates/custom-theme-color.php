<?php
$theme_primary_color =   getCustomThemeValue("primary_color", "#000000");
?>

<style>
    body{
        background:#fff!important;
    }

    .why-choose-us .section-title h4:after{
        background-color:<?php echo $theme_primary_color; ?>;
    }

    .why-choose-us .single-service:before,.why-choose-us .single-service:after {
        background-color:<?php echo $theme_primary_color; ?>;
    }
    .why-choose-us .single-service:before:hover,.why-choose-us .single-service:after:hover {
        height:2px;
    }

    .why-choose-us .single-service:hover i.fa{
        background-color:<?php echo $theme_primary_color; ?>;
    }

    .why-choose-us .single-service:hover i.fa{
        border-color: <?php echo $theme_primary_color; ?>;
    }

    #navigation.style-2{
        background-color:<?php echo $theme_primary_color; ?>;
    }

   #footer .footer-bottom{
        background-color:<?php echo $theme_primary_color; ?>;
    }


    .user-menu ul li a:hover, .user-menu.active .user-name:after, .user-menu:hover .user-name:after, .user-menu.active .user-name, .user-menu:hover .user-name, table.manage-table td.action a:hover, table.manage-table .title-container .title h4 a:hover, .my-account-nav li a.current, .my-account-nav li a:hover, #footer .social-icons li a:hover i, #navigation.style-1 .current, #posts-nav li a:hover, #top-bar .social-icons li a:hover i, .agent .social-icons li a:hover i, .agent-contact-details li a:hover, .agent-page .agent-name h4, .footer-links li a:hover, .header-style-2 .header-widget li i, .header-widget .sign-in:hover, .home-slider-desc .read-more i, .info-box, .info-box h4, .listing-title h4 a:hover, .map-box h4 a:hover, .plan-price .value, .plan.featured .listing-badges .featured, .post-content a.read-more, .post-content h3 a:hover, .post-meta li a:hover, .property-pricing, .style-2 .trigger a:hover, .style-2 .trigger.active a, .style-2 .ui-accordion .ui-accordion-header-active, .style-2 .ui-accordion .ui-accordion-header-active:hover, .style-2 .ui-accordion .ui-accordion-header:hover, .tabs-nav li a:hover, .tabs-nav li.active a, .testimonial-author h4, .widget-button:hover, .widget-text h5 a:hover, a, a.button.border, a.button.border.white:hover {
        color: <?php echo $theme_primary_color; ?>;
    }

    .icon-box-1 .icon-container{
        background-color:<?php echo $theme_primary_color; ?>;
    }
</style>