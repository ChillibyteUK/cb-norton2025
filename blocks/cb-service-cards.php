<?php
/**
 * Block template for CB Service Cards.
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

$classes = $block['className'] ?? 'py-5';

if ( $services ) {
	?>
<section class="service-cards alignfull <?= esc_attr( $classes ); ?>">
	<div class="container">
		<div class="row justify-content-center g-4">
			<?php
			foreach ( $services as $service ) {
				$service_thumb_id = get_post_thumbnail_id( $service->ID );
				$service_thumb    = $service_thumb_id ?
					wp_get_attachment_image(
						$service_thumb_id,
						'medium',
						false,
						array( 'alt' => esc_attr( get_the_title( $service->ID ) ) )
					) :
					'<img src="' . get_stylesheet_directory_uri() . '/img/missing-image.png" alt="Placeholder image">';
				$service_link     = get_permalink( $service->ID );
				?>
			<div class="col-md-6 col-lg-4 col-xl-3">
				<a href="<?= esc_url( $service_link ); ?>" class="service-cards__card h-100">
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
</section>
	<?php
}