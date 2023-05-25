<?php

/**
 * Template Name: Features Page
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
        <div class="get-in-touch">
            <p class="title"><?php echo the_field('get_in_touch'); ?></p>
            <?php
            if (have_rows('facebook_section', 'option')) : //parent group field
                while (have_rows('facebook_section', 'option')) : the_row();
            ?>
                    <a href="<?php echo get_sub_field('btn_link'); ?>" class="primary-btn center">
                        <i class="<?php echo get_sub_field('btn_icon'); ?>"></i>
                        <?php echo get_sub_field('btn_text'); ?></a>
            <?php endwhile;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- components/main-features.scss -->
<section class="section">
    <div class="container">
        <div class="main-features">
            <?php
            if (have_rows('features_detail')) : //parent group field
                while (have_rows('features_detail')) : the_row();
                    $ft_image = get_sub_field('feature_image');
                    $bg_image = get_sub_field('background_image');
            ?>
                    <div class="feature">

                        <div class="img-wrapper dont-select">
                            <img src="<?php echo $ft_image['url']; ?>" height="724" width="874" alt="slide 1">
                        </div>
                        <div class="info">
                            <h2 class="top-heading"><?php echo get_sub_field('feature_title'); ?></h2>
                            <p class="desc">
                                <?php echo get_sub_field('feature_desc'); ?>
                            </p>
                            <img src="<?php echo $bg_image['url']; ?>" class="tri-path" height="558" width="726" alt="tri-path">
                        </div>

                    </div>
            <?php endwhile;
            endif;
            ?>
            <!-- <div class="feature">
                <div class="img-wrapper dont-select">
                    <img src="build/images/placeholder.png" height="724" width="874" data-src="build/images/slide/slide2.webp" alt="slide 1">
                </div>
                <div class="info">
                    <h2 class="top-heading">Analytics & Insights</h2>
                    <p class="desc">
                        Find out what is happening in your groups.
                        Identify topic & keyword trends, how your members react and engage. More importantly, identify how you can steer your group to grow in size and engagement .
                    </p>
                </div>
            </div>
            <div class="feature">
                <div class="img-wrapper dont-select">
                    <img src="build/images/placeholder.png" height="724" width="874" data-src="build/images/slide/slide3.webp" alt="slide 1">
                </div>
                <div class="info">
                    <h2 class="top-heading">alerts</h2>
                    <p class="desc">
                        Stay on top of keyword alerts, spam & abnormalities with in your group. You will be notified when admin support is requested, A post gets too much engagement or your keyword alerts are triggered. With our Alerts tool. you can keep violations to the minimal.
                    </p>
                </div>
            </div>
            <div class="feature">
                <div class="img-wrapper dont-select">
                    <img src="build/images/placeholder.png" height="724" width="874" data-src="build/images/slide/slide4.webp" alt="slide 1">
                </div>
                <div class="info">
                    <h2 class="top-heading">monetization</h2>
                    <p class="desc">
                        We partner with global brands who are looking to collaborate with your groups. Login to participate in these collaborations.
                    </p>
                </div>
            </div> -->
        </div>
    </div>
</section>
<!-- components/priority.scss -->

<section class="section">
    <div class="priority-wrp">
        <div class="priority">
            <div class="container">
                <?php
                if (have_rows('privacy_desc')) : //parent group field
                    while (have_rows('privacy_desc')) : the_row();
                        $pr_image = get_sub_field('icons');
                ?>
                        <div class="box">
                            <div class="img-wrapper">
                                <img src="<?php echo $pr_image['url']; ?>" width="72" height="69" alt="anonymous">
                            </div>
                            <p class="title"><?php echo get_sub_field('title'); ?></p>
                            <p class="subtitle"><?php echo get_sub_field('sub_title'); ?></p>

                        </div>
                <?php endwhile;
                endif; ?>
            </div>
        </div>
        <?php
        if (have_rows('facebook_section', 'option')) : //parent group field
            while (have_rows('facebook_section', 'option')) : the_row();
        ?>
                <a href="<?php echo get_sub_field('btn_link'); ?>" class="primary-btn center">
                    <i class="<?php echo get_sub_field('btn_icon'); ?>"></i>
                    <?php echo get_sub_field('btn_text'); ?></a>
        <?php endwhile;
        endif;
        ?>
    </div>
</section>

<?php
get_footer();
