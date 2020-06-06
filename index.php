<?php get_header(); ?>

<?php get_template_part("template-parts/page/home/banner"); ?>

<?php get_template_part("template-parts/page/home/offer"); ?>

<?php
    $the_main_loop = new WP_Query();
    // go main query
    if($the_main_loop->have_posts()) {
    while($the_main_loop->have_posts()) {
    $the_main_loop->the_post();

    // Display your loop content

    } // endwhile
    wp_reset_postdata(); // VERY VERY IMPORTANT
    }
?>
<?php echo do_shortcode("[paig_property_list]"); ?>

<?php get_template_part("template-parts/page/home/featured"); ?>

<?php get_template_part("template-parts/page/footer/banner"); ?>

<?php get_footer(); ?>