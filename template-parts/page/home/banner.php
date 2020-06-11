<?php
use PAIG\Common\Option;

$default_property = Option::getValue("default_property");
?>

<div class="parallax" data-background="<?php echo getCFSValue("banner_image"); ?>"
     data-color="#36383e" data-color-opacity="0.45" data-img-width="2500" data-img-height="1600">
    <div class="parallax-content">
        <?php echo do_shortcode("[paig_property_search default_property_type='".$default_property."' is_restricted='true']"); ?>
    </div>
</div>

