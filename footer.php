<!-- Footer
================================================== -->
<div id="footer">
	<!-- Main -->
	<div class="footer-top">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-sm-6">
					<?php the_custom_logo(); ?>
					<br><br>

				</div>

				<div class="col-md-4 col-sm-6 ">
					<h4>Helpful Links</h4>
					<?php
					wp_nav_menu(array(
						'theme_location'=> 'footer_menu',
						'menu_class'   => 'footer-links'
					));
					?>
					<div class="clearfix"></div>
				</div>

				<div class="col-md-3  col-sm-12">
					<h4>Contact Us</h4>
					<div class="text-widget">
						<ul class="list-none address-block">
							<li>
								<a href="<?php getCustomThemeValue("address"); ?>">
									<i class="fa fa-globe"></i>
									<?php echo getCustomThemeValue("address"); ?>
								</a>
							</li>
							<li>
								<a href="tel:<?php getCustomThemeValue("phone_number1"); ?>">
									<i class="fa fa-phone-square"></i>
									<?php echo getCustomThemeValue("phone_number1"); ?>
								</a>
							</li>
							<li>
								<a href="mailto:<?php echo getCustomThemeValue("email_address"); ?>">
									<i class="fa fa-envelope-square"></i>
									<?php echo getCustomThemeValue("email_address"); ?>
								</a>
							</li>
						</ul>
					</div>

					<ul class="social-icons margin-top-20">

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

				</div>

			</div>
		</div>
	</div>

	<div class="footer-bottom">

		<div class="container">
			<!-- Copyright -->
			<div class="row">
				<div class="col-md-4 col-xs-12">
					<div class="cr">Copyright © <a href="<?php echo getCustomThemeValue("copyright_url") ?>" target="#">
							<?php
							echo getCustomThemeValue("copyright_text");
							?>
						</a></div>
				</div>
				<div class="col-md-4 col-xs-12">
					<div class="privacy-div">
						<ul class="list-inline text-center">
							<li><a href="">Terms of Use</a></li>
							<li><a href="">Privacy Policy</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-4 col-xs-12">
					<div class="pb">Powered By
						<a href="<?php echo getCustomThemeValue("poweredby_url") ?>" target="#">
							<?php
							echo getCustomThemeValue("poweredby_text");
							?>
						</a>
					</div>
				</div>
			</div>
		</div>

	</div>

</div>
<!-- Footer / End -->


<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>



<!-- Scripts
================================================== -->
<!-- <script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/scripts/chosen.min.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/scripts/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/scripts/rangeSlider.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/scripts/sticky-kit.min.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/scripts/slick.min.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/scripts/masonry.min.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/scripts/mmenu.min.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/scripts/tooltips.min.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/scripts/custom.js"></script> -->

<!-- Google Autocomplete -->
<script>
	function initAutocomplete() {
		var input = document.getElementById('autocomplete-input');
		var autocomplete = new google.maps.places.Autocomplete(input);

		autocomplete.addListener('place_changed', function() {
			var place = autocomplete.getPlace();
			if (!place.geometry) {
				window.alert("No details available for input: '" + place.name + "'");
				return;
			}
		});
	}
</script>

<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initAutocomplete"></script>
</div>
<!-- Wrapper / End -->
<?php wp_footer(); ?>

</body>

</html>