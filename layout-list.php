<?php
/**
 * @package WordPress
 * @subpackage construtor
 */
?>
<div id="wrapper" class="box shadow opacity">
    <div id="container" >
    <?php get_constructor_slideshow() ?>

    <?php if (have_posts()) : ?>
        <div id="posts">
        <?php while (have_posts()) : the_post(); ?>
            <div <?php post_class('box list opacity shadow'); ?> id="post-<?php the_ID() ?>">
                <div class="title">
                    <h2>
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'construtor'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a>
                        <div class="date"><?php the_time(__('F jS, Y', 'construtor')) ?></div>
                    </h2>
                </div>                
                <div class="entry clear">
                    <div class="thumb alignleft"><?php get_constructor_post_image(128, 128) ?></div>
                    <?php
                    $content = apply_filters('the_content', get_the_content(__('Read the rest of this entry &raquo;', 'construtor')));
                    $content = preg_replace('/(\<script.*\>.*\<\/script\>)/si', '', $content);
                    echo strip_tags($content, '<p><br><a><hr>');
                    ?>
                </div>
                <div class="footer">
                    
                </div>
            </div>
        <?php endwhile; ?>
        </div>
        <div class="navigation">
            <div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries', 'construtor')) ?></div>
            <div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;', 'construtor')) ?></div>
            <div class="clear">&nbsp;</div>
        </div>
    <?php endif; ?>

    </div><!-- id='container' -->
</div><!-- id='wrapper' -->
<?php get_constructor_sidebar(); ?>