<?php
/**
 * Block template for CB Leadership.
 *
 * @package cb-norton2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="leadership">
	<div class="container">

		<div class="row g-5 py-5">
			<?php
			while ( have_rows( 'people' ) ) {
				the_row();
				?>
			<div class="col-md-4 text-center">
				<?= wp_get_attachment_image( get_sub_field( 'image' ), 'large', false, array( 'alt' => esc_attr( get_sub_field( 'name' ) ), 'class' => 'img-fluid rounded-circle w-50' ) ); ?>
				<h3 class="leadership__name has-400-font-size mt-3 mb-1"><?= esc_html( get_sub_field( 'name' ) ); ?></h3>
				<div class="leadership__role mt-3 mb-1"><?= esc_html( get_sub_field( 'role' ) ); ?></div>
				<div class="leadership__links d-flex justify-content-center align-items-center gap-4">
				<?php
				if ( get_sub_field( 'linkedin' ) ) {
					?>
				<a href="<?= esc_url( get_sub_field( 'linkedin' ) ); ?>" target="_blank" rel="noopener noreferrer">
					<i class="fab fa-linkedin-in"></i>
				</a>
					<?php
				}
				if ( get_sub_field( 'email' ) ) {
					?>
				<a href="mailto:<?= esc_url( antispambot( get_sub_field( 'email' ) ) ); ?>" target="_blank" rel="noopener noreferrer">
					<i class="fas fa-envelope"></i>
				</a>
					<?php
				}
				if ( get_sub_field( 'phone' ) ) {
					?>
				<a href="tel:<?= esc_url( antispambot( get_sub_field( 'phone' ) ) ); ?>" target="_blank" rel="noopener noreferrer">
					<i class="fas fa-phone"></i>
				</a>
					<?php
				}
				?>
				</div>
			</div>
				<?php
			}
			?>
		</div>
	</div>
</section>