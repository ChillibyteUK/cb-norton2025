<?php
/**
 * Block template for CB Accreditations Slider.
 *
 * @package cb-norton2025
 */

defined( 'ABSPATH' ) || exit;

$classes = $block['className'] ?? null;

?>
<section class="accreditations <?= esc_attr( $classes ); ?>">
	<div class="container">
		<div class="swiper accreditations-swiper">
			<div class="swiper-wrapper">
				<?php
				foreach ( get_field( 'accreditations', 'option' ) as $accreditation ) {
					$img = wp_get_attachment_image(
						$accreditation,
						'full',
						false,
						array( 'alt' => '' )
					);
					?>
				<div class="swiper-slide accreditations__item">
					<?= wp_kses_post( $img ); ?>
				</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
	new Swiper('.accreditations-swiper', {
		slidesPerView: 2,
		spaceBetween: 20,
		loop: true,
		autoplay: {
			delay: 2000,
			disableOnInteraction: false,
		},
		breakpoints: {
			768: {
				slidesPerView: 4,
				spaceBetween: 30,
			},
			1200: {
				slidesPerView: 6,
				spaceBetween: 40,
			}
		}
	});
});
</script>