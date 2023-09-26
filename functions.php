<?php
/*
 * My theme Function
 */


//Theme Title
add_theme_support('title-tag');


//Theme file and js files
function rahat_css_js_calling()
{
    wp_enqueue_style('wl-style', get_stylesheet_uri());
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), 'v5.3.2', 'all');
    wp_register_style('custom', get_template_directory_uri() . '/css/custom.css', array(), '1.0.0', 'all');
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('custom');

//jquery
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), 'v5.3.2', 'true');
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', 'true');
}

add_action('wp_enqueue_scripts', 'rahat_css_js_calling');


//google fonts

function add_google_font()
{
    wp_enqueue_style('google_fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap', false);
}

add_action('wp_enqueue_scripts', 'add_google_font');


// Theme function
function theme_customizer_register($wp_customize)
{
//    header area
    $wp_customize->add_section('theme_header_area', array(
        'title' => __('Header Area', 'rahatchowdhury'),
        'description' => 'If you are interested to update your header area , You can do it here.'
    ));

    $wp_customize->add_setting('main_logo', array(
        'default' => get_bloginfo('template_directory') . '/img/logo.png',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'main_logo', array(
        'label' => 'Logo Upload',
        'setting' => 'main_logo',
        'section' => 'theme_header_area',
        'description' => 'If you are interested to update your logo, You can do it here.'
    )));


//    menu position

    $wp_customize->add_section('menu_option', array(
        'title' => __('Menu Position Option', 'rahatchowdhury'),
        'description' => 'If you are interested to update your change your menu position, You can do it here.'
    ));

    $wp_customize->add_setting('menu_position', array(
        'default' => 'right_menu',
    ));

    $wp_customize->add_control('menu_position', array(
        'label' => 'Menu Position',
        'setting' => 'menu_position',
        'section' => 'menu_option',
        'description' => 'Select your menu position.',
        'type' => 'radio',
        'choices' => array(
            'left_menu' => 'Left Menu',
            'right_menu' => 'Right Menu',
            'center_menu' => 'Center Menu',
        )
    ));


//    footer option

    $wp_customize->add_section('footer_option', array(
        'title' => __('Footer Option', 'rahatchowdhury'),
        'description' => 'If you are interested to update your change your your foooter Settings, You can do it here.'
    ));

    $wp_customize->add_setting('copyright_section', array(
        'default' => '&copy; Copyright 2023 || Rahat Chowdhury',
    ));

    $wp_customize->add_control('copyright_section', array(
        'label' => 'Copyright Text',
        'setting' => 'copyright_section',
        'section' => 'footer_option',
        'description' => 'If need to update your copyright text , you can do it here.',
    ));
}


add_action('customize_register', 'theme_customizer_register');


// Menu register
register_nav_menu('main_menu', __('main_menu', 'rahatchowdhury'));


//walker menu properties
function nav_desc($item_output, $item, $args)
{
    if (!empty($item->description)) {
        $item_output = str_replace($args->link_after . '</a>', '<span class="walker_nav">' .
            $item->description . '</span>' . $args->link_after . '</a>' , $item_output);
    }
    return $item_output;
}

add_filter('walker_nav_menu_start_el', 'nav_desc', 10 , 3);
