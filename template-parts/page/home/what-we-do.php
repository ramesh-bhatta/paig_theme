<!-- Fullwidth Section -->
<section class="fullwidth margin-top-0 offer-section" data-background-color="#f7f7f7" id="what-we-do">

    <!-- Box Headline -->
    <h3 class="headline-box">What We Offer</h3>

    <!-- Content -->
    <div class="container">
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
<br />
<!-- Fullwidth Section / End -->