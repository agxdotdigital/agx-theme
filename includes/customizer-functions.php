<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register Customizer controls which add Elementor deeplinks
 *
 * @return void
 */
add_action( 'customize_register', 'agx_customizer_register' );
function agx_customizer_register( $wp_customize ) {
	require get_template_directory() . '/includes/customizer/elementor-upsell.php';

	$wp_customize->add_section(
		'agx_theme_options',
		[
			'title' => __( 'Header &amp; Footer', 'agx-theme' ),
			'capability' => 'edit_theme_options',
		]
	);

	$wp_customize->add_setting(
		'agx-theme-header-footer',
		[
			'sanitize_callback' => false,
			'transport' => 'refresh',
		]
	);

	$wp_customize->add_control(
		new AGXTheme\Includes\Customizer\Elementor_Upsell(
			$wp_customize,
			'agx-theme-header-footer',
			[
				'section' => 'agx_theme_options',
				'priority' => 20,
			]
		)
	);
}


/**
 * Enqueue Customiser CSS
 *
 * @return string HTML to use in the customizer panel
 */
add_action( 'admin_enqueue_scripts', 'agx_customizer_print_styles' );
function agx_customizer_print_styles() {

	$min_suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_style(
		'agx-theme-customizer',
		get_template_directory_uri() . '/customizer' . $min_suffix . '.css',
		[],
		AGX_THEME_VERSION
	);
}
