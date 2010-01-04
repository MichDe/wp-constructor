<?php
/**
 * @package WordPress
 * @subpackage Constructor
 */
?>
    <div id="wrapfooter" class="wrapper">
    	<div id="footer">	
    		<?php if ( function_exists('dynamic_sidebar')) { dynamic_sidebar('footer'); } ?>
        	<p class="clear copy">
            	<?php get_constructor_footer(); ?>
        	</p>
    	</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>