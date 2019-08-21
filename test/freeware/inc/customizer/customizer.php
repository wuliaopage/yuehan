<?php
/**
 * Freeware Theme Customizer
 *
 * @package freeware
 */

use WPTRT\Customize\Section\Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( Button::class );

	$manager->add_section(
		new Button( $manager, 'freeware_pro', [
			'title'       => __( 'Freeware Pro', 'freeware' ),
			'priority'    => 1,
			'button_text' => __( 'Upgrade To Pro', 'freeware' ),
			'button_url'  => 'https://themespiral.com/themes/freeware/'
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'freeware-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'freeware-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function freeware_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'freeware_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'freeware_customize_partial_blogdescription',
		) );
	}
	class Freeware_title_display extends WP_Customize_Control {
        public $type = 'main-title';
        public $label = '';
        public function render_content() {
        ?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
        <?php
        }
    }

	// Add Panel
	$wp_customize->add_panel( 'freeware_options_panel', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'title' => __( 'Theme Options', 'freeware' ),
	) );



	// Add Section
	$wp_customize->add_section( 'freeware_all_theme_options', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'title' => __( 'All theme Options', 'freeware' ),
		'panel' => 'freeware_options_panel',
	) );

	$wp_customize->add_section( 'freeware_main_banner_section', array(
		'priority' => 30,
		'capability' => 'edit_theme_options',
		'title' => __( 'Main Banner', 'freeware' ),
		'panel' => 'freeware_options_panel',
	) );

	$wp_customize->add_section( 'freeware_category_highlight_section', array(
		'priority' => 40,
		'capability' => 'edit_theme_options',
		'title' => __( 'Category Highlight', 'freeware' ),
		'panel' => 'freeware_options_panel',
	) );

	/**
	 * Control Checkbox Multiple
	 */
	 require get_template_directory() . '/inc/customizer/control-checkbox-multiple.php';

	/**
	 * Layout Options section
	 */
	require get_template_directory() . '/inc/customizer/header-options.php';

	/**
	 * All theme Options section
	 */
	require get_template_directory() . '/inc/customizer/all-theme-options.php';

	/**
	 * Main Banner Section
	 */
	require get_template_directory() . '/inc/customizer/main-banner.php';

	/**
	 * Excerpt Display
	 */
	require get_template_directory() . '/inc/customizer/excerpt-display.php';

	/**
	 * Color Schemes Section
	 */
	require get_template_directory() . '/inc/customizer/color-schemes.php';

	/**
	 * Sanitize functions
	 */
	require get_template_directory() . '/inc/customizer/sanitize-callback-functions.php';

	}
add_action( 'customize_register', 'freeware_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function freeware_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function freeware_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function freeware_customize_preview_js() {
	wp_enqueue_script( 'freeware-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20180801', true );

}
add_action( 'customize_preview_init', 'freeware_customize_preview_js' );
