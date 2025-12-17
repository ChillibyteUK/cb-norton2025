<?php
/**
 * Block template for CB Sector Cards.
 *
 * @package cb-norton2025
 */

defined( 'ABSPATH' ) || exit;

$sectors_page = get_page_by_path( 'sectors' );
$sectors      = get_children(
	array(
		'post_parent'    => $sectors_page->ID,
		'post_type'      => 'page',
		'posts_per_page' => -1,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
	)
);

if ( $sectors ) {
	?>
<section class="sector-cards pt-4 mt-0 alignfull">
	<div class="container">
		<div class="row justify-content-center g-2">
			<?php
			foreach ( $sectors as $sector ) {
				$sector_thumb_id = get_post_thumbnail_id( $sector->ID );
				$sector_thumb    = $sector_thumb_id ?
					wp_get_attachment_image(
						$sector_thumb_id,
						'medium',
						false,
						array( 'alt' => esc_attr( get_the_title( $sector->ID ) ) )
					) :
					'<img src="' . get_stylesheet_directory_uri() . '/img/missing-image.png" alt="Placeholder image">';
				$sector_link     = get_permalink( $sector->ID );
				?>
			<div class="col-sm-6 col-md-4 col-lg-3">
				<a href="<?= esc_url( $sector_link ); ?>" class="sector-cards__card h-100">
					<div class="sector-cards__image-wrapper">
						<?= wp_kses_post( $sector_thumb ); ?>
					</div>
					<h3 class="sector-cards__title"><?= esc_html( get_the_title( $sector->ID ) ); ?></h3>
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