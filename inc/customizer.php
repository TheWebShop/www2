<?php
/**
 * www2 Theme Customizer
 *
 * @package www2
 * @since www2 1.2
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 *
 * @since www2 1.2
 */
function www2_customize_register($wp_customize ) {
    // TODO put header image in www2_header section
    //$wp_customize->remove_section('header_image');
    $wp_customize->remove_section('colors');
    $wp_customize->remove_section('title_tagline');

    /**
     * Header
     */
    $wp_customize->add_section('www2_header' , array(
        'title'      => __('Header','www2'),
        'priority'   => 60,
    ));
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->add_setting('www2_theme_options[showTitle]', array(
        'default'     => true,
        'type'        => 'option',
        'transport'   => 'postMessage',
    ));
    $wp_customize->get_setting('blogdescription' )->transport = 'postMessage';
    $wp_customize->add_setting('www2_theme_options[showDescription]', array(
        'default'     => true,
        'type'        => 'option',
        'transport'   => 'postMessage',
    ));
    $wp_customize->add_control('www2_blogname', array(
        'label'   => __('Site Title', 'www2'),
        'section' => 'www2_header',
        'settings'   => 'blogname',
    ));
    $wp_customize->add_control('www2_showTitle', array(
        'settings' => 'www2_theme_options[showTitle]',
        'label'    => __('Display Site Title'),
        'section'  => 'www2_header',
        'type'     => 'checkbox',
    ));
    $wp_customize->add_control('www2_blogdescription', array(
        'label'   => __('Tagline', 'www2'),
        'section' => 'www2_header',
        'settings'   => 'blogdescription',
    ));
    $wp_customize->add_control('www2_showDescription', array(
        'settings' => 'www2_theme_options[showDescription]',
        'label'    => __('Display Tagline', 'www2'),
        'section'  => 'www2_header',
        'type'     => 'checkbox',
    ));

    /**
     * Footer
     */
    $wp_customize->add_section('www2_footer' , array(
        'title'      => __('Footer', 'www2'),
        'priority'   => 200,
    ));
    $wp_customize->add_setting('www2_theme_options[footer_logo]', array(
        'type'           => 'option',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
        'label'    => __('Footer Logo', 'www2'),
        'section'  => 'www2_footer',
        'settings' => 'www2_theme_options[footer_logo]',
    )));
    $wp_customize->add_setting('www2_theme_options[footer_logo_href]', array(
        'type'        => 'option',
        'transport'   => 'postMessage',
    ));
    $wp_customize->add_control('www2_footerLogoHref', array(
        'label'   => __('Logo Href', 'www2'),
        'section' => 'www2_footer',
        'settings'   => 'www2_theme_options[footer_logo_href]',
    ));
    $wp_customize->add_setting('www2_theme_options[credits]', array(
        'default'     => '<a href="http://wordpress.org/" title="A Semantic Personal Publishing Platform" rel="generator">Proudly powered by WordPress</a><span class="sep"> | </span>Theme: www2 by <a href="https://github.com/organizations/TheWebShop" rel="designer">TheWebShop</a>.',
        'type'        => 'option',
        'transport'   => 'postMessage',
    ));
    $wp_customize->add_control('www2_credits', array(
        'label'   => __('Credits', 'www2'),
        'section' => 'www2_footer',
        'settings'   => 'www2_theme_options[credits]',
    ));
}
add_action('customize_register', 'www2_customize_register');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since www2 1.2
 */
function www2_customize_preview_js() {
    wp_enqueue_script('www2_customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20120827', true);
}
add_action('customize_preview_init', 'www2_customize_preview_js');
