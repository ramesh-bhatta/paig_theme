<?php
/*
Template Name: Contact Page
Template Post Type: post, page, event
*/

use PAIG\Common\Option;

get_header(); ?>


    <!-- Content
    ================================================== -->

    <div class="parallax" data-background="<?php bloginfo('template_directory'); ?>/images/home-parallax.jpg"
         data-color="#36383e" data-color-opacity="0.45" data-img-width="2500" data-img-height="1600">
        <div class="parallax-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-white"><?php the_title(); ?></h1>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Container / Start -->
    <div class="container margin-top-55">

        <div class="row">

            <!-- Contact Details -->
            <div class="col-md-4">

                <h4 class="headline margin-bottom-30">Office Address</h4>

                <!-- Contact Details -->
                <div class="sidebar-textbox">
                    <ul class="contact-details">
                        <li><i class="im im-icon-Globe"></i> <strong>Address:</strong> <span><a
                                        href="#"><?php echo getCustomThemeValue("address"); ?></a></span></li>
                        <li><i class="im im-icon-Phone-2"></i> <strong>Phone:</strong> <span><a
                                        href="<?php echo getCustomThemeValue("phone_number1"); ?>"><?php echo getCustomThemeValue("phone_number1"); ?></a></span>
                        </li>
                        <li><i class="im im-icon-Envelope"></i> <strong>Email:</strong> <span><a
                                        href="<?php echo getCustomThemeValue("email_address"); ?>"><?php echo getCustomThemeValue("email_address"); ?></a></span>
                        </li>


                    </ul>
                </div>

            </div>

            <!-- Contact Form -->
            <div class="col-md-8">


                <?php get_template_part("template-parts/page/contact/contact-form"); ?>
            </div>
            <!-- Contact Form / End -->

        </div>

    </div>
    <!-- Container / End -->


    <!-- Map Container -->
    <div class="contact-map margin-top-55">

        <!-- Google Maps -->
        <div class="google-map-container">
            <!-- <div id="propertyMap" data-latitude="40.7427837" data-longitude="-73.11445617675781"></div>
            <a href="#" id="streetView">Street View</a> -->

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3312.8236422730665!2d151.1915516153871!3d-33.868435626471616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12ae3696be7fbf%3A0x7784d9732d4ec158!2s100%20Harris%20St%2C%20Pyrmont%20NSW%202009!5e0!3m2!1sen!2sau!4v1591332235135!5m2!1sen!2sau"
                    width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
        </div>
        <!-- Google Maps / End -->

    </div>
    <div class="clearfix"></div>
    <!-- Map Container / End -->


<?php get_footer(); ?>