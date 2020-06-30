<!DOCTYPE html>

<head>

	<!-- Basic Page Needs ================================================== -->
	<title> <?php bloginfo("title"); ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS ================================================== -->
	<link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/style.css">
	<link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/user.css">
	<link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/color.css">


	<?php wp_head(); ?>
</head>

<body>
	<?php wp_body_open(); ?>
	<!-- Wrapper -->
	<div id="wrapper">
		<!-- Header Container
================================================== -->
		<header id="header-container">
			<!-- Topbar -->
			<div id="top-bar">
				<div class="container">
					<div class="flex flex-wrap justify-between md:px-5">
						<!-- Left Side Content -->
						<div class="p">

							<!-- Top bar -->
							<ul class="top-bar-menu">
								<li><i class="fa fa-phone"></i>
									<a href="tel:<?php echo getCustomThemeValue("phone_number1", "130000 PAIG") ?>"> <?php echo getCustomThemeValue("phone_number1", "130000 PAIG") ?>
									</a>
								</li>
								<li><i class="fa fa-envelope"></i>
									<a href="mailto:<?php echo getCustomThemeValue("email_address", "admin@paigtechnologies.com.au") ?>"><?php echo getCustomThemeValue("email_address", "admin@paigtechnologies.com.au") ?>
									</a></li>
							</ul>

						</div>
						<!-- Left Side Content / End -->


						<!-- Left Side Content -->
						<div class="flex flex-wrap items-center">
							<!-- Social Icons -->
							<ul class="social-icons">
								<?php $socialItems = getPaigSocialMedia();
								foreach ($socialItems as $socialItem) :
									if (!empty(getCustomThemeValue($socialItem))) :
								?>
										<li>
											<a class="<?php echo $socialItem ?>" target="_blank" href="<?php echo getCustomThemeValue($socialItem) ?>">
												<i class="icon-<?php echo $socialItem ?>"></i>
											</a>
										</li>
								<?php endif;
								endforeach; ?>

							</ul>
							<div class="login-hub flex-1">
							
								<a href="<?php echo getCustomThemeValue("login_url", "https://paighub.paig.com.au/auth/login") ?>" class="sign-in text-white pl-5 pt-1"><i class="fa fa-user"></i> Log In / Register</a>
							</div>
						</div>
						<!-- Left Side Content / End -->

					</div>
				</div>

			</div>
			<div class="clearfix"></div>
			<!-- Topbar / End -->


			<!-- Header -->
			<div id="header">
				<div class="container">


					<div class="flex items-center">

						<!-- Logo -->
						<div id="logo" class="flex-1">
							<?php if (has_custom_logo()) :
								the_custom_logo();

							else : ?>
								<h3> <?php bloginfo('name'); ?></h3>

							<?php
							endif;
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


						<!-- Main Navigation -->
						<nav id="navigation" class="style-1">
							<?php
							wp_nav_menu(array(
								'theme_location'   => 'primary_menu',
								'menu_class' => '',
								'container' => 'ul',
								'menu_id' => 'responsive',
								'walker' => new WP_Bootstrap_Navwalker()
							));
							?>
						</nav>
						<div class="clearfix"></div>
						<!-- Main Navigation / End -->

					</div>




				</div>
			</div>

			<!-- Header / End -->

		</header>
		<div class="clearfix"></div>
		<!-- Header Container / End -->