<?php
/**
 * Freeware Excerpt Display
 *
 * @package freeware
 */

/**
 * Displays custom theme posts in frontpage. 
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

	$wp_customize->add_section( 'excerpt-settings', array(
		'priority' => 100,
		'capability' => 'edit_theme_options',
		'title' => __( 'Excerpt Settings', 'freeware' ),
		'panel' => 'freeware_options_panel',
	) );

	$wp_customize->add_setting( 'excerpt-display', array(
		'default' => 'full-content',
		'sanitize_callback' => 'freeware_sanitize_select',
		));
	$wp_customize->add_control( 'excerpt-display', array(
		'priority'=>10,
		'label' => __('Post Excerpt Content', 'freeware'),
		'description' => __('Designed only for Blog Posts', 'freeware'),
		'section' => 'excerpt-settings',
		'type' => 'radio',
		'choices' => array(
		'full-content' => __( 'Full Content','freeware' ),
		'excerpt-content' => __( 'Excerpt Content','freeware' ),
		),
	));