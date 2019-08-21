<?php
/**
 * Freeware Color Schemes
 *
 * @package freeware
 */

// Color Schemes
$wp_customize->add_setting( 'color-schemes' , array(
    'default'   => '#c52228',
    'sanitize_callback' => 'sanitize_hex_color',
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color-schemes', array(
    'label'      => __( 'Color Schemes', 'freeware' ),
    'priority'   => 20,
    'section'    => 'colors',
) ) );