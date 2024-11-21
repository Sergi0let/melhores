<?php


require_once(__DIR__ . '/functions/customizer.php');
require_once(__DIR__ . '/functions/widgets.php');
require_once(__DIR__ . '/functions/menus.php');

// Налаштування теми
if (! function_exists('melhores_setup')) {
    function melhores_setup()
    {

        // Підтримка кастомного логотипу
        add_theme_support('custom-logo', [
            'height'      => 40,
            'width'       => 195,
            'flex-width'  => true,
            'flex-height' => true,
            'header-text' => '',
        ]);

        // Налаштування кастомного логотипу для мобільної версії у Indentity
        add_action('customize_register', 'add_mobile_logo_to_site_identity');

        // Виводити thumb для постів та сторінок
        add_theme_support('post-thumbnails');

        set_post_thumbnail_size(300, 200, true); // розмір мініатюр поста за замовучуванням

        // Динамічний <title>
        add_theme_support('title-tag');
    }

    add_action('after_setup_theme', 'melhores_setup');

}




// Підключення стилів та скриптів теми
function melhores_scripts()
{
    // Основний файл стилів теми
    wp_enqueue_style('main_style', get_stylesheet_uri());
    // Додатковий стиль теми
    wp_enqueue_style('melhores_style', get_template_directory_uri() . '/css/style.css', array('main_style'), null);
    // Підключення скрипта теми
    wp_enqueue_script('melhores_script', get_template_directory_uri() . '/js/app.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'melhores_scripts');


// Фільтри

// Змінює роздільник в title
function melhores_title_separator($separator)
{
    return '🧑‍💻';
}
add_filter('document_title_separator', 'melhores_title_separator');


// Регістрація заглушок під меню
function melhores_menus()
{
    // збираємо декілька областей меню
    $locations = [
        'header'        => __('Header Menu', 'melhores'),
        'footer-menu-1' => __('Tipi di Scommesse'),
        'footer-menu-2' => __('Migliori Casinò non AAMS'),
        'footer-menu-3' => __('Pagine Importanti'),
        'footer-menu-4' => __('Media Sociali'),
    ];
    // регіструємо області меню, які лежать у $locations
    register_nav_menus($locations);
}
// хук собитіє
add_action('init', 'melhores_menus');




function melhores_widgets_init()
{
    register_sidebar([
        'name' => esc_html__('Сайдбарчик', 'melhores'),
        'id' => 'sidebar-slot',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_sidebar' => '<aside id="%1$s" class="sidebar-widget %2$s">',
        'after_sidebar' => '</aside>',
        'before_title' => '<h2 class="sidebar-widget-title">',
        'after_title' => '</h2>',
    ]);

    register_sidebar([
        'name' => esc_html__('Сайдбарчик нижнього колонтитула', 'melhores'),
        'id' => 'sidebar-footer-bottom',
        'before_widget' => '<div class="footer__content">',
        'after_widget' => '</div>',
        'before_title' => '<p>',
        'after_title' => '</p>',
    ]);
}
add_action('widgets_init', 'melhores_widgets_init');



add_filter('widget_text_content', function ($content, $widget, $instance) {
    if (!empty($widget->id) && $widget->id === 'sidebar-footer-bottom') {
        // Повертаємо чистий контент без зайвих контейнерів
        return $content;
    }
    return $content;
}, 10, 3);
