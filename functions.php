<?php

/*
    Connection scripts and styles for the theme
*/

// The right way for adding styles and scripts to the page
add_action('wp_enqueue_scripts', 'melhores_scripts');

function melhores_scripts()
{
    wp_enqueue_style('main_style', get_stylesheet_uri());
    wp_enqueue_style('melhores_style', get_template_directory_uri() . '/css/style.css', array('main_style'), null);
    wp_enqueue_script('melhores_script', get_template_directory_uri() . '/js/app.js', array(), '1.0.0', true);
}
