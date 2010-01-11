<?php
/**
 * @package WordPress
 * @subpackage Constructor
 */
?>
            <div class="empty clear">&nbsp;</div>
        </div><!-- id='content' -->
    </div><!-- id='wrapcontent' -->
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