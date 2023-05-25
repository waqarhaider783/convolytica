<?php

/**
 * Template Name: Blogs
 */

get_header();
?>
<div class="banner only-title">
    <div class=" bg-wrapper">
        <img src="http://www.convolytica.com/wp-content/uploads/2021/12/banner-bg.svg" class="dont-select" height="663" width="1355" alt="banner bg">
    </div>
    <div class="wrapper">
        <?php
        if (have_rows('top_section')) : //parent group field
            while (have_rows('top_section')) : the_row();
        ?>
                <div class="banner-content flex">
                    <div class="info">
                        <h2 class="title mb-30"><?php echo get_sub_field('title'); ?> </h2>
                    </div>
                </div>
        <?php endwhile;
        endif;
        ?>
    </div>
</div>
<!-- width="1355" height="663" -->
<!-- components/brands.scss -->
<section class="section">
    <?php
    if (have_rows('detail_section')) : //parent group field
        while (have_rows('detail_section')) : the_row();
    ?>
            <div class="container min">
                <h2 class="top-heading center"><?php echo get_sub_field('title'); ?></h2>
                <p class="sub-heading center"><?php echo get_sub_field('desc'); ?></p>
            </div>
    <?php endwhile;
    endif;
    ?>
</section>

<!-- blog card starts -->
<!-- components/blog-card.scss -->
<section class="section">
    <div class="container">
        <div class="blog-card-grid first-full">
            <?php $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 5,
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
                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="" width="925" height="415">
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
                        </div>
                    </div>
                </div>
            <?php endwhile;
            wp_reset_query(); ?>
        </div>
    </div>
    <div class="border-btm"></div>
</section>
<!-- blog card ends -->
<!-- featured video starts-->
<section class="section">
    <div class="container">
        <h3 class="sec-heading ">Featured Video</h3>
        <?php $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 1,
            'meta_query' => array(
                array(
                    'meta_key' => 'video',
                )
            )
        );
        $loop = new WP_Query($args);
        while ($loop->have_posts()) : $loop->the_post();

        ?>
            <div class="featured-video">
                <div class="video-wrp">
                    <!-- width="950" height="492"  -->
                    <video controls>
                        <source src="<?php echo esc_url(get_field('video', $post->id)); ?>" type="video/mp4">

                    </video>
                </div>
                <div class="video-detail">
                    <p class="video-title"><?php echo the_title(); ?></p>
                    <div class="video-desc">
                        <?php echo get_the_date('M d, Y'); ?> – <?php echo the_excerpt(); ?>
                    </div>
                </div>
            </div>
        <?php endwhile;
        wp_reset_query();
        ?>
    </div>
    <div class="border-btm"></div>
</section>
<!-- featured video ends -->
<!-- featured articles starts-->
<section class="section">
    <div class="container">
        <h3 class="sec-heading ">Featured Publication</h3>
        <?php $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 2,
            'order' => 'Desc',
            'meta_query' => array(
                array(
                    'key' => 'enable_video',
                    'value' => '1',
                    'compare' => '!=',
                )
            )
        );
        $loop = new WP_Query($args);


        ?>
        <div class="articles">
            <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                <div class="article">
                    <a class="article-image-wrap" href="<?php echo the_permalink() ?>">
                        <figure>
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="3" width="925" height="415">
                        </figure>
                    </a>
                    <div class="article-detail">
                        <ul class="article-categories">
                            <li><?php echo get_the_category(get_the_ID())[0]->name; ?></li>
                        </ul>
                        <a class="article-title" href="<?php echo the_permalink() ?>"><?php echo the_title() ?></a>
                        <div class="article-desc">
                            <?php echo get_the_date('M d, Y'); ?> – <?php echo the_excerpt(); ?>
                        </div>
                    </div>
                </div>
            <?php endwhile;
            wp_reset_query();
            ?>
        </div>

    </div>
    <div class="border-btm"></div>
</section>
<!-- featured articles ends -->

<!-- add review starts -->
<!-- components/add-review -->
<section class="section">
    <div class="review">
        <div class="container">
            <?php
            if (have_rows('button_section')) :
                while (have_rows('button_section')) : the_row();
            ?>
                    <div class="review-inner">
                        <h2 class="title"><?php echo the_sub_field('heading'); ?>
                        </h2>
                        <a role="button" href="<?php echo get_sub_field('review_btn_link'); ?>" class="secondary-btn"><?php echo get_sub_field('review_btn_text'); ?></a>
                    </div>
            <?php endwhile;
                wp_reset_query();
            endif; ?>
        </div>
    </div>
    <div class="border-btm"></div>
</section>
<!-- add review ends -->

<!-- blog card starts -->
<!-- components/blog-card.scss -->
<section class="section">
    <div class="container">
        <h3 class="sec-heading ">more insights</h3>
        <div class="blog-card-grid col-2">
            <?php $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 4,
                'order' => 'Desc',
                'meta_query' => array(
                    array(
                        'key' => 'enable_video',
                        'value' => '1',
                        'compare' => '!=',
                    )
                )
            );
            $loop = new WP_Query($args); ?>
            <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                <div class="blog-card">
                    <div class="blog-card-inner">
                        <a class="blog-image-wrap" href="<?php echo the_permalink() ?>">
                            <figure>
                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="" width="925" height="415">
                            </figure>
                        </a>
                        <div class="blog-detail">
                            <ul class="blog-categories">
                                <li><?php echo get_the_category(get_the_ID())[0]->name; ?></li>
                            </ul>
                            <a class="blog-title" href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a>
                            <div class="blog-desc">
                                <?php echo get_the_date('M d, Y'); ?> – <?php echo the_excerpt(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile;
            wp_reset_query();
            ?>
        </div>
        <?php
        if (have_rows('button_section')) :
            while (have_rows('button_section')) : the_row();
        ?>
                <a href="<?php echo get_sub_field('view_btn_link'); ?>" class="secondary-btn center"><?php echo get_sub_field('view_btn_text'); ?></a>
        <?php endwhile;
            wp_reset_query();
        endif;
        ?>
        <div class="border-btm"></div>
    </div>
</section>
<!-- blog card ends -->
<!-- last-article starts -->
<section class="section">
    <div class="container">
        <h3 class="sec-heading ">More From this practice</h3>
        <div class="articles one-three">
            <?php $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 1,
                'order' => 'Desc',
                'meta_query' => array(
                    array(
                        'key' => 'enable_video',
                        'value' => '1',
                        'compare' => '!=',
                    )
                )
            );
            $loop = new WP_Query($args); ?>
            <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                <div class="article ">
                    <a class="article-image-wrap" href="<?php echo the_permalink(); ?>">
                        <figure>
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="3" width="925" height="415">
                        </figure>
                    </a>
                    <div class="article-detail">
                        <ul class="article-categories">
                            <li><?php echo get_the_category(get_the_ID())[0]->name; ?></li>
                        </ul>
                        <a class="article-title" href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a>
                        <div class="article-desc">
                            <?php echo get_the_date('M d, Y'); ?> – <?php echo the_excerpt(); ?></div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <div class="border-btm"></div>
</section>
<!-- last-article ends -->


<?php
get_footer();
