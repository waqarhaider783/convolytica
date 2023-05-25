<?php

/**
 * Template Name: Speech To Text
 */

get_header();
?>

<div class="banner">
    <div class="container">
        <div class="banner-content">
            <?php
            if (have_rows('speech_top_section')) : //parent group field
                while (have_rows('speech_top_section')) : the_row();
                    $ban_video = get_sub_field('banner_video');
            ?>
                    <div class="info">
                        <h1 class="title">
                            <?php echo get_sub_field('title'); ?>
                        </h1>
                        <p class="subtitle"><?php echo get_sub_field('desc'); ?></p>
                        <a href="<?php echo get_sub_field('btn_link'); ?>" class="primary-btn"><?php echo get_sub_field('btn_text'); ?></a>
                    </div>
                    <div class="media">
                        <div class="video-wrp">
                            <!-- width="950" height="492"  -->
                            <video controls height="439" width="804">
                                <source src="<?php echo $ban_video['url']; ?>" type="video/mp4">
                            </video>
                        </div>
                    </div>
            <?php endwhile;
            endif; ?>
        </div>
    </div>
</div>


<!-- components/solutions.scss -->
<section class="section">
    <div class="container min">
        <?php
        if (have_rows('solutions_container')) : //parent group field
            while (have_rows('solutions_container')) : the_row();
        ?>
                <h2 class="top-heading center"><?php echo get_sub_field('heading'); ?></h2>
                <div class="solutions">
                    <?php while (have_rows('cards')) : the_row();
                        $cards_icon = get_sub_field('card_image');
                    ?>
                        <div class="box">
                            <div class="img-wrapper">
                                <img src="<?php echo $cards_icon['url']; ?>" width="71" height="81" alt="">
                            </div>
                            <p class="title"><?php echo get_sub_field('title'); ?></p>
                            <p class="subtitle"><?php echo get_sub_field('desc'); ?></p>
                        </div>
                    <?php endwhile; ?>
                </div>
        <?php endwhile;
        endif;
        ?>
    </div>
</section>

<!-- features heading -->
<section class="section">
    <div class="container min">
        <?php
        if (have_rows('features_section')) : //parent group field
            while (have_rows('features_section')) : the_row();
        ?>
                <h2 class="top-heading center"><?php echo get_sub_field('title'); ?></h2>
                <p class="sub-heading center"><?php echo get_sub_field('desc'); ?></p>
                <a href="<?php echo get_sub_field('btn_link'); ?>" class="tertiary-btn blue center"><?php echo get_sub_field('btn_text'); ?></a>
        <?php endwhile;
        endif;
        ?>
    </div>
</section>

<!-- components/features.scss  (V2)-->
<section class="section">
    <div class="container">
        <div class="features v2" id="classAdjustFunct">
            <?php
            if (have_rows('tabs_content_section')) : //parent group field

            ?>
                <div class="tab">
                    <?php while (have_rows('tabs_content_section')) : the_row(); ?>
                        <button class="tablinks <?php if (get_sub_field('active') == 1) {
                                                    echo "active";
                                                } ?>" onclick="openFeature(event, '<?php echo get_sub_field('count'); ?>')">
                            <span class="title">
                                <?php echo get_sub_field('title'); ?>
                            </span>
                        </button>
                    <?php endwhile; ?>
                </div>
            <?php
            endif; ?>
            <?php if (have_rows('tabs_content_section')) : //parent group field 
            ?>
                <div class="contents">
                    <?php while (have_rows('tabs_content_section')) : the_row();
                        $sub_value_image = get_sub_field('content_image');
                        $sub_value_image_phone = get_sub_field('content_image_phone'); ?>
                        <div id="<?php echo get_sub_field('count'); ?>" class="tabcontent">
                            <div class="info">
                                <h3 class="heading">
                                    <?php echo get_sub_field('title'); ?>
                                </h3>
                                <p class="desc"><?php echo get_sub_field('content_desc'); ?></p>
                                <a href="<?php echo get_sub_field('buttin_link'); ?>" class="tertiary-btn blue"><?php echo get_sub_field('button_text'); ?></a>
                            </div>
                            <figure>
                                <img src="<?php echo $sub_value_image['url']; ?>" width="907" height="422" class="analytics" alt="analytics">
                                <img src="<?php echo $sub_value_image_phone['url']; ?>" width="302" height="296" class="analytics-phone" alt="analytics">
                            </figure>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- components/poster.scss -->
