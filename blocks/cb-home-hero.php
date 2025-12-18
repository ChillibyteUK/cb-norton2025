<?php
/**
 * Template for CB Home Hero.
 *
 * @package cb-norton2025
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center home-hero">
	<?= wp_get_attachment_image( get_field( 'background' ), 'full', false, array( 'class' => 'background' ) ); ?>
	<div class="overlay"></div>
	<div class="content py-5">
		<div class="container h-100 d-flex flex-column align-items-center">
			<div class="row m-auto justify-content-center align-items-center">
				<div class="col-lg-8 text-center mb-5">
					<h1><?= esc_html( get_field( 'title' ) ); ?></h1>
					<div class="words mb-4"><?= wp_kses_post( get_field( 'words' ) ); ?></div>
				</div>
				<div class="col-12 d-flex flex-column justify-content-start align-items-center gap-2">
					<?php
					if ( get_field( 'button' ) ) {
						$button     = get_field( 'button' );
						$btn_url    = $button['url'];
						$btn_title  = $button['title'];
						$btn_target = $button['target'] ? $button['target'] : '_self';
						?>
					<a href="<?= esc_url( $btn_url ); ?>" target="<?= esc_attr( $btn_target ); ?>" class="btn btn--primary"><?= esc_html( $btn_title ); ?></a>
						<?php
					}
					if ( get_field( 'button_2' ) ) {
						$button     = get_field( 'button_2' );
						$btn_url    = $button['url'];
						$btn_title  = $button['title'];
						$btn_target = $button['target'] ? $button['target'] : '_self';
						?>
					<a href="<?= esc_url( $btn_url ); ?>" target="<?= esc_attr( $btn_target ); ?>" class="btn btn--primary"><?= esc_html( $btn_title ); ?></a>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="position-absolute bottom-0 start-50 translate-middle-x pb-3">
		<a href="#content" class="down-arrow"><img src="<?= esc_url( get_stylesheet_directory_uri() . '/img/norton-down-arrow.svg' ); ?>" alt="Down arrow"></a>
	</div>
</section>
<a id="content" class="anchor"></a>