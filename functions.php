<?php


require_once(__DIR__ . '/functions/customizer.php');

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
    wp_enqueue_script('melhores_script', get_template_directory_uri() . '/js/app.js', array(), '1.0.0', true);
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
        'header' => __('Header Menu', 'melhores'),
        'footer' => __('Footer Menu', 'melhores'),
    ];
    // регіструємо області меню, які лежать у $locations
    register_nav_menus($locations);
}
// хук собитіє
add_action('init', 'melhores_menus');

class Summary_Menu_Walker extends Walker_Nav_Menu
{
    // Відкриваємо елемент <details> для основного пункту меню
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $classes = implode(' ', $item->classes);

        if ($depth === 0) {
            // Початок основного пункту меню з тегами <details> і <summary>
            $output .= '<details class="menu__item">';
            $output .= '<summary class="menu__link">' . esc_html($item->title) . '</summary>';
        } else {
            // Виведення вкладених пунктів меню як елементів <li>
            $output .= '<li class="menu__sub-item"><a href="' . esc_url($item->url) . '"><span>' . esc_html($item->title) . '</span><span>' . rand(1, 100) . '</span></a></li>';
        }
    }

    // Закриваємо елемент меню
    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        if ($depth === 0) {
            $output .= '</details>'; // Закриваємо <details>
        }
    }

    // Відкриваємо <ul> для підпунктів
    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        if ($depth === 0) {
            $output .= '<ul class="menu__sub-list">';
        }
    }

    // Закриваємо <ul> для підпунктів
    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        if ($depth === 0) {
            $output .= '</ul>';
        }
    }
}
