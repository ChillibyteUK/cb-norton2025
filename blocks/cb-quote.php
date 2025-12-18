<?php
/**
 * Block template for CB Quote.
 *
 * @package cb-norton2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="quote p-4 my-5">
	<div class="quote__quote">
		<?= wp_kses_post( get_field( 'quote' ) ); ?>
	</div>
	<?php
	if ( get_field( 'attribution' ) ) {
		?>
	<div class="quote__attribution">
		&mdash; <?= esc_html( get_field( 'attribution' ) ); ?>
	</div>
		<?php
	}
	?>
</section>