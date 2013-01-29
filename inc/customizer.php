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
    $wp_customize->remove_section('title_tagline');

    /**
     * Header
     */
    $wp_customize->add_section('www2_header' , array(
        'title'      => __('Header','www2'),
        'priority'   => 60,
    ));
    $wp_customize->add_setting('www2_theme_options[logo]', array(
        'type'     => 'option',
        'transport'   => 'postMessage',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'www2_logo', array(
        'label'    => __('Logo', 'www2'),
        'section'  => 'www2_header',
        'settings' => 'www2_theme_options[logo]',
        'priority' => 1,
    )));
    $wp_customize->add_setting('www2_theme_options[isLogoRetina]', array(
        'type'        => 'option',
        'transport'   => 'postMessage',
    ));
    $wp_customize->add_control('www2_isLogoRetina', array(
        'settings' => 'www2_theme_options[isLogoRetina]',
        'label'    => __('Halve image dimension (retina)'),
        'section'  => 'www2_header',
        'type'     => 'checkbox',
        'priority' => 2,
    ));
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->add_control('www2_blogname', array(
        'label'     => __('Site title', 'www2'),
        'section'   => 'www2_header',
        'settings'  => 'blogname',
        'priority'  => 3,
    ));
    $wp_customize->add_setting('www2_theme_options[showTitle]', array(
        'default'     => true,
        'type'        => 'option',
        'transport'   => 'postMessage',
    ));
    $wp_customize->add_control('www2_showTitle', array(
        'settings' => 'www2_theme_options[showTitle]',
        'label'    => __('Display Site Title'),
        'section'  => 'www2_header',
        'type'     => 'checkbox',
        'priority' => 4,
    ));
    $wp_customize->get_setting('blogdescription' )->transport = 'postMessage';
    $wp_customize->add_control('www2_blogdescription', array(
        'label'   => __('Tagline', 'www2'),
        'section' => 'www2_header',
        'settings'   => 'blogdescription',
        'priority' => 5,
    ));
    $wp_customize->add_setting('www2_theme_options[showDescription]', array(
        'default'     => true,
        'type'        => 'option',
        'transport'   => 'postMessage',
    ));
    $wp_customize->add_control('www2_showDescription', array(
        'settings' => 'www2_theme_options[showDescription]',
        'label'    => __('Display Tagline', 'www2'),
        'section'  => 'www2_header',
        'type'     => 'checkbox',
        'priority' => 6,
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
        'priority' => 1,
    )));
    $wp_customize->add_setting('www2_theme_options[isFooterLogoRetina]', array(
        'type'        => 'option',
        'transport'   => 'postMessage',
    ));
    $wp_customize->add_control('www2_isFooterLogoRetina', array(
        'settings' => 'www2_theme_options[isFooterLogoRetina]',
        'label'    => __('Halve image dimension (retina)'),
        'section'  => 'www2_footer',
        'type'     => 'checkbox',
        'priority' => 2,
    ));
    $wp_customize->add_setting('www2_theme_options[footer_logo_href]', array(
        'type'        => 'option',
        'transport'   => 'postMessage',
    ));
    $wp_customize->add_control('www2_footerLogoHref', array(
        'label'     => __('Logo Href', 'www2'),
        'section'   => 'www2_footer',
        'settings'  => 'www2_theme_options[footer_logo_href]',
        'priority'  => 3,
    ));
    $wp_customize->add_setting('www2_theme_options[credits]', array(
        'default'     => '<a href="http://wordpress.org/" title="A Semantic Personal Publishing Platform" rel="generator">Proudly powered by WordPress</a><span class="sep"> | </span>Theme: www2 by <a href="https://github.com/organizations/TheWebShop" rel="designer">TheWebShop</a>.',
        'type'        => 'option',
        'transport'   => 'postMessage',
    ));
    $wp_customize->add_control('www2_credits', array(
        'label'     => __('Credits', 'www2'),
        'section'   => 'www2_footer',
        'settings'  => 'www2_theme_options[credits]',
        'priority'  => 4,
    ));
}
add_action('customize_register', 'www2_customize_register');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since www2 1.2
 */
function www2_customize_preview_js() {
    wp_enqueue_script('www2_customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20130125-17', true);
}
add_action('customize_preview_init', 'www2_customize_preview_js');
