<?php

/**
 * Template Name: Download-report
 * 
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

<!-- components/react-form.scss -->
<section class="section">
    <div class="container">
        <?php
        if (have_rows('form_section')) : //parent group field
            while (have_rows('form_section')) : the_row();
        ?>
                <div class="report-form">
                    <h3 class="title center"><?php echo get_sub_field('sub_title'); ?></h3>

                    <?php echo do_shortcode('[contact-form-7 id="506" title="Download Report"]'); ?>

                    <p class="heading"><?php echo get_sub_field('title'); ?></p>
                    <p class="sub-heading center"><?php echo get_sub_field('desc'); ?>, <a href="<?php echo get_sub_field('link_url'); ?>"><?php echo get_sub_field('link_title'); ?></a></p>
                </div>
        <?php endwhile;
        endif;
        ?>
    </div>
</section>
<?php
get_footer();
