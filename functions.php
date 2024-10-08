<?php

add_theme_support( 'title-tag');

function my_custom_theme_style() {
    // Enqueue the main theme stylesheet which is style.css
    wp_enqueue_style('my_theme_style', get_stylesheet_uri());

    // Enqueue the main.css and custom.css stylesheet
    wp_enqueue_style('my_bootstrap_css', get_template_directory_uri() . '/css/bootstrap.css', [], '5.0.2');
    wp_enqueue_style('my_custom_css', get_template_directory_uri() . '/css/custom.css', [], '1.0.0');

    // Enqueue the main.js and custom.js scripts
    wp_enqueue_script('my_bootstrap_js', get_template_directory_uri() . '/js/bootstrap.js', [], '5.0.2', true);
    wp_enqueue_script('my_custom_js', get_template_directory_uri() . '/js/custom.js', [], '1.0.0', true);

    // Jquery enqueue
    wp_enqueue_script('jquery');
}

add_action('wp_enqueue_scripts', 'my_custom_theme_style');

function my_customizer_register_settings($wp_customize) {
    // Add a section for the image
    $wp_customize->add_section('my_header_area', [
        'title' => __('Header Area', 'antorwp'),
        'description' => 'You can update the header area from here'
    ]);

    $wp_customize->add_setting('my_logo', [
        'default' => get_template_directory_uri() . '/img/wp-logo.jpg',
    ]);

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'my_logo', [
        'label' =>  __('Upload Image', 'antorwp'),
        'section' => 'my_header_area',
        'setting' => 'my_logo',
    ]));

    // Add menu position start
    $wp_customize->add_section('my_menu_position_section', [
        'title' => __('Menu position', 'antorwp'),
        'description' => __('You can update menu position from here', 'antorwp'),
    ]);

    $wp_customize->add_setting('my_menu_position_setting', [
        'default' => 'right_menu'
    ]);

    $wp_customize->add_control('my_menu_position_setting', [
        'label' => __('Update menu position', 'antorwp'),
        'section' => 'my_menu_position_section',
        'setting' => 'my_menu_position_setting',
        'type' => 'radio',
        'choices' => [
            'left_menu' => 'Left menu',
            'right_menu' => 'Right menu',
            'center_menu' => 'Center menu',
        ]
    ]);
    // Add menu position end

    // footer start
    $wp_customize->add_section('my_footer_section', [
        'title' => __('Footer', 'antorwp'),
        'description' => __('You can update Footer from here', 'antorwp'),
    ]);

    $wp_customize->add_setting('my_footer_setting', [
        'default' => 'Copyright  &copy 2024'
    ]);

    $wp_customize->add_control('my_footer_setting', [
        'label' => __('Update footer', 'antorwp'),
        'section' => 'my_footer_section',
        'setting' => 'my_footer_setting',
    ]);
    // footer end
}

add_action('customize_register', 'my_customizer_register_settings');

// Enqueue google font
function my_google_font() {
    wp_enqueue_style('my_add_google_fonts', 'https://fonts.googleapis.com/css2?family=Kaisei+Decol&family=Oswald&display=swap');
}

add_action('wp_enqueue_scripts', 'my_google_font');


// Main menu register
register_nav_menu('main_menu', __('Main Menu', 'antorwp'));
