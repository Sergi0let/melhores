<?php

# Disables the block editor for WordPress widgets
add_filter('use_widgets_block_editor', '__return_false');

add_action('widgets_init', 'register_download_widget');

// register Download_Widget in WordPress
function register_download_widget()
{
    register_widget('Download_Widget');
}

class Download_Widget extends WP_Widget
{
    // Widget registration using the main class
    public function __construct()
    {
        // the constructor call looks like this:
        // __construct( $id_base, $name, $widget_options = array(), $control_options = array() )
        parent::__construct(
            'download_widget', // widget ID, if not specified (leave ''), the ID will be equal to the class name in lowercase: download_widget
            'Корисні файли',
            [ 'description' => 'Вкажіть посилання на файли, які ви хочете завантажити', 'classname' => 'download' ]
        );

        // widget scripts/styles, only if it is active
        if (is_active_widget(false, false, $this->id_base) || is_customize_preview()) {
            add_action('wp_enqueue_scripts', array( $this, 'add_download_widget_scripts' ));
            add_action('wp_head', array( $this, 'add_download_widget_style' ));
        }
    }

    /**
     * Widget output in the Front End
     *
     * @param array $args widget arguments.
     * @param array $instance saved data from settings
     */
    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        $file = $instance['file'];
        $file_name = $instance['file_name'];

        echo $args['before_widget'];
        if (! empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
        echo '<a href="'.$file.'">💿 Скачати файл</a><b>'.$file_name.'</b>';
        echo $args['after_widget'];
    }

    /**
     * The admin part of the widget
     *
     * @param array $instance saved data from settings
     */
    public function form($instance)
    {
        $title = @ $instance['title'] ?: 'Корисні файли';
        $file = @ $instance['file'] ?: 'URL файла';
        $file_name = @ $instance['file_name'] ?: 'Назва файла';
        ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
			<input class="widefat" 
				id="<?php echo $this->get_field_id('title'); ?>" 
				name="<?php echo $this->get_field_name('title'); ?>" 
				type="text" value="<?php echo esc_attr($title); ?>"
			>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('file_name'); ?>"><?php _e('File name:'); ?></label>
			<input class="widefat" 
				id="<?php echo $this->get_field_id('file_name'); ?>" 
				name="<?php echo $this->get_field_name('file_name'); ?>" 
				type="text" value="<?php echo esc_attr($file_name); ?>"
			>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('file'); ?>"><?php _e('Посилання на файл:'); ?></label>
			<input class="widefat" 
				id="<?php echo $this->get_field_id('file'); ?>" 
				name="<?php echo $this->get_field_name('file'); ?>" 
				type="text" value="<?php echo esc_attr($file); ?>"
			>
		</p>
		<?php
    }

    /**
     * Saving the widget settings. Here the data must be cleared and returned to save it to the database.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance new settings
     * @param array $old_instance previous settings
     *
     * @return array data to be saved
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (! empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['file'] = (! empty($new_instance['file'])) ? strip_tags($new_instance['file']) : '';
        $instance['file_name'] = (! empty($new_instance['file_name'])) ? strip_tags($new_instance['file_name']) : '';
        return $instance;
    }

    // widget script
    public function add_download_widget_scripts()
    {
        // filter so you can disable scripts
        if (! apply_filters('show_download_widget_script', true, $this->id_base)) {
            return;
        }

        $theme_url = get_stylesheet_directory_uri();

        wp_enqueue_script('download_widget_script', $theme_url .'/js/download_widget_script.js');
    }

    // widget styles
    public function add_download_widget_style()
    {
        // filter so that you can disable styles
        if (! apply_filters('show_download_widget_style', true, $this->id_base)) {
            return;
        }
        ?>
		<style type="text/css">
			.download_widget a{ display:inline; }
		</style>
		<?php
    }

}
