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
					<li class="mb-4"><span class="fa-li"><i class="fas fa-location-dot"></i></span> Find us at:<br><?= wp_kses_post( get_field( 'contact_address', 'option' ) ); ?></li>
					<li><span class="fa-li"><i class="fas fa-hashtag"></i></span> Follow us on Social Media:
					<?= do_shortcode( '[social_icons class="fa-2x"]' ); ?></li>
				</ul>
			</div>
			<div class="col-lg-6">
				<?= do_shortcode( get_field( 'form_shortcode' ) ); ?>
			</div>
		</div>
	</div>
	<div class="has-grey-background-color has-background py-5">
		<div class="container">
			<div class="d-md-none h2 text-center mb-4">Speak up in confidence</div>
			<div class="row g-5">
				<div class="col-md-4 d-flex align-items-center justify-content-center">
					<a href="https://norton-mechanical.theitrustapp.com/" target="_blank" rel="noopener noreferrer">
						<img src="<?= esc_url( get_stylesheet_directory_uri() . '/img/itrust-qr.png' ); ?>" alt="iTrust QR Code" width=245 height=245 />
					</a>
				</div>
				<div class="col-md-8">
					<h2 class="d-none d-md-block">Speak up in confidence</h2>
					As part of our commitment to continual improvement we welcome your feedback. 

					To do so please simply scan the QR code, you can do this anonymously too.
					<ul>
						<li>Report a Concern</li>
						<li>Suggest a Change</li>
						<li>Give Feedback</li>
					</ul>
					<img src="<?= esc_url( get_stylesheet_directory_uri() . '/img/itrust-logo.png' ); ?>" alt="iTrust Logo" width=228 height=70 />
				</div>
			</div>
		</div>
	</div>
</section>