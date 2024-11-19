<?php

// Додаємо опцію мобільного логотипу до розділу Site Identity
function add_mobile_logo_to_site_identity($wp_customize)
{
    // Додаємо налаштування для мобільного логотипу в розділ "Ідентифікація сайту"
    $wp_customize->add_setting('mobile_logo', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw', // Захист від шкідливих URL
    ]);

    // Додаємо контроль зображення для мобільного логотипу
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'mobile_logo',
        [
            'label'       => __('Mobile Logo', 'your-theme-textdomain'),
            'section'     => 'title_tagline', // Додаємо до стандартного розділу Site Identity
            'settings'    => 'mobile_logo',
            'description' => __('Upload a logo specifically for the mobile version of the site.', 'your-theme-textdomain'),
        ]
    ));
}
