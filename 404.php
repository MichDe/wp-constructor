<?php
/**
 * @package WordPress
 * @subpackage Constructor
 */
?>
<?php get_header(); ?>
<div id="wrapper" class="box shadow opacity">
    <div id="container" >
    <?php get_constructor_header() ?>

	<div id="posts">
	    <div class="post">
	        <div class="title opacity box">
        		<h2 class="center"><?php _e('Error 404 - Not Found', 'constructor'); ?></h2>
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
        <div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries', 'constructor')) ?></div>
        <div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;', 'constructor')) ?></div>
        <div class="clear">&nbsp;</div>
    </div>

    </div><!-- id='container' -->
</div><!-- id='wrapper' -->
<?php get_constructor_sidebar(); ?>
<?php get_footer(); ?>