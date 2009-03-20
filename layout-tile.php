<?php
/**
 * @package WordPress
 * @subpackage construtor
 */
?>
<div id="wrapper" class="box shadow opacity">
    <div id="container" class="container-full" >
    <?php get_constructor_slideshow() ?>

    <?php if (have_posts()) : ?>
        <div id="posts">
        <?php while (have_posts()) : the_post(); ?>
            <div <?php post_class('tile opacity shadow box'); ?> id="post-<?php the_ID() ?>">
                <div class="title opacity">
                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'construtor'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
                </div>
                <div class="thumb">
                    <?php get_constructor_tile_image() ?>
                </div>
                <div class="links opacity">
                    <div class="date"><?php the_time(__('F jS, Y', 'construtor')) ?></div>
                    <div class="comments"><?php comments_popup_link('0', '1', '%', '', '' ); ?></div>
                </div>
            </div>
        <?php endwhile; ?>
        </div>
        <div class="navigation clear">
            <div class="alignleft"><?php previous_posts_link(__('Newer Entries &raquo;', 'construtor')) ?></div>
            <div class="alignright"><?php next_posts_link(__('&laquo; Older Entries', 'construtor')) ?></div>
            <div class="clear">&nbsp;</div>
        </div>
	<?php else : ?>
        <div id="posts">
            <div class="post">
            <div class="post-title opacity box">
        		<h2 class="center"><?php _e('Error 404 - Not Found', 'construtor'); ?></h2>
		    </div>
		    <div class="post-entry">
        		<p class="center"><?php _e('Sorry, but you are looking for something that isn&#8217;t here.', 'construtor'); ?></p>
		    </div>
		    </div>
        </div>
    <?php endif; ?>

    </div><!-- id='container' -->
</div><!-- id='wrapper' -->