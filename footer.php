<?php
/**
 * @package WordPress
 * @subpackage Constructor
 */
?>
	<div id="footer">
	
		<?php 	/* Widgetized sidebar, if you have the plugin installed. */
			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer') ) : ?>
	    	
        	<div>
        	    <h3><?php _e('Categories', 'constructor')?></h3>
        		<ul>                       
        			<?php wp_list_categories('title_li='); ?>
        		</ul>
    		</div>
			<div>
	    	    <h3><?php _e('Archives', 'constructor') ?></h3>
    			<ul>
    			    <?php wp_get_archives('type=monthly&limit=12'); ?>
    			</ul>
        	</div>     
        	<div>
        	    <h3><?php _e('Blogroll', 'constructor')?></h3>
        	    <ul>
                    <?php wp_list_bookmarks('title_li=&categorize=0'); ?>
                </ul>
        	</div>
		<?php endif; ?>
    	<p class="clear copy">
        	<?php get_constructor_footer(); ?>
    	</p>
	</div>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>