<section class="section">
    <div class="poster">
        <div class="container">
            <?php
            if (have_rows('poster_section')) : //parent group field
                while (have_rows('poster_section')) : the_row();
            ?>
                    <h2 class="title"><?php echo get_sub_field('title'); ?></h2>
                    <p class="desc"><?php echo get_sub_field('desc'); ?></p>
            <?php endwhile;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- components/theme-card.scss -->
<section class="section">
    <div class="container">
        <?php
        if (have_rows('theme_cards_section')) : //parent group field
            while (have_rows('theme_cards_section')) : the_row();
        ?>
                <h2 class="top-heading center min"><?php echo get_sub_field('heading'); ?></h2>
                <div class="grid-column-3 theme-card-wrap">
                    <?php
                    if (have_rows('theme_cards')) : //parent group field
                        while (have_rows('theme_cards')) : the_row();
                            $theme_card_image = get_sub_field('card_icon');
                    ?>
                            <div class="theme-card">
                                <div class="icon-wrp">
                                    <img src=" <?php echo $theme_card_image['url']; ?>" height="36" width="36" alt="">
                                </div>
                                <h4 class="title"><?php echo get_sub_field('card_title'); ?></h4>
                                <p class="desc"><?php echo get_sub_field('card_desc'); ?> </p>
                            </div>
                    <?php endwhile;
                    endif;
                    ?>
                </div>
        <?php endwhile;
        endif;
        ?>
    </div>
</section>

<!-- components/resource-card.scss -->
<section class="section">
    <div class="container">
        <?php
        if (have_rows('resource_cards_section')) : //parent group field
            while (have_rows('resource_cards_section')) : the_row();
        ?>
                <h2 class="top-heading center min"><?php echo get_sub_field('resources_heading'); ?></h2>
                <div class="grid-column-3 resource-card-wrap">
                    <?php while (have_rows('resources_cards')) : the_row();

                    ?>
                        <div class="resource-card">
                            <div class="head">
                                <h4 class="title"><?php echo get_sub_field('card_title'); ?></h4>
                            </div>
                            <p class="desc"><?php echo get_sub_field('card_desc'); ?></p>
                            <a href="<?php echo get_sub_field('card_btn_link'); ?>" class="download">
                                <?php echo get_sub_field('card_btn_text'); ?>
                                <i class="<?php echo get_sub_field('card_icon'); ?>"></i>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
        <?php endwhile;
        endif;
        ?>
    </div>
</section>

<!-- view demo heading -->
<section class="section">
    <div class="container min">
        <?php
        if (have_rows('demo_heading_section')) : //parent group field
            while (have_rows('demo_heading_section')) : the_row();
        ?>
                <h2 class="top-heading center"><?php echo get_sub_field('heading'); ?>.</h2>
                <a href="<?php echo get_sub_field('btn_link'); ?>" class="primary-btn blue center"><?php echo get_sub_field('btn_text'); ?></a>
        <?php endwhile;
        endif;
        ?>
    </div>
</section>

<!-- blog card starts -->
<!-- components/blog-card.scss -->
<section class="section">
    <div class="container">
        <h3 class="top-heading center">Blogs</h3>
        <div class="grid-column-3">
            <?php $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 3,
                'order' => 'DESC',
                'meta_query' => array(
                    array(
                        'key' => 'enable_video',
                        'value' => '1',
                        'compare' => '!=',
                    )
                )

            );
            $loop = new WP_Query($args);


            while ($loop->have_posts()) : $loop->the_post();

            ?>
                <div class="blog-card">
                    <div class="blog-card-inner">
                        <a class="blog-image-wrap" href="<?php echo the_permalink() ?>">
                            <figure>
                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="" width="526" height="254">
                            </figure>
                        </a>
                        <div class="blog-detail">
                            <ul class="blog-categories">
                                <li><?php echo get_the_category(get_the_ID())[0]->name; ?></li>
                            </ul>
                            <a class="blog-title" href="<?php echo the_permalink() ?>"><?php echo the_title() ?></a>
                            <div class="blog-desc">
                                <?php echo get_the_date('M d, Y'); ?> – <?php echo the_excerpt(); ?>
                            </div>
                            <a class="blog-learn-more" href="<?php echo the_permalink() ?>">Read More</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php
get_footer();
