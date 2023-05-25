<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Convolytica_Community_Insight
 * Template Name: Home Page
 */

get_header();
?>

<div class="banner">
	<div class=" bg-wrapper">
		<img src="http://www.convolytica.com/wp-content/uploads/2021/12/banner-bg.svg" class="dont-select" height="663" width="1355" alt="banner bg">
	</div>

	<div class="wrapper">
		<?php
		if (have_rows('home_top_section', 'option')) : //parent group field
			while (have_rows('home_top_section', 'option')) : the_row();
				$sub_value_image = get_sub_field('right_banner'); ?>

				<div class="banner-content flex">
					<div class="info">
						<h2 class="title">
							<?php echo get_sub_field('title'); ?>
						</h2>
						<p class="sub-title">
							<?php echo get_sub_field('sub_title'); ?>
						</p>
						<?php
						if (have_rows('facebook_section', 'option')) : //parent group field
							while (have_rows('facebook_section', 'option')) : the_row();
						?>
								<a href="<?php echo get_sub_field('btn_link'); ?>" class="primary-btn">
									<i class="<?php echo get_sub_field('btn_icon'); ?>"></i>
									<?php echo get_sub_field('btn_text'); ?>
								</a>
						<?php endwhile;
						endif; ?>
					</div>
					<div class="banner-image right">
						<img src="<?php echo $sub_value_image['url']; ?>" class="dont-select" alt="banner image">
					</div>
				</div>
		<?php endwhile;
		endif;
		?>
	</div>
</div>
<!-- width="1355" height="663" -->
<!-- for overview component go for commit 10/november -->

