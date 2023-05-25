<?php

/**
 * Template Name: For Brands
 */

get_header();
?>
<div class="banner">
    <div class=" bg-wrapper">
        <img src="http://www.convolytica.com/wp-content/uploads/2021/12/banner-bg.svg" class="dont-select" height="663" width="1355" alt="banner bg">
    </div>
    <div class="wrapper">
        <?php
        if (have_rows('top_section')) : //parent group field
            while (have_rows('top_section')) : the_row();
                $right_half = get_sub_field('banner_image');
        ?>
                <div class="banner-content flex">
                    <div class="info">
                        <h2 class="title"><?php echo get_sub_field('title'); ?> </h2>
                    </div>
                    <div class="banner-image centered">
                        <img src="<?php echo $right_half['url']; ?>" class="dont-select" alt="banner image">
                    </div>
                </div>
        <?php endwhile;
        endif;
        ?>
    </div>
</div>
<!-- width="1355" height="663" -->


<!-- components/get-in-touch.scss -->
<section class="section">
    <div class="container">
        <?php
        if (have_rows('get_in_touch_section')) : //parent group field
            while (have_rows('get_in_touch_section')) : the_row();
        ?>
                <div class="get-in-touch">
                    <p class="title"><?php echo get_sub_field('desc'); ?></p>
                    <a href="<?php echo get_sub_field('btn_lin'); ?>" class="primary-btn center"><?php echo get_sub_field('btn_text'); ?></a>
                </div>
        <?php endwhile;
        endif; ?>
    </div>
</section>
<!-- components/brands.scss -->
<section class="section">
    <?php
    if (have_rows('brand_section', 'option')) : //parent group field
        while (have_rows('brand_section', 'option')) : the_row();
    ?>
            <div class="container min">
                <h2 class="top-heading center"><?php echo get_sub_field('title'); ?></h2>
                <p class="sub-heading center"><?php echo get_sub_field('sub_title'); ?></p>
            </div>


            <div class="wrapper-fluid">
                <div class="brands">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <?php
                            if (have_rows('brand_slider', 'option')) : //parent group field
                                while (have_rows('brand_slider', 'option')) : the_row();
                                    $sub_brand_image = get_sub_field('logo_image');
                            ?>
                                    <div class="swiper-slide">
                                        <a href="<?php echo get_sub_field('logo_link') ?>">
                                            <div class="img-wrapper cover">
                                                <img src="<?php echo $sub_brand_image['url']; ?>" alt="brand">
                                            </div>
                                        </a>
                                    </div>
                            <?php endwhile;
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
    <?php endwhile;
    endif;
    ?>
</section>

<!-- components/solutions.scss -->
<section class="section">
    <?php
    if (have_rows('solution_section')) : //parent group field
        while (have_rows('solution_section')) : the_row();
    ?>
            <div class="container min">
                <h2 class="top-heading center"><?php echo get_sub_field('title'); ?></h2>
                <p class="sub-heading center"><?php echo get_sub_field('desc'); ?></p>
                <div class="solutions">
                    <?php
                    if (have_rows('cards')) : //parent group field
                        while (have_rows('cards')) : the_row();
                            $icons_image = get_sub_field('card_icon');
                    ?>
                            <div class="box">
                                <div class="img-wrapper">
                                    <img src="<?php echo $icons_image['url']; ?>" width="71" height="81" alt="">
                                </div>
                                <p class="title"><?php echo get_sub_field('heading'); ?></p>
                                <p class="subtitle"><?php echo get_sub_field('sub_heading'); ?></p>
                            </div>
                    <?php endwhile;
                    endif;
                    ?>
                    <!-- <div class="box">
                <div class="img-wrapper">
                    <img src="build/images/placeholder.png" width="71" height="81" data-src="build/images/icons/analytics.webp" alt="analytics">
                </div>
                <p class="title">Industry Analytics</p>
                <p class="subtitle">Understand your customers.
                    evaluate attribution funnels and
                    what drives purchase consideration</p>
            </div>
            <div class="box">
                <div class="img-wrapper">
                    <img src="build/images/placeholder.png" width="71" height="81" data-src="build/images/icons/connect.webp" alt="connect">
                </div>
                <p class="title">Community Marketing</p>
                <p class="subtitle">Enable you advocates & Representatives
                    to engage directly with you consumers
                    to build lasting relationships</p>
            </div> -->
                </div>
            </div>
    <?php endwhile;
    endif;
    ?>
</section>

<!-- component/report-form.scss -->
<section class="section">
    <div class="container min">
        <?php
        if (have_rows('form_section')) : //parent group field
            while (have_rows('form_section')) : the_row();
        ?>
                <div class="report-form">
                    <h3 class="title center"><?php echo get_sub_field('sub_title'); ?></h3>
                    

                        <?php echo do_shortcode('[contact-form-7 id="385" title="Subscribe Form]'); ?>
                      
                    <p class="heading"><?php echo get_sub_field('title'); ?></p>
                    <p class="sub-heading center"><?php echo get_sub_field('desc'); ?></p>
                </div>
        <?php endwhile;
        endif;
        ?>
    </div>
</section>
<?php
get_footer();
