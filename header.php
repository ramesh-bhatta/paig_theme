<!DOCTYPE html>
<html translate="no">
<head>

	<!-- Basic Page Needs ================================================== -->
	<title> <?php bloginfo("title"); ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="google" content="notranslate">

    <?php wp_head(); ?>
	<!-- Facebook Pixel Code -->
    <?php
    $google_id =  getCustomThemeValue("google_analytics", false);
    if(isset($google_id) && $google_id !=false ) :
        ?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-<?php echo $google_id; ?>"></script>
        <script>

            window.dataLayer = window.dataLayer || [];

            function gtag(){dataLayer.push(arguments);}

            gtag('js', new Date());

            gtag('config', 'UA-<?php echo $google_id; ?>');

        </script>
    <?php endif; ?>
    <?php
    $facebook_pixel =  getCustomThemeValue("facebook_pixel", "201889034433353");

    if(isset($facebook_pixel)):
        ?>
        <!-- Facebook Pixel Code -->
        <script>
            ! function(f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function() {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '<?php echo $facebook_pixel; ?>');
            fbq('track', 'PageView');
        </script>
        <noscript>
            <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=<?php echo $facebook_pixel; ?>&ev=PageView&noscript=1" />
        </noscript>
        <!-- End Facebook Pixel Code -->
    <?php endif; ?>


</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<!-- Wrapper -->
	<div id="wrapper">
		<!-- Header Container
================================================== -->
        <header id="header-container" class="header-style-2">

            <!-- Header -->
            <div id="header">
                <div class="container flex flex-wrap items-center order">

                    <!-- Left Side Content -->
                    <div class="left-side flex flex-wrap justify-between items-center order-last md:order-none py-10 md:py-0">

                        <!-- Logo -->
                        <div id="logo" class="py-3">
                            <!-- Logo -->
                            <?php the_custom_logo(); ?>
                            <?php
                            $custom_logo_id = get_theme_mod('custom_logo');
                            $custom_logo_attr = array(
                                'class' => 'custom-logo',
                            );
                            $url = wp_get_attachment_image_url($custom_logo_id, 'full', false)
                            ?>
                        </div>

                        <!-- Mobile Navigation -->
                        <div class="mmenu-trigger">
                            <button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
                            </button>
                        </div>

                    </div>
                    <!-- Left Side Content / End -->

                    <!-- Right Side Content / End -->
                    <div class="right-side">
                        <div class="block flex flex-wrap items-center justify-center md:justify-end">
                            <!-- Social Icons -->


                            <ul class="social-icons mb-2 md:mb-0 flex justify-between">
                                <?php $socialItems = getPaigSocialMedia();
                                foreach ($socialItems as $socialItem) :
                                    if (!empty(getCustomThemeValue($socialItem))) :
                                        ?>
                                        <li>
                                            <a class="<?php echo $socialItem ?>" target="_blank"
                                               href="<?php echo getCustomThemeValue($socialItem) ?>">
                                                <i class="icon-<?php echo $socialItem ?>"></i>
                                            </a>
                                        </li>
                                    <?php endif;
                                endforeach; ?>

                            </ul>

                            <div class="login-hub w-1/2 md:w-auto">
                                <a href="<?php echo getCustomThemeValue("login_url", "https://paighub.paig.com.au/auth/login") ?>"
                                   class="sign-in pl-5 pt-1 px-16 block">
                                    <i class="fa fa-user"></i> Join Hashtag Hub</a>
                            </div>

                         <?php
                         $show_hastag_logo = get_theme_mod("show_hashtag_portal_logo","no");
                            if($show_hastag_logo == 'yes'):
                         ?>
                            <div class="hashtag-portal-logo flex items-center w-1/2  md:w-auto" style="max-width:170px;">
                                <?php
                                $link = getCustomThemeValue("hashtag_link","#");
                                $hashtag_portal_img_url = getCustomThemeValue("hashtag_portal_logo","https://www.hashtagportal.com/wp-content/uploads/1/2020/06/logo.png");
                                ?>
                                <a href="<?php echo $link; ?>" target="_blank">

                                    <img src="<?php echo $hashtag_portal_img_url;?>" class="w-64" />

                                </a>
                            </div>
                            <?php endif; ?>

                        </div>
                    </div>
                    <!-- Right Side Content / End -->

                </div>

                <!-- Main Navigation -->
                <!-- Main Navigation -->
                <nav id="navigation" class="style-2 mt-0 bg-theme">
                    <div class="container">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary_menu',
                            'menu_class' => 'menu-cls',
                            'container' => 'ul',
                            'menu_id' => 'responsive',
                            'walker' => new WP_Bootstrap_Navwalker()
                        ));
                        ?>
                    </div>

                </nav>
                <!-- Main Navigation / End -->
                <div class="clearfix"></div>
            </div>
            <!-- Header / End -->

        </header>
		<!-- Header Container / End -->