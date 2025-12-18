<?php
/**
 * Block template for CB Split Text Image.
 *
 * @package cb-norton2025
 */

defined( 'ABSPATH' ) || exit;

$classes = $block['className'] ?? null;

// Support Gutenberg color picker.
$bg = ! empty( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
$fg = ! empty( $block['textColor'] ) ? 'has-' . $block['textColor'] . '-color' : '';

$image_order  = 'Image/Text' === get_field( 'order' ) ? 'left-half' : 'right-half';
$text_order   = 'Image/Text' === get_field( 'order' ) ? '' : 'order-lg-1';
$text_offset  = 'Image/Text' === get_field( 'order' ) ? 'offset-lg-6' : '';
$text_padding = 'Image/Text' === get_field( 'order' ) ? 'ps-lg-5' : 'pe-lg-5';

$aos = 'Image/Text' === get_field( 'order' ) ? 'fade-left' : 'fade-right';

$img = wp_get_attachment_image_url( get_field( 'image' ), 'full' ) ? wp_get_attachment_image_url( get_field( 'image' ), 'full' ) : get_stylesheet_directory_uri() . '/img/placeholder-800x450.png';
?>
<section class="split position-relative <?= esc_attr( $bg . ' ' . $fg ); ?> <?= esc_attr( $classes ); ?>">
    <div class="container-fluid position-relative">
        <div class="container">
            <div class="h2 d-lg-none text-center pt-3">
                <?= esc_html( get_field( 'title' ) ); ?>
            </div>
            <div class="row">
                <div class="col-lg-6 position-lg-absolute <?= esc_attr( $image_order ); ?> h-100 split__image" data-aos="fade">
                    <img src="<?= esc_url( $img ); ?>" alt="<?= esc_attr( get_field( 'title' ) ); ?>">
                </div>
                <div class="col-lg-6 split__text-column d-lg-flex flex-column justify-content-center <?= esc_attr( $text_offset ); ?> py-5 <?= esc_attr( $text_padding ); ?>" data-aos="<?= esc_attr( $aos ); ?>">
                    <h2 class="h2 d-none d-lg-block">
                        <?= esc_html( get_field( 'title' ) ); ?>
                    </h2>
                    <?= wp_kses_post( get_field( 'content' ) ); ?>
                    <?php
                    if ( get_field( 'link' ) ?? null ) {
                        $l = get_field( 'link' );
                    	?>
                        <a href="<?= esc_url( $l['url'] ); ?>"
                            class="btn btn--primary mx-auto mt-4 ms-md-0"
                            target="<?= esc_attr( $l['target'] ); ?>"><?= esc_html( $l['title'] ); ?></a>
                    	<?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>