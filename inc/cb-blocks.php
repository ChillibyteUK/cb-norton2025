<?php
/**
 * File responsible for registering custom ACF blocks and modifying core block arguments.
 *
 * @package cb-norton2025
 */

/**
 * Registers custom ACF blocks.
 *
 * This function checks if the ACF plugin is active and registers custom blocks
 * for use in the WordPress block editor. Each block has its own name, title,
 * category, icon, render template, and supports various features.
 */
function acf_blocks() {
    if ( function_exists( 'acf_register_block_type' ) ) {

		// INSERT NEW BLOCKS HERE.

        acf_register_block_type(
            array(
                'name'            => 'cb_services_feature',
                'title'           => __( 'CB Services Feature' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/cb-services-feature.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'cb_text_image',
                'title'           => __( 'CB Text Image' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/cb-text-image.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
					'color'     => array(
						'gradients'  => false,
						'text'       => true,
						'background' => true,
					),
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'cb_contact',
                'title'           => __( 'CB Contact' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/cb-contact.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'cb_faqs',
                'title'           => __( 'CB FAQs' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/cb-faqs.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'cb_split_text_image',
                'title'           => __( 'CB Split Text Image' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/cb-split-text-image.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
					'color'     => array(
						'gradients'  => false,
						'text'       => true,
						'background' => true,
					),
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'cb_cta',
                'title'           => __( 'CB CTA' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/cb-cta.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'cb_accreditations',
                'title'           => __( 'CB Accreditations' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/cb-accreditations.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'cb_sector_cards',
                'title'           => __( 'CB Sector Cards' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/cb-sector-cards.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'cb_service_cards',
                'title'           => __( 'CB Service Cards' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/cb-service-cards.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'cb_hero',
                'title'           => __( 'CB Hero' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/cb-hero.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'cb_home_hero',
                'title'           => __( 'CB Home Hero' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/cb-home-hero.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

    }
}
add_action( 'acf/init', 'acf_blocks' );

// Auto-sync ACF field groups from acf-json folder.
add_filter(
	'acf/settings/save_json',
	function ( $path ) { // phpcs:ignore
		return get_stylesheet_directory() . '/acf-json';
	}
);

add_filter(
	'acf/settings/load_json',
	function ( $paths ) {
		unset( $paths[0] );
		$paths[] = get_stylesheet_directory() . '/acf-json';
		return $paths;
	}
);

/**
 * Modifies the arguments for specific core block types.
 *
 * @param array  $args The block type arguments.
 * @param string $name The block type name.
 * @return array Modified block type arguments.
 */
function core_block_type_args( $args, $name ) {

	if ( 'core/paragraph' === $name ) {
		$args['render_callback'] = 'modify_core_add_container';
	}
	if ( 'core/heading' === $name ) {
		$args['render_callback'] = 'modify_core_add_container';
	}
	if ( 'core/list' === $name ) {
		$args['render_callback'] = 'modify_core_add_container';
	}

    return $args;
}
add_filter( 'register_block_type_args', 'core_block_type_args', 10, 3 );

/**
 * Helper function to detect if footer.php is being rendered.
 *
 * @return bool True if footer.php is being rendered, false otherwise.
 */
function is_footer_rendering() {
    $backtrace = debug_backtrace( DEBUG_BACKTRACE_IGNORE_ARGS ); // phpcs:ignore
    foreach ( $backtrace as $trace ) {
        if ( isset( $trace['file'] ) && basename( $trace['file'] ) === 'footer.php' ) {
            return true;
        }
    }
    return false;
}

/**
 * Adds a container div around the block content unless footer.php is being rendered.
 *
 * @param array  $attributes The block attributes.
 * @param string $content    The block content.
 * @return string The modified block content wrapped in a container div.
 */
function modify_core_add_container( $attributes, $content ) {
    if ( is_footer_rendering() ) {
        return $content;
    }

    ob_start();
    ?>
    <div class="container">
        <?= wp_kses_post( $content ); ?>
    </div>
	<?php
	$content = ob_get_clean();
    return $content;
}

