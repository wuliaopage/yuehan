<?php
/**
 * Freeware Layout Optios
 *
 * @package freeware
 */

/**
 * Displays custom theme posts in frontpage. 
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

//Header Options

	// Padding in Header Image
	$wp_customize->add_setting( 'header_image_padding',
		array(
		'default'           => '100',
		'sanitize_callback' => 'freeware_sanitize_positive_integer',
		)
	);
	$wp_customize->add_control( 'header_image_padding',
	array(
		'label'       => esc_html__( 'Header Image height', 'freeware' ),
		'description' => esc_html__( 'Height in vh( Screen Percent )', 'freeware' ),
		'section'     => 'header_image',
		'type'        => 'number',
		'priority'    => 1,
		'input_attrs' => array( 'min' => 1, 'max' => 200),
		)
	);

	$wp_customize->add_setting('subscribe_text', array(
		'default' =>'',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('subscribe_text', array(
		'priority' =>30,
		'label' => __('Subscribe Text', 'freeware'),
		'section' => 'header_image',
		'type' => 'text',
	));

	$wp_customize->add_setting('subscribe_url', array(
		'default' =>'',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control('subscribe_url', array(
		'priority' =>40,
		'label' => __('Subscribe Url', 'freeware'),
		'section' => 'header_image',
		'type' => 'text',
	));

	$wp_customize->add_setting( 'top-innerpage-bg-image',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'top-innerpage-bg-image', array(
        'label' => __('Top innerpage Background Image','freeware'),
        'description' => __('Displays background image in innerpage','freeware'),
        'priority'  => 50,
        'section' => 'header_image',
        )
    ));

