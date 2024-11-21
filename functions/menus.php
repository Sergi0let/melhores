<?php

class Footer_Nav_Walker extends Walker_Nav_Menu
{
    // Виводимо кожен пункт меню як <a>
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $output .= '<a href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a>';
    }

    // Вимикаємо додавання <ul> для списків меню
    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        $output .= '';
    }

    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        $output .= '';
    }

    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        $output .= '';
    }
}

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
