<?php
$address = getCustomThemeValue("address", "100 Harris Street Pyrmont");
$phone_number = str_replace(" ", "", getCustomThemeValue('phone_number1', '1300007244'));
$email_address = getCustomThemeValue("email_address", "admin@paigtechnologies.com.au");
$title = urlencode(get_bloginfo("name"));
?>
<div class="container margin-top-55">
    <div class="row">
        <!-- Contact Details -->
        <div class="col-md-4">
            <h4 class="headline margin-bottom-30">Office Address</h4>
            <!-- Contact Details -->
            <div class="sidebar-textbox">
                <ul class="contact-details">
                    <li><i class="im im-icon-Globe"></i> <strong>Address:</strong> <span>
                                <a target="_blank"
                                   href="http://maps.google.com/?q=<?php echo $address; ?>">
                                    <?php echo $address; ?>
                                </a></span>
                    </li>
                    <li><i class="im im-icon-Phone-2"></i> <strong>Phone:</strong> <span><a
                                href="tel:<?php echo $phone_number; ?>"><?php echo $phone_number; ?></a></span>
                    </li>
                    <li><i class="im im-icon-Envelope"></i> <strong>Email:</strong> <span><a
                                href="mailto:<?php echo $email_address; ?>"><?php echo $email_address; ?></a></span>
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
        <iframe width="100%"
                height="600"
                frameborder="0"
                scrolling="no"
                marginheight="0"
                marginwidth="0"
                src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=<?php echo urldecode($address) ?>&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
    </div>
    <!-- Google Maps / End -->
</div>