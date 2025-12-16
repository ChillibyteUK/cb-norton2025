<?php
/**
 * Block template for CB Contact.
 *
 * @package cb-norton2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="contact">
	<div class="container py-5">
		<div class="row g-5">
			<div class="col-lg-6">
				<div class="h1"><?= esc_html( get_field( 'title' ) ); ?></div>
				<div class="contact__content has-400-font-size my-4">
					<?= wp_kses_post( get_field( 'content' ) ); ?>
				</div>
				<ul class="fa-ul">
					<li><span class="fa-li"><i class="fas fa-phone"></i></span> Call us on <?= do_shortcode( '[contact_phone]' ); ?></li>
					<li><span class="fa-li"><i class="fas fa-envelope"></i></span> Email us at <?= do_shortcode( '[contact_email]' ); ?></li>
					<li><span class="fa-li"><i class="fas fa-location-dot"></i></span> Find us at:<br><?= wp_kses_post( get_field( 'contact_address', 'option' ) ); ?></li>
				</ul>
			</div>
			<div class="col-lg-6">
				<?= do_shortcode( get_field( 'form_shortcode' ) ); ?>
			</div>
		</div>
	</div>
</section>