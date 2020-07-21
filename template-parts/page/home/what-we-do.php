<!-- Fullwidth Section -->
<section class="fullwidth margin-top-0 offer-section py-24" data-background-color="#f7f7f7" id="what-we-do">


    <!-- Content -->
    <div class="container">
        <div class="row">


            <?php
            $post_id = get_option('page_on_front');
            $offer_arr = getOfferMetaValues($post_id);



            foreach ($offer_arr as $offer) :

                ?>

                <div class="col-md-3 col-sm-6">
                    <!-- Icon Box -->
                    <div class="icon-box-1">

                        <?php if ($offer['iconClass'] != null): ?>
                            <div class="icon-container">
                                <i class="<?php echo $offer['iconClass']; ?>"></i>
                            </div>
                        <?php elseif ($offer['icon'] !== null): ?>
                        <div class="paig-imb-block">
                            <img src="<?php echo $offer['icon']; ?>" class="object-fit"/>
                        </div>
                        <?php endif; ?>

                        <h3><?php echo isset($offer['title']) ? $offer['title'] : ""; ?></h3>
                        <p><?php echo isset($offer['content']) ? $offer['content'] : ""; ?></p>
                    </div>
                </div>

            <?php endforeach; ?>


        </div>
    </div>
</section>
<!-- Fullwidth Section / End -->

<br/>
<!-- Fullwidth Section / End -->