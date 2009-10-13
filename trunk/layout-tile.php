<?php
/**
 * @package WordPress
 * @subpackage construtor
 */
?>
<?php get_constructor_slideshow() ?>
<div id="wrapper" class="box shadow opacity">
    <div id="container" class="container-full" >
    <?php get_constructor_slideshow(true) ?>

    <?php if (have_posts()) : ?>
        <div id="posts">
        <?php while (have_posts()) : the_post(); ?>
            <div <?php post_class('tile opacity shadow box'); ?> id="post-<?php the_ID() ?>">
                <div class="title opacity">
                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'construtor'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
                </div>
                <div class="thumb">
                    <?php get_constructor_content('tile') ?>
                </div>
                <div class="links opacity">
                    <div class="date"><?php the_time(__('F jS, Y', 'construtor')) ?></div>
                    <div class="comments"><?php comments_popup_link('0', '1', '%', '', '' ); ?></div>
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