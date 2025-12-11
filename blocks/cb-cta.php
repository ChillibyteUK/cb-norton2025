<?php
/**
 * Block template for CB CTA.
 *
 * @package cb-norton2025
 */

defined( 'ABSPATH' ) || exit;

$background = get_field( 'background' ) ?
	wp_get_attachment_image(
		get_field( 'background' ),
		'full',
		false,
		array(
			'alt'   => '',
			'class' => 'cta__background',
		)
	) :
	'<img src="' . get_stylesheet_directory_uri() . '/img/missing-image.png" alt="Placeholder image" class="cta__background">';

?>
<section class="cta">
	<?= wp_kses_post( $background ); ?>
	<div class="cta__overlay"></div>
	<div class="container py-5">
		<div class="row justify-content-center py-5">
			<div class="col-lg-8 text-center" data-aos="zoom-in">
				<h2 class="h2 has-white-color mb-4"><?= esc_html( get_field( 'title' ) ); ?></h2>
				<?php
				if ( get_field( 'content' ) ) {
					?>
				<div class="cta__content has-white-color has-400-font-size mb-4"><?= wp_kses_post( get_field( 'content' ) ); ?></div>
					<?php
				}
				if ( get_field( 'link' ) ?? null ) {
					$l      = get_field( 'link' );
					$target = $l['target'] ? $l['target'] : '_self';
					?>
				<a href="<?= esc_url( $l['url'] ); ?>"
					class="btn btn--primary"
					target="<?= esc_attr( $target ); ?>"><?= esc_html( $l['title'] ); ?></a>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</section>