<?php
/**
 * @package WordPress
 * @subpackage constructor
 */
?>
<?php get_constructor_slideshow() ?>
<div id="wrapcontent" class="wrapper">
    <div id="content" class="box shadow opacity">    
        <div id="container" >
        <?php get_constructor_slideshow(true) ?>
    
        <?php if (have_posts()) : $i = 0; ?>
            <div id="posts">
            <?php while (have_posts()) : the_post();  $i++; ?>
                <div <?php post_class('box list opacity shadow'); ?> id="post-<?php the_ID() ?>">
                    <div class="title">
                        <h2>
                            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'constructor'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a>
                        </h2>
    					<div class="date color2"><?php the_date() ?></div>
                    </div>                
                    <div class="entry clear">
    					<?php get_constructor_content('list') ?>
                    </div>
                    <div class="footer">
                        
                    </div>
                </div>
            <?php get_constructor_content_widget($i) ?>
            <?php endwhile; ?>
            </div>
            <div class="navigation clear">
                <div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries', 'constructor')) ?></div>
                <div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;', 'constructor')) ?></div>
                <div class="clear">&nbsp;</div>
            </div>
        <?php endif; ?>
        </div><!-- id='container' -->
        <?php get_constructor_sidebar(); ?>
        <div class="empty clear">&nbsp;</div>
    </div><!-- id='content' -->
</div><!-- id='wrapcontent' -->