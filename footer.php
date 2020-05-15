
<!-- Footer
================================================== -->
<div id="footer">
	<!-- Main -->
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-6">
				<img class="footer-logo" src="<?php echo bloginfo('template_directory'); ?>/images/logo.png" alt="">
				<br><br>
				<p>Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper.</p>
			</div>

			<div class="col-md-4 col-sm-6 ">
				<h4>Helpful Links</h4>
				<ul class="footer-links">
					<li><a href="#">Login</a></li>
					<li><a href="#">Sign Up</a></li>
					<li><a href="#">My Account</a></li>
					<li><a href="#">Add Property</a></li>
					<li><a href="#">Pricing</a></li>
					<li><a href="#">Privacy Policy</a></li>
				</ul>

				<ul class="footer-links">
					<li><a href="#">FAQ</a></li>
					<li><a href="#">Blog</a></li>
					<li><a href="#">Our Agents</a></li>
					<li><a href="#">How It Works</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>		

			<div class="col-md-3  col-sm-12">
				<h4>Contact Us</h4>
				<div class="text-widget">
					<span>12345 Little Lonsdale St, Melbourne</span> <br>
					Phone: <span>(123) 123-456 </span><br>
					E-Mail:<span> <a href="#">office@example.com</a> </span><br>
				</div>

				<ul class="social-icons margin-top-20">
					<li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
					<li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
					<li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
					<li><a class="vimeo" href="#"><i class="icon-vimeo"></i></a></li>
				</ul>

			</div>

		</div>
		
		<!-- Copyright -->
		<div class="row">
			<div class="col-md-12">
				<div class="copyrights">© 2016 Findeo. All Rights Reserved.</div>
			</div>
		</div>

	</div>

</div>
<!-- Footer / End -->


<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>



<!-- Scripts
================================================== -->
<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/scripts/jquery-3.4.1.min.js"></script>

<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/scripts/jquery-migrate-3.1.0.min.js"></script>
 <script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/scripts/chosen.min.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/scripts/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/scripts/rangeSlider.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/scripts/sticky-kit.min.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/scripts/slick.min.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/scripts/masonry.min.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/scripts/mmenu.min.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/scripts/tooltips.min.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/scripts/custom.js"></script> 

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
 <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initAutocomplete"></script>
</div>
<!-- Wrapper / End -->
<?php wp_footer(); ?>

</body>
</html>