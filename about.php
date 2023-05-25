<?php

/**
 * Template Name: About Us
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
                $right_half = get_sub_field('right_banner_image');
        ?>
                <div class="banner-content flex">
                    <div class="info">
                        <p class="about-top">
                            <?php echo get_sub_field('about_title'); ?>
                        </p>

                        <h2 class="title">
                            <?php echo get_sub_field('heading'); ?>
                        </h2>
                        <p class="about-sub-title">
                            <?php echo get_sub_field('about_sub_title'); ?>
                        </p>
                        <a href=" <?php echo get_sub_field('btn_link'); ?>" class="primary-btn"> <?php echo get_sub_field('btn_text'); ?>
                        </a>
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

<!-- components/solutions.scss -->
<section class="section no-padding">
    <?php
    if (have_rows('solution_cards')) : //parent group field
        while (have_rows('solution_cards')) : the_row();
    ?>
            <div class="container min">
                <h2 class="top-heading center"></h2>
                <p class="sub-heading center"></p>
                <div class="solutions slider">
                    <?php
                    if (have_rows('cards')) : //parent group field
                        while (have_rows('cards')) : the_row();
                            $icon = get_sub_field('card_icon');
                            $path = get_sub_field('path_image');
                    ?>
                            <div class="box">
                                <div class="img-wrapper">
                                    <img src="<?php echo $icon['url']; ?>" alt="">
                                </div>
                                <p class="title"><?php echo get_sub_field('name'); ?></p>
                                <div class="path-wrp-1">
                                    <img src="<?php echo $path['url']; ?>" alt="">
                                </div>
                            </div>
                    <?php endwhile;
                    endif;
                    ?>
                </div>
            </div>
    <?php endwhile;
    endif;
    ?>
</section>

<!-- components/catalyzing.scss -->
<section class="section">
    <div class="catalyzing">
        <?php
        if (have_rows('catalyzing_section')) : //parent group field
            while (have_rows('catalyzing_section')) : the_row();
                $triangle_image = get_sub_field('triangle');
        ?>
                <div class="container">
                    <h2 class="top-heading white center">
                        <?php echo get_sub_field('heading'); ?>
                    </h2>
                    <?php
                    if (have_rows('catalyzing_cards')) : //parent group field
                    ?>
                        <div class="changes">
                            <?php while (have_rows('catalyzing_cards')) : the_row();
                            ?>
                                <div class="change">
                                    <p class="title"> <?php echo get_sub_field('title'); ?></p>
                                    <p class="subtitle"> <?php echo get_sub_field('sub_title'); ?> </p>
                                </div>
                                <!-- <div class="change">
                            <p class="title">15+</p>
                            <p class="subtitle"> Brand Collaborations To Date</p>
                        </div>
                        <div class="change">
                            <p class="title">1,000+</p>
                            <p class="subtitle"> Number of Groups That Trust Convolytica </p>
                        </div> -->
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                    <div class="triangle1 dont-select">
                        <img src="<?php echo $triangle_image['url']; ?>" alt="">
                    </div>
                    <div class="triangle2 dont-select">
                        <img src="<?php echo $triangle_image['url']; ?>" alt="">
                    </div>
                </div>
        <?php
            endwhile;
        endif;
        ?>
    </div>
</section>

<!-- components/our-team.scss -->
<section class="section">
    <div class="container">
        <h2 class="top-heading center">our team</h2>
        <div class="teamSwiper">
            <div class="swiper team-swiper-main">
                <div class="swiper-wrapper">
                    <?php
                    if (have_rows('team', 'option')) : //parent group field
                        while (have_rows('team', 'option')) : the_row();
                            $member_image = get_sub_field('image');
                    ?>
                            <div class="swiper-slide">
                                <div class="member">
                                    <div class="trending-card">
                                        <div class="inner">
                                            <figure class="aspect-ratio">
                                                <img src="<?php echo $member_image['url']; ?>" alt="">
                                            </figure>
                                        </div>
                                    </div>
                                    <div class="details">
                                        <h1 class="name"><?php echo get_sub_field('name'); ?></h1>
                                        <h3 class="designation"><?php echo get_sub_field('designation'); ?></h3>
                                    </div>
                                </div>
                            </div>
                    <?php endwhile;
                    endif;
                    ?>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
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
<?php
get_footer();
