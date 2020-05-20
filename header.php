<!DOCTYPE html>

<head>

	<!-- Basic Page Needs ================================================== -->
	<title>PAIG Buidling Services</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS ================================================== -->
	<link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/style.css">
	<link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/user.css">
	<link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/color.css">

	<!-- for leafletlet map -->
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />


	<?php wp_head(); ?>
</head>

<body>

	<!-- Wrapper -->
	<div>


		<!-- Compare Properties Widget
================================================== -->
		<div class="compare-slide-menu">

			<div class="csm-trigger"></div>

			<div class="csm-content">
				<h4>Compare Properties <div class="csm-mobile-trigger"></div>
				</h4>

				<div class="csm-properties">

					<!-- Property -->
					<div class="listing-item compact">
						<a href="single-property-page-2.html" class="listing-img-container">
							<div class="remove-from-compare"><i class="fa fa-close"></i></div>
							<div class="listing-badges">
								<span>For Sale</span>
							</div>
							<div class="listing-img-content">
								<span class="listing-compact-title">Eagle Apartments <i>$420,000</i></span>
							</div>
							<img src="<?php echo bloginfo('template_directory'); ?>/images/listing-01.jpg" alt="">
						</a>
					</div>

					<!-- Property -->
					<div class="listing-item compact">
						<a href="single-property-page-2.html" class="listing-img-container">
							<div class="remove-from-compare"><i class="fa fa-close"></i></div>
							<div class="listing-badges">
								<span>For Sale</span>
							</div>
							<div class="listing-img-content">
								<span class="listing-compact-title">Selway Apartments <i>$420,000</i></span>
							</div>
							<img src="<?php echo bloginfo('template_directory'); ?>/images/listing-03.jpg" alt="">
						</a>
					</div>

					<!-- Property -->
					<div class="listing-item compact">
						<a href="single-property-page-2.html" class="listing-img-container">
							<div class="remove-from-compare"><i class="fa fa-close"></i></div>
							<div class="listing-badges">
								<span>For Sale</span>
							</div>
							<div class="listing-img-content">
								<span class="listing-compact-title">Oak Tree Villas <i>$535,000</i></span>
							</div>
							<img src="<?php echo bloginfo('template_directory'); ?>/images/listing-05.jpg" alt="">
						</a>
					</div>

				</div>

				<div class="csm-buttons">
					<a href="compare-properties.html" class="button">Compare</a>
					<a href="#" class="button reset">Reset</a>
				</div>
			</div>

		</div>
		<!-- Compare Properties Widget / End -->


		<!-- Header Container
================================================== -->
		<header id="header-container">

			<!-- Topbar -->
			<div id="top-bar">
				<div class="container">

					<!-- Left Side Content -->
					<div class="left-side">

						<!-- Top bar -->
						<ul class="top-bar-menu">
							<li><i class="fa fa-phone"></i><a href="tel:1300007244"> <?php echo getCustomThemeValue("phone_number1") ?> </a> </li>
							<li><i class="fa fa-envelope"></i> <a href="mailto:<?php echo getCustomThemeValue("email_address")?>"><?php echo getCustomThemeValue("email_address") ?> </a></li>
						</ul>

					</div>
					<!-- Left Side Content / End -->


					<!-- Left Side Content -->
					<div class="right-side">

						<!-- Social Icons -->
						<ul class="social-icons">
							<?php $socialItems = getPaigSocialMedia();
							foreach ($socialItems as $socialItem) :
								if(!empty(getCustomThemeValue($socialItem) )):
							?>
								<li>
									<a class="<?php echo $socialItem ?>" target="_blank" href="<?php echo getCustomThemeValue($socialItem) ?>">
										<i class="icon-<?php echo $socialItem ?>"></i>
									</a>
								</li>
								<? endif; endforeach; ?>
						</ul>

					</div>
					<!-- Left Side Content / End -->

				</div>
			</div>
			<div class="clearfix"></div>
			<!-- Topbar / End -->


			<!-- Header -->
			<div id="header">
				<div class="container ">
					<div class="flex flex-wrap items-center">
						<!-- Left Side Content -->
						<div class="col-md-9 flex flex-wrap items-center">

							<!-- Logo -->
							<div id="logo">
								<?php the_custom_logo('custom-logo'); ?>
							</div>


							<!-- Mobile Navigation -->
							<div class="mmenu-trigger">
								<button class="hamburger hamburger--collapse" type="button">
									<span class="hamburger-box">
										<span class="hamburger-inner"></span>
									</span>
								</button>
							</div>


							<!-- Main Navigation -->
							<nav id="navigation" class="style-1">
								<?php
								wp_nav_menu(array(
									'theme_location'   => 'primary_menu',
									'walker' => new WP_Bootstrap_Navwalker()
								));
								?>
							</nav>
							<div class="clearfix"></div>
							<!-- Main Navigation / End -->

						</div>
						<!-- Left Side Content / End -->

						<!-- Right Side Content / End -->
						<div class="col-md-3">
							<!-- Header Widget -->
							<div class="header-widget">
								<a href="<?php echo get_theme_mod("login_url"); ?>" class="sign-in">
									<i class="fa fa-user"></i> Log In / Register
								</a>
							</div>
							<!-- Header Widget / End -->
						</div>
						<!-- Right Side Content / End -->
					</div>
				</div>
			</div>
			<!-- Header / End -->

		</header>
		<div class="clearfix"></div>
		<!-- Header Container / End -->