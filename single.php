<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Convolytica_Community_Insight
 */

get_header();
?>

<div class="banner only-title">
	<div class=" bg-wrapper">
		<img src="http://www.convolytica.com/wp-content/uploads/2021/12/banner-bg.svg" class="dont-select" height="663" width="1355" alt="banner bg">
	</div>
	<div class="wrapper">
		<div class="banner-content flex">
			<div class="info">

				<h2 class="title mb-30"><?php echo the_title() ?></h2>
				<p class="banner-date">
					<?php echo get_the_date('M d, Y'); ?> | <?php echo get_the_category(get_the_ID())[0]->name; ?>
				</p>
			</div>
		</div>
	</div>
</div>
<!-- width="1355" height="663" -->

<!-- global__richtext -->

<section class="section">
	<div class="container">
		<div class="richtext">
			<?php echo the_content(); ?>
		</div>
	</div>
</section>

<!-- related articales -->
<!-- components/blog-card.scss && components/articles.scss -->
<section class="section">
	<div class="full-width">
		<div class="container">
			<h3 class="sec-heading center">related articles</h3>
			<?php $args = array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'posts_per_page' => 4,
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
			?>
			<div class="blog-card-grid">
				<?php $related = get_posts(array('category__in' => wp_get_post_categories($post->ID), 'numberposts' => 4, 'post__not_in' => array($post->ID)));
				if ($related) foreach ($related as $post) {
					setup_postdata($post); ?>
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
									<div class="inline">
										<?php echo get_the_date('M d, Y'); ?> – <?php echo the_excerpt(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php }
				wp_reset_postdata(); ?>

			</div>
		</div>
	</div>
</section>
<?php
get_footer();
