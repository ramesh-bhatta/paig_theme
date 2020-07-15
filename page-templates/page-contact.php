<?php
/**
 * Template Name: Contact Page
 *
 * @package WordPress
 * @subpackage NDIS
 * @since  NDIS 1.0
 */

get_header(); ?>

<?php get_template_part("template-parts/page/general/banner"); ?>
    <!-- Container / Start -->
    <div class="container margin-top-55">

        <div class="row">

            <!-- Contact Details -->
            <div class="col-md-4">

                <h4 class="headline margin-bottom-30">Office Address</h4>

                <!-- Contact Details -->
                <div class="sidebar-textbox">
                    <ul class="contact-details">
                        <li><i class="im im-icon-Globe"></i> <strong>Address:</strong> <span>
                                <a target="_blank" href="http://maps.google.com/?q=<?php echo getCustomThemeValue("address", "100 Harris Street Pyrmont"); ?>">
                                    <?php echo getCustomThemeValue("address", "100 Harris Street Pyrmont"); ?>
                                </a></span>
                        </li>
                        <li><i class="im im-icon-Phone-2"></i> <strong>Phone:</strong> <span><a
                                        href="tel:<?php echo str_replace(" ","",getCustomThemeValue('phone_number1', '1300007244'))    ; ?>"><?php echo getCustomThemeValue("phone_number1", "1300 00 PAIG"); ?></a></span>
                        </li>
                        <li><i class="im im-icon-Envelope"></i> <strong>Email:</strong> <span><a
                                        href="mailto:<?php echo getCustomThemeValue("email_address", "admin@paigtechnologies.com.au"); ?>"><?php echo getCustomThemeValue("email_address", "admin@paigtechnologies.com.au"); ?></a></span>
                        </li>
                    </ul>
                </div>

            </div>

            <!-- Contact Form -->
            <div class="col-md-8">
                <?php get_template_part("template-parts/page/contact/contact-form"); ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- Container / End -->


    </div>


    <!-- Map Container -->
    <div class="contact-map margin-top-55 margin-neg-10">

        <!-- Google Maps -->
        <div class="w-full">
            <!-- <div id="propertyMap" data-latitude="40.7427837" data-longitude="-73.11445617675781"></div>
            <a href="#" id="streetView">Street View</a> -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3312.8236422730665!2d151.1915516153871!3d-33.868435626471616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12ae3696be7fbf%3A0x7784d9732d4ec158!2s100%20Harris%20St%2C%20Pyrmont%20NSW%202009!5e0!3m2!1sen!2sau!4v1591332235135!5m2!1sen!2sau"
                    width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
        </div>
        <!-- Google Maps / End -->

    </div>

    <!-- Map Container / End -->
    <div style="clear:both"></div>
<?php get_footer(); ?>