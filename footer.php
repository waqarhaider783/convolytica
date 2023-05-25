<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Convolytica_Community_Insight
 */

?>
<footer>
	<div class="container">
		<div class="footer-inner">
			<?php
			if (have_rows('left_section', 'option')) : //parent group field
				while (have_rows('left_section', 'option')) : the_row();
					$footer_image = get_sub_field('logo_image');
			?>
					<div class="about">
						<a href="<?php echo get_sub_field('logo_link'); ?>" class="logo-wrapper">
							<img src="<?php echo $footer_image['url']; ?>" height="41" width="307" alt="Convolytica Logo">
						</a>
						<p class="terms-privacy"><?php echo get_sub_field('copy_rights'); ?></p>

						<p class="terms-privac"><a href="<?php echo get_sub_field('privacy_link'); ?>"><?php echo get_sub_field('privacy_label'); ?></a> | <a href="<?php echo get_sub_field('terms_link'); ?>"><?php echo get_sub_field('terms_label'); ?></a></p>

					</div>
			<?php endwhile;
			endif;
			?>
			<?php
			if (have_rows('middle_section', 'option')) : //parent group field
				while (have_rows('middle_section', 'option')) : the_row();
			?>
					<div class="other-links">
						<?php wp_nav_menu(
							array(
								'menu' => 'footer_menu',
								'menu_class' => 'navigation flex links-list'
							)
						);
						?>
						<p class="address">
							Address<br /><?php echo get_sub_field('address'); ?>
						</p>
					</div>
			<?php endwhile;
			endif; ?>
			<div class="social">
				<?php
				while (have_rows('right_section', 'option')) : the_row();
				?>
					<a href="<?php echo get_sub_field('social_link'); ?>" aria-label="facebook"><i class="<?php echo get_sub_field('social_label'); ?>"></i></a>
					<!-- <a href="#_" aria-label="instagram"><i class="x_instagram"></i></a>
				<a href="#_" aria-label="linkedin"><i class="x_linkedin"></i></a> -->
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</footer>

</main>
<script>
	// var swiper = new Swiper(".mySwiper", {
	// 	slidesPerView: 5,
	// 	loop: true,
	// 	centeredSlides: true,
	// 	autoplay: {
	// 		delay: 100000000000,
	// 	},
	// 	disableOnInteraction: true
	// });
	// var swiper = new Swiper(".teamSwiper .swiper", {
	// 	slidesPerView: 1,
	// 	freeMode: false,
	// 	pagination: {
	// 		el: ".swiper-pagination",
	// 		clickable: true
	// 	},
	// 	navigation: {
	// 		nextEl: ".teamSwiper .swiper-button-next",
	// 		prevEl: ".teamSwiper .swiper-button-prev",
	// 	},
	// 	breakpoints: {
	// 		950: {
	// 			slidesPerView: 3,
	// 		},
	// 		551: {
	// 			slidesPerView: 2,
	// 		},
	// 	}
	// });
</script>
<!-- <script async src="./build/js/all.js"></script> -->
<?php
if (($fileName === 'home') || ($fileName === 'index')) { ?>
	<!-- Swiper JS -->
	<!-- <script src="./build/js/swiper.min.js"></script> -->
<?php } ?>
</body>



</html>
<?php
$ob_get_clean_css = ob_get_clean();
$cssmain  = preg_replace(array('/ {2,}/', '/<!--.*?-->|\t|(?:\r?\n[ \t]*)+/s'), array(' ', ''), $ob_get_clean_css);
echo $cssmain;
?>
<?php wp_footer(); ?>

</body>

</html>