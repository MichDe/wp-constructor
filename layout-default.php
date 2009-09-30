<?php
/**
 * @package WordPress
 * @subpackage construtor
 */
?>
<?php get_constructor_slideshow() ?>
<div id="wrapper" class="box shadow opacity">    
    <div id="container" >
    <?php get_constructor_slideshow(true) ?>

    <?php if (have_posts()) : ?>
        <div id="posts">
        <?php while (have_posts()) : the_post(); ?>
            <div <?php post_class(); ?> id="post-<?php the_ID() ?>">
                <div class="title opacity box">
                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'construtor'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
                </div>
                <div class="entry">
                    <?php the_content(__('Read the rest of this entry &raquo;', 'construtor')) ?>
                </div>
                <div class="footer">
                    <div class="links right">
                    <?php the_time(__('F jS, Y', 'construtor')) ?> |
                    <?php get_constructor_author('', ' |') ?>
                    <?php the_tags(__('Tags', 'construtor') . ': ', ', ', '|'); ?>
                    <?php edit_post_link(__('Edit', 'construtor'), '', ' | '); ?>
                    <?php comments_popup_link(__('No Comments &#187;', 'construtor'), __('1 Comment &#187;', 'construtor'), __('% Comments &#187;', 'construtor'), '', __('Comments Closed', 'construtor') ); ?>                    </div>
                    <div class="line clear"></div>
                </div>
            </div>
        <?php endwhile; ?>
        </div>
        <div class="navigation clear">
            <div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries', 'construtor')) ?></div>
            <div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;', 'construtor')) ?></div>
            <div class="clear">&nbsp;</div>
        </div>
    <?php endif; ?>

    </div><!-- id='container' -->
</div><!-- id='wrapper' -->
<?php get_constructor_sidebar(); ?>