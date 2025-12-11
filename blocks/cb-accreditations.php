<?php
/**
 * Block template for CB Accreditations.
 *
 * @package cb-norton2025
 */

defined( 'ABSPATH' ) || exit;

$classes = $block['className'] ?? null;

?>
<section class="accreditations <?= esc_attr( $classes ); ?>">
	<div class="container d-flex gap-5 flex-wrap justify-content-center align-items-center">
		<?php
		foreach ( get_field( 'accreditations', 'option' ) as $accreditation ) {
			$img = wp_get_attachment_image(
				$accreditation,
				'full',
				false,
				array( 'alt' => '' )
			);
			?>
		<div class="accreditations__item">
			<?= wp_kses_post( $img ); ?>
		</div>
			<?php
		}
		?>
	</div>
</section>