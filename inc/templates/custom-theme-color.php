<?php
$theme_primary_color =   getCustomThemeValue("primary_color", "#000000");
?>

<style>



    body{
        background:#fff!important;
    }

    .bg-theme{
        background-color:<?php echo $theme_primary_color; ?>;
    }

    #navigation.style-2 {
        background-color: <?php echo $theme_primary_color; ?>;
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

    .footer-bottom {
        background-color:<?php echo $theme_primary_color; ?>;
    }
</style>