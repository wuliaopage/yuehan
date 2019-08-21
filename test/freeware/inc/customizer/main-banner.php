<?php
/**
 * Freeware Main Banner
 *
 * @package freeware
 */

/**
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
    // Main Banner
    $wp_customize->add_setting( 'select_main_banner_category', array(
        'default' => '',
        'sanitize_callback' => 'freeware_sanitize_select',
    ));
    $wp_customize->add_control( 'select_main_banner_category', array(
        'priority'=>10,
        'label' => __('Select Main Banner', 'freeware'),
        'section' => 'freeware_main_banner_section',
        'type' => 'select',
        'choices'   =>  freeware_cat_list()
    ));

    $wp_customize->add_setting( 'img-banner-bg-image',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'img-banner-bg-image', array(
        'label' => __('Banner Background Image','freeware'),
        'priority'  => 20,
        'section' => 'freeware_main_banner_section',
        )
    ));

    $wp_customize->add_setting( 'banner_title_text', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'banner_title_text', array(
        'priority'=>30,
        'label' => __('Title', 'freeware'),
        'section' => 'freeware_main_banner_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting( 'banner_sub_title_text', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'banner_sub_title_text', array(
        'priority'=>40,
        'label' => __('Subtitle / Description', 'freeware'),
        'section' => 'freeware_main_banner_section',
        'type' => 'text',
    ));


    // Highlight Category
    $wp_customize->add_setting( 'select_category_highlight', array(
        'default' => '',
        'sanitize_callback' => 'freeware_sanitize_select',
    ));
    $wp_customize->add_control( 'select_category_highlight', array(
        'priority'=>10,
        'label' => __('Select Category Highlight Primary', 'freeware'),
        'section' => 'freeware_category_highlight_section',
        'type' => 'select',
        'choices'   =>  freeware_cat_list()
    ));

    if ( !class_exists( 'Freeware_Pro' ) ) {

        for ( $i=1; $i <= 4; $i++ ) {
            $wp_customize->add_setting( 'cat-highlighted-color-post-'.$i , array(
                'default'   => '',
                'sanitize_callback' => 'sanitize_hex_color',
            ) );

            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cat-highlighted-color-post-'.$i, array(
                'label'      => __( 'Highlighted Posts Color #', 'freeware' ). $i,
                'priority'   => 20,
                'section'    => 'freeware_category_highlight_section',
            ) ) );
        }
    }