<?php

/**
 * Template Name: Privacy-Policy
 */

get_header();
?>


<div class="banner only-title">
    <div class=" bg-wrapper">
        <img src="http://www.convolytica.com/wp-content/uploads/2021/12/banner-bg.svg" class="dont-select" height="663" width="1355" alt="banner bg">
    </div>
    <div class="wrapper">
        <div class="banner-content flex">
            
        <?php
        if (have_rows('privacy_container')) : //parent group field
            while (have_rows('privacy_container')) : the_row();?>
            <div class="info">
                <h2 class="title"><?php echo get_sub_field('page_title'); ?> </h2>
                <p class="banner-date"><?php echo get_sub_field('date'); ?>| Updated </p>
            </div>
            <?php
            endwhile;
        endif;
            ?>
            <div class="banner-image centered">
            </div>
        </div>
    </div>
</div>
<!-- global__richtext -->

<section class="section">
    <div class="container">
        <div class="richtext">
            <?php echo the_content();?>
        </div>
    </div>
</section>


<?php get_footer();?>