<!-- components/features.scss -->
<section class="section">

	<div class="container">
		<h2 class="top-heading">features</h2>
		<div class="features">
			<div class="tab">
				<?php
				if (have_rows('features_detail_section', 'option')) : //parent group field
					while (have_rows('features_detail_section', 'option')) : the_row();
				?>
						<button class="tablinks <?php if (get_sub_field('active') == 1) {
													echo "active";
												} ?>" onclick="openFeature(event, '<?php echo get_sub_field('title'); ?>')">
							<span class="title"><?php echo get_sub_field('title'); ?></span>
							<span class="subtitle"><?php echo get_sub_field('sub_title'); ?></span>
						</button>
						<!-- <button class="tablinks" onclick="openFeature(event, 'growth')">
					<span class="title">Growth</span>
					<span class="subtitle">Scale your communities</span>
				</button>
				<button class="tablinks" onclick="openFeature(event, 'audience')">
					<span class="title">Audience Sentiments</span>
					<span class="subtitle">Find out how your members react</span>
				</button>
				<button class="tablinks" onclick="openFeature(event, 'alerts')">
					<span class="title">Alerts</span>
					<span class="subtitle">Stay up-to-date with alerts</span>
				</button>
				<button class="tablinks" onclick="openFeature(event, 'manage')">
					<span class="title">Management & Analytics</span>
					<span class="subtitle">Manage & Monitor</span>
				</button> -->
				<?php endwhile;
				endif;
				?>
			</div>
			<div class="contents">
				<?php
				if (have_rows('features_detail_section', 'option')) : //parent group field
					while (have_rows('features_detail_section', 'option')) : the_row();
						$sub_value_image = get_sub_field('content_image');
						$sub_value_image_phone = get_sub_field('content_image_phone');
				?>
						<div id="<?php echo get_sub_field('title'); ?>" class="tabcontent">
							<div class="info">
								<h3 class="heading">
									<?php echo get_sub_field('sub_title'); ?>
								</h3>
								<p class="desc"><?php echo get_sub_field('content_desc'); ?><a href="<?php echo get_sub_field('read_more_btn_link'); ?>"><?php echo get_sub_field('read_more_btn'); ?></a> </p>
								<a href="<?php echo get_sub_field('button_link'); ?>" class="btn"><?php echo get_sub_field('button_text'); ?></a>
							</div>
							<figure>
								<img src="<?php echo $sub_value_image['url']; ?>" width="907" height="300" class="analytics" alt="analytics">
								<img src="<?php echo $sub_value_image_phone['url']; ?>" width="302" height="296" class="analytics-phone" alt="analytics">
							</figure>
						</div>
						<!--
					<div id="growth" class="tabcontent">
						<div class="info">
							<h3 class="heading">
								Scale Your Communities
							</h3>
							<p class="desc">Scaling growth within communities can be very demanding. Through Natural Language Processing, we identify what kind of topics and content drives the highest engagement. Our built in recommendation tools assist you in sustaining content which your communities love.
								We also assign a group score which denotes how your group performs in comparison to others in the same category. <a href="#_">Read More</a> </p>
							<a href="#_" class="btn">Attach Case Study</a>
						</div>
						<figure>
							<img src="build/images/placeholder.png" data-src="build/images/analytics.webp" width="907" height="300" class="analytics" alt="analytics">
							<img src="build/images/placeholder.png" data-src="build/images/analytics-phone.webp" width="302" height="296" class="analytics-phone" alt="analytics">
						</figure>
					</div>
					<div id="audience" class="tabcontent">
						<div class="info">
							<h3 class="heading">
								Find our how your members react
							</h3>
							<p class="desc">Utilize our Sentiment Analytics tool to monitor group, topic and product sentiments. Our Natural Language Processing Technique makes short work of multiple languages and text to ensure your group is a positive environment for the members within. Positive Communities encourage your members to post, engage and interact with other members in
								the group. <a href="#_">Read More</a> </p>
							<a href="download-report.php" class="btn">Download Report</a>
						</div>
						<figure>
							<img src="build/images/placeholder.png" data-src="build/images/analytics.webp" width="907" height="300" class="analytics" alt="analytics">
							<img src="build/images/placeholder.png" data-src="build/images/analytics-phone.webp" width="302" height="296" class="analytics-phone" alt="analytics">
						</figure>
					</div>
					<div id="alerts" class="tabcontent">
						<div class="info">
							<h3 class="heading">
								Stay up-to-date with alerts
							</h3>
							<p class="desc">Remain in constant touch with our email alerts. Receive quick updates right on your email and be notified in case of any community violations. Keep up with trends, conversations and topics within your group. <a href="#_">Read More</a> </p>
						</div>
						<figure>
							<img src="build/images/placeholder.png" data-src="build/images/analytics.webp" width="907" height="300" class="analytics" alt="analytics">
							<img src="build/images/placeholder.png" data-src="build/images/analytics-phone.webp" width="302" height="296" class="analytics-phone" alt="analytics">
						</figure>
					</div>
					<div id="manage" class="tabcontent">
						<div class="info">
							<h3 class="heading">
								Manage & Monitor
							</h3>
							<p class="desc">Seamlessly manage and monitor multiple groups all in one platform. Our custom configured KPIs let you take a sneak peak of exactly what is going on in your group. Engage with your community, monitor your group feed, and manage group alerts.. <a href="#_">Read More</a> </p>
							<a href="download-report.php" class="btn">Download Report</a>
						</div>
						<figure>
							<img src="build/images/placeholder.png" data-src="build/images/analytics.webp" width="907" height="300" class="analytics" alt="analytics">
							<img src="build/images/placeholder.png" data-src="build/images/analytics-phone.webp" width="302" height="296" class="analytics-phone" alt="analytics">
						</figure>
					</div> -->
				<?php endwhile;
				endif;
				?>
			</div>

		</div>
	</div>

</section>
<!-- components/brands.scss -->
<?php
if (have_rows('brand_section', 'option')) : //parent group field
	while (have_rows('brand_section', 'option')) : the_row();
?>
		<section class="section">

			<div class="container">
				<h2 class="top-heading">Brands</h2>
				<p class="sub-heading"><?php echo get_sub_field('sub_title') ?></p>
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
		</section>
<?php
	endwhile;
endif;
?>


<!-- components/admins.scss -->
<?php
if (have_rows('admin_section', 'option')) : //parent group field
	while (have_rows('admin_section', 'option')) : the_row();
