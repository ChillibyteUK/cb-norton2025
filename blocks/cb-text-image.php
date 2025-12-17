<?php
/**
 * Block template for CB Text Image.
 *
 * @package cb-norton2025
 */

defined( 'ABSPATH' ) || exit;

// Get ACF fields.
$col_order = get_field( 'order' ) ? get_field( 'order' ) : 'Text Image';
$split     = get_field( 'split' ) ? get_field( 'split' ) : '50 50';
$level     = get_field( 'level' ) ? get_field( 'level' ) : 'h2';

// Extract custom classes (filter out wp-generated ones).
$custom_classes = '';
if ( $block['className'] ) {
	$class_array    = explode( ' ', $block['className'] );
	$filtered       = array_filter(
		$class_array,
		function ( $item ) {
			return ! preg_match( '/^wp-/', $item );
		}
	);
	$custom_classes = implode( ' ', $filtered );
}
$classes = $custom_classes ? $custom_classes : 'py-5';

// Support Gutenberg color picker.
$bg = ! empty( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
$fg = ! empty( $block['textColor'] ) ? 'has-' . $block['textColor'] . '-color' : '';


// Determine column order classes.
$text_col_order  = 'order-md-1';
$image_col_order = 'order-md-2';
if ( 'Image Text' === $col_order ) {
	$text_col_order  = 'order-md-2';
	$image_col_order = 'order-md-1';
}

// Determine column width classes.
if ( '60 40' === $split ) {
	$text_col_width  = 'col-md-7';
	$image_col_width = 'col-md-5';
} elseif ( '40 60' === $split ) {
	$text_col_width  = 'col-md-5';
	$image_col_width = 'col-md-7';
} else {
	// Default to 50 50.
	$text_col_width  = 'col-md-6';
	$image_col_width = 'col-md-6';
}

// Determine heading level.
$heading_tag = ( 'h1' === $level ) ? 'h1' : 'h2';
// Generate a unique ID for this block instance.
$block_uid = 'text-image-' . uniqid();
?>
<section id="<?= esc_attr( $block_uid ); ?>" class="text-image <?= esc_attr( $bg . ' ' . $fg ); ?> <?= esc_attr( $classes ); ?>">
  	<div class="container">
		<div class="row gy-5 gx-4 gx-lg-5 align-items-center">
			<?php
			// Always output text column first, image column second in the DOM.
			// Parameterise data-animate so that on desktop, columns always slide in from outside in.
			$text_order_class  = $text_col_order;
			$image_order_class = $image_col_order;
			$text_animate      = 'right';
			$image_animate     = 'left';
			if ( 'Image Text' === $col_order ) {
				// Visually swap columns on md+ screens, and swap data-animate so image slides in from left, text from right.
				$text_order_class  = 'order-2 order-md-2';
				$image_order_class = 'order-1 order-md-1';
				$text_animate      = 'left';
				$image_animate     = 'right';
			}
			?>
			<div class="<?= esc_attr( $text_col_width . ' ' . $text_order_class ); ?>" data-aos="fade">
				<?php
				if ( get_field( 'title' ) ) {
					echo '<' . esc_attr( $heading_tag ) . ' class="has-700-font-size mb-4 ' . esc_attr( $dot ) . '">' . wp_kses_post( get_field( 'title' ) ) . '</' . esc_attr( $heading_tag ) . '>';
				}
				?>
				<div>
					<?= wp_kses_post( get_field( 'content' ) ); ?>
					<?php
					if ( get_field( 'link' ) ) {
						$l = get_field( 'link' );
						?>
						<p class="mt-4"><a class="btn btn--primary" href="<?= esc_url( $l['url'] ); ?>"
							target="<?= esc_attr( $l['target'] ? $l['target'] : '_self' ); ?>"><?= esc_html( $l['title'] ); ?></a>
						</p>
						<?php
					}
					?>
				</div>
			</div>
			<div class="<?= esc_attr( $image_col_width . ' ' . $image_order_class ); ?> text-center" data-aos="fade">
					<?= wp_get_attachment_image( get_field( 'image' ), 'full', false, array() ); ?>
			</div>
		</div>
	</div>
</section>