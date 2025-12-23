<?php
/**
 * Block template for CB Services Feature.
 *
 * @package cb-norton2025
 */

defined( 'ABSPATH' ) || exit;

$services_page = get_page_by_path( 'services' );
$services      = get_children(
	array(
		'post_parent'    => $services_page->ID,
		'post_type'      => 'page',
		'posts_per_page' => -1,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
	)
);

// Move 'emergency-callout' to the end.
$emergency_callout = null;
foreach ( $services as $key => $service ) {
	if ( 'emergency-callout' === $service->post_name ) {
		$emergency_callout = $service;
		unset( $services[ $key ] );
		break;
	}
}
if ( $emergency_callout ) {
	$services[] = $emergency_callout;
}

$classes = $block['className'] ? $block['className'] : 'py-5';

if ( $services ) {
	?>
<section class="service-cards has-grey-background-color has-background <?= esc_attr( $classes ); ?>">
	<div class="container">
		<div class="row g-5">
			<div class="col-lg-5">
				<?php
				if ( get_field( 'title' ) ) {
					?>
				<h2><?= esc_html( get_field( 'title' ) ); ?></h2>
					<?php
				}
				?>
				<?= wp_kses_post( get_field( 'content' ) ); ?>
			</div>
			<div class="col-lg-7">
				<div class="row justify-content-center g-2">
					<?php
					foreach ( $services as $service ) {
						$service_thumb_id = get_post_thumbnail_id( $service->ID );
						$service_thumb    = $service_thumb_id ?
							wp_get_attachment_image(
								$service_thumb_id,
								'large',
								false,
								array( 'alt' => esc_attr( get_the_title( $service->ID ) ) )
							) :
							'<img src="' . get_stylesheet_directory_uri() . '/img/missing-image.png" alt="Placeholder image">';
						$service_link     = get_permalink( $service->ID );
						$col_class        = ( 'emergency-callout' === $service->post_name ) ? 'col-12' : 'col-md-6 col-lg-4';
						$card_size        = ( 'emergency-callout' === $service->post_name ) ? 'service-cards__card--wide' : '';
						?>
					<div class="<?= esc_attr( $col_class ); ?>">
						<a href="<?= esc_url( $service_link ); ?>" class="service-cards__card <?= esc_attr( $card_size ); ?> h-100">
							<div class="service-cards__image-wrapper">
								<?= wp_kses_post( $service_thumb ); ?>
							</div>
							<div class="service-cards__overlay"></div>
							<h3 class="service-cards__title"><?= esc_html( get_the_title( $service->ID ) ); ?></h3>
						</a>
					</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
</section>
	<?php
}