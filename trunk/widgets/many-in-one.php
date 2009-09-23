<?php
/*
Plugin Name: Constructor Many in One
Plugin URI: http://code.google.com/p/wp-constructor/
Description: Categorize blog Pages and Categories
Version: 0.0.1
Author: Anton Shevchuk
Author URI: http://anton.shevchuk.name
*/
/**
 * @package WordPress
 * @subpackage Constructor
 */
class WP_Widget_ManyInOne extends WP_Widget
{
	/**
	 * Constructor of widget
	 * 
	 * @return 
	 */
	function WP_Widget_ManyInOne()
	{
		$widget_ops = array('classname' => 'widget_manyinone', 'description' => __( 'Global categories') );
		$this->WP_Widget('manyinone', __('Many In One', 'constructor'), $widget_ops);
	}

	/**
	 * Initialize widget
	 * 
	 * @param object $args
	 * @param object $instance
	 * @return 
	 */
	function widget( $args, $instance ) {
		extract($args);
	    $options = $this->get_settings();

	    if (!isset($options['categories'])) {
	        $options['categories'] = array(
				'water','computers','frames','photo','delivery','stationery'
			);
		}
		
		$category_name = get_constructor_category();
		$category_name = $category_name[0];
		
		if (in_array($category_name, $options['categories'])) {
			// get all sub-pages
			if ($page = get_page_by_path($category_name)) {;
				wp_list_pages('child_of='.$page->ID.'&title_li=<h3>'.__('Pages', 'constructor').'</h3>');
			}
			
			// get all subcategories
			if ($category = get_category_by_slug($category_name)) {
				wp_list_categories('child_of='.$category->cat_ID.'&title_li=<h3>'.__('Categories', 'constructor').'</h3>');
			}
		}
	}
}

// Register Widgets
if (function_exists('register_widget')) {
	register_widget('WP_Widget_ManyInOne');
}

