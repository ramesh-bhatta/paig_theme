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
<?php wp_body_open(); ?>
	<!-- Wrapper -->
	<div id="wrapper">
		<!-- Header Container
================================================== -->
		<header id="header-container" >

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
								<?php endif; endforeach; ?>
						</ul>

					</div>
					<!-- Left Side Content / End -->

				</div>
			</div>
			<div class="clearfix"></div>
			<!-- Topbar / End -->


			<!-- Header -->
			<div id="header">
		<div class="container">
			
			<!-- Left Side Content -->
			<div class="left-side flex items-center">
				
				<!-- Logo -->
				<div id="logo" class="flex-1">
					<a href="index.php"><?php the_custom_logo('custom-logo'); ?></a>
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
							'menu_class'=>'',
							'container'=>'ul',
							'menu_id'=>'responsive',
							'walker' => new WP_Bootstrap_Navwalker()
						));
					?>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->
				
			</div>
			<!-- Left Side Content / End -->

			<!-- Right Side Content / End -->
			<div class="right-side">
				<!-- Header Widget -->
				<div class="header-widget">
					<a href="<?php echo get_theme_mod("login_url"); ?>" class="sign-in" target="__blank">
					<i class="fa fa-user"></i> Log In / Register
					</a>
					
				</div>
				<!-- Header Widget / End -->
			</div>
			<!-- Right Side Content / End -->

		</div>
	</div>

			<!-- Header / End -->

		</header>
		<div class="clearfix"></div>
		<!-- Header Container / End -->