?>
		<section class="section">
			<div class="admins">
				<div class="container">
					<h2 class="title"><?php echo get_sub_field('heading'); ?></h2>
					<?php
					if (have_rows('admin_panel', 'option')) : //parent group field
						while (have_rows('admin_panel', 'option')) : the_row();
							$sub_admin_image = get_sub_field('admin_image');
					?>
							<div class="admin <?php echo get_sub_field('count'); ?>">
								<img src="<?php echo $sub_admin_image['url']; ?>" alt="">
								<div class="mask">
									<p><?php echo get_sub_field('name'); ?></p>
									<span>
										<?php echo get_sub_field('services'); ?>
									</span>
								</div>
							</div>
					<?php endwhile;
					endif;
					?>
					<!-- <div class="admin two">
						<img src="build/images/placeholder.png" data-src="build/images/admins/2.webp" alt="2">
						<div class="mask">
							<p>alice troy</p>
							<span>
								product development
							</span>
						</div>
					</div>
					<div class="admin three">
						<img src="build/images/placeholder.png" data-src="build/images/admins/3.webp" alt="3">
						<div class="mask">
							<p>alice troy</p>
							<span>
								product development
							</span>
						</div>
					</div>
					<div class="admin four">
						<img src="build/images/placeholder.png" data-src="build/images/admins/4.webp" alt="4">
						<div class="mask">
							<p>alice troy</p>
							<span>
								product development
							</span>
						</div>
					</div> -->
					<?php
					if (have_rows('line_image_connector', 'option')) : //parent group field
						while (have_rows('line_image_connector', 'option')) : the_row();
							$sub_line_image = get_sub_field('connector_image');
					?>
							<div class="admin <?php echo get_sub_field('class'); ?>">
								<img src="<?php echo $sub_line_image['url']; ?>" alt="<?php echo get_sub_field('class'); ?>">
							</div>
					<?php endwhile;
					endif;
					?>
					<!-- <div class="admin line2">
						<img src="build/images/placeholder.png" data-src="build/images/admins/second.webp" alt="line2">
					</div>
					<div class="admin line3">
						<img src="build/images/placeholder.png" data-src="build/images/admins/third.webp" alt="line3">
					</div>
					<div class="admin line1-phone">
						<img src="build/images/placeholder.png" data-src="build/images/admins/line1-phone.webp" alt="line1">
					</div>
					<div class="admin line2-phone">
						<img src="build/images/placeholder.png" data-src="build/images/admins/line2-phone.webp" alt="line2">
					</div>
					<div class="admin line3-phone">
						<img src="build/images/placeholder.png" data-src="build/images/admins/line3-phone.webp" alt="line3">
					</div> -->
					<!-- <h2 class="top-heading white center">
                Convolytica enables thousands of Admins&nbsp;
                across the world in managing and monetizing&nbsp;
                their groups
            </h2> -->
				</div>
			</div>
		</section>
<?php endwhile;
endif;
?>

<!-- priority -->
<?php
if (have_rows('priority_section', 'option')) : //parent group field
	while (have_rows('priority_section', 'option')) : the_row();
		$sub_left_image = get_sub_field('leftside_image');
		$sub_right_image = get_sub_field('rightside_image');

?>
		<section class="section">
			<div class="priority-wrp">
				<h2 class="top-heading center">
					<?php echo get_sub_field('main_heading'); ?>
				</h2>
				<div class="priority">
					<div class="dots-left">
						<img src="<?php echo $sub_left_image['url']; ?>" height="424" width="142" alt="">
					</div>
					<div class="dots-right">
						<img src="<?php echo $sub_right_image['url']; ?>" height="424" width="142" alt="">
					</div>
					<div class="container">
						<?php
						if (have_rows('services', 'option')) : //parent group field
							while (have_rows('services', 'option')) : the_row();
								$service_icons = get_sub_field('icon');

						?>
								<div class="box">
									<div class="img-wrapper">
										<img src="<?php echo $service_icons['url']; ?>" height="52" width="52" alt="">
									</div>
									<p class="title"><?php echo get_sub_field('title') ?></p>
									<p class="subtitle"><?php echo get_sub_field('sub_title') ?></p>
								</div>
						<?php endwhile;
						endif;
						?>
						<!-- <div class="box">
							<div class="img-wrapper">
								<img src="build/images/placeholder.png" height="52" width="52" data-src="build/images/security.webp" alt="">
							</div>
							<p class="title">Secure Cloud</p>
							<p class="subtitle">We do not share your group’s data with anyone. All your group information and reports are stored in a private cloud.</p>
						</div>
						<div class="box">
							<div class="img-wrapper">
								<img src="build/images/placeholder.png" height="52" width="52" data-src="build/images/surface.webp" alt="">
							</div>
							<p class="title">Security</p>
							<p class="subtitle">We take data management very seriously. Your Data is safe with us.</p>
						</div> -->
					</div>
				</div>
				<?php
				if (have_rows('facebook_section', 'option')) : //parent group field
					while (have_rows('facebook_section', 'option')) : the_row();
				?>
						<a href="<?php echo get_sub_field('btn_link'); ?>" class="primary-btn center">
							<i class="<?php echo get_sub_field('btn_icon'); ?>"></i>
							<?php echo get_sub_field('btn_text'); ?>
						</a>
				<?php endwhile;
				endif; ?>
			</div>
		</section>
<?php endwhile;
endif;
?>

<?php
get_footer();
