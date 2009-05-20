<?php
/**
 * @package WordPress
 * @subpackage Constructor
 */
?>
	<ul>

		<?php 	/* Widgetized sidebar, if you have the plugin installed. */
				if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar') ) : ?>
                
        <?php if (!is_404()) : ?>
	    <li>
			<?php get_search_form(); ?>
		</li>
		<?php endif; ?>
		
		<?php wp_list_pages('title_li=<h2>'.__('Pages', 'constructor').'</h2>' ); ?>

		<?php wp_list_categories('show_count=1&title_li=<h3>'.__('Categories', 'constructor').'</h3>'); ?>
		
        <li><h3><?php _e('Tags', 'constructor')?></h3>
    	    <?php if(function_exists('wp_tag_cloud')) { wp_tag_cloud('smallest=8&largest=18&number=40'); } ?>
	    </li>

		<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>
			<li><h3><?php _e('Meta', 'constructor') ?></h3>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>
			</ul>
			</li>
		<?php } ?>

		<?php endif; ?>
	</ul>