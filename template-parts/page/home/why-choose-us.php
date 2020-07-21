<section class="why-choose-us py-24" pt-10 pb-50" id="why-choose-us">

    <div class="container">
        <div class="row">
            <div class="col-xl-6 mx-auto text-center">
                <div class="section-title pb-10">
                    <h4>Why Choose Us</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $post_id = get_option('page_on_front');
            $service_arr = getServiceMetaValues($post_id);
            foreach ($service_arr as $service) :
            ?>
                <div class="col-lg-4 col-md-6">
                    <!-- Single Service -->
                    <div class="single-service">
                        <?php if ($service['iconClass'] != ''): ?>
                            <i class="<?php echo $service['iconClass']; ?>"></i>
                        <?php elseif ($service['icon'] !== ''): ?>
                            <div class="paig-imb-block">
                                <img src="<?php echo $service['icon']; ?>" class="object-fit"/>
                            </div>
                        <?php endif; ?>

                        <h4><?php echo isset($service['title']) ? $service['title'] : ""; ?> </h4>
                        <p><?php echo isset($service['content']) ? $service['content'] : ""; ?></p>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</section>