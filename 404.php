<?php
/**
 * @package WordPress
 * @subpackage Constructor
 */
?>
<?php get_header(); ?>
<div id="wrapper" class="box shadow opacity">
    <div id="container" >
    <?php get_constructor_slideshow() ?>

	<div id="posts">
	    <div <?php post_class(); ?>>
	        <div class="title opacity box">
        		<h2 class="center"><a href="#" title="<?php _e('Error 404 - Not Found', 'constructor'); ?>"><?php _e('Error 404 - Not Found', 'constructor'); ?></a></h2>
		    </div>
		    <div class="entry">		    
        		<p class="center"><?php _e('Sorry, but you are looking for something that isn&#8217;t here.', 'constructor'); ?></p>
		        <p><?php get_search_form() ?></p>
		    </div>
            <div class="footer">
                <div class="line clear"></div>
            </div>
	    </div>
	</div>
		
    <div class="navigation">
        <div class="alignleft"><?php previous_posts_link(__('Newer Entries &raquo;', 'construtor')) ?></div>
        <div class="alignright"><?php next_posts_link(__('&laquo; Older Entries', 'construtor')) ?></div>
        <div class="clear">&nbsp;</div>
    </div>

    </div><!-- id='container' -->
</div><!-- id='wrapper' -->
<?php get_constructor_sidebar(); ?>
<?php get_footer(); ?>