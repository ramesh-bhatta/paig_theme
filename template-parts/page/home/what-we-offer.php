<!-- Fullwidth Section -->
<section class="fullwidth margin-top-0 offer-section why-choose-us" data-background-color="#f7f7f7" id="what-we-offer">
    <!-- Content -->
    <div class="container">

        <div class="row">
            <div class="col-xl-6 mx-auto text-center">
                <div class="section-title pb-10">
                    <h4>What We Offer</h4>
                </div>
            </div>
        </div>
        <div class="row">


            <div class="col-md-12 col-sm-12">
                <!-- Icon Box -->
                <div class="content">
                    <p class="text-justify" style="padding:0 60px;">
                        <?php
                        $post_id = get_option('page_on_front');
                        $about_content = get_post_meta($post_id, 'what_we_do_desc', true);
                        echo $about_content;
                        ?>
                    </p>

                </div>
            </div>

        </div>
    </div>
</section>