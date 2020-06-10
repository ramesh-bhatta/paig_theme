<!-- Fullwidth Section -->
<section class="fullwidth margin-top-0 offer-section" data-background-color="#f7f7f7" id="what-we-offer">

    <!-- Box Headline -->
    <h3 class="headline-box">What We Offer</h3>

    <!-- Content -->
    <div class="container">
        <div class="row">

            <?php
            $post_id = get_option('page_on_front');
            $offer_arr = getOfferMeta($post_id);
           

            foreach ($offer_arr as $offer) :
            ?>

                <div class="col-md-3 col-sm-6">
                    <!-- Icon Box -->
                    <div class="icon-box-1">
                        <div class="icon-container">
                            <i class="<?php echo $offer['iconClass']; ?>"></i>
                            <div class="icon-links">
                                <a href="listings-grid-standard-with-sidebar.html">For Sale</a>
                                <a href="listings-grid-standard-with-sidebar.html">For Rent</a>
                            </div>
                        </div>

                        <h3><?php echo isset($offer['title']) ? $offer['title'] : ""; ?></h3>
                        <p><?php echo isset($offer['content']) ? $offer['content'] : ""; ?></p>
                    </div>
                </div>

            <?php endforeach; ?>



        </div>
    </div>
</section>
<!-- Fullwidth Section / End -->