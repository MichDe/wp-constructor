<?php
/**
 * @package WordPress
 * @subpackage Constructor
 */
wp_enqueue_script( 'comment-reply' );

get_header();
get_constructor_slideshow()
?>
<div id="wrapper" class="box shadow opacity">
    <div id="container">
    <?php get_constructor_slideshow(true) ?>

    <?php if (have_posts()) : ?>
        <div id="posts">
        <?php while (have_posts()) : the_post(); ?>
            <div <?php post_class(); ?> id="post-<?php the_ID() ?>">
                <div class="title opacity box">
                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'constructor'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
                </div>
                <div class="entry">
                    <?php the_content(__('Read the rest of this entry &raquo;', 'constructor')) ?>
				    <?php wp_link_pages(array('before' => '<p class="pages"><strong>'.__('Pages', 'constructor').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                </div>
                <div class="footer">
                    <div class="links right">
                    <?php if($post->post_parent) : $parent_link = get_permalink($post->post_parent); ?>
                    <a href="<?php echo $parent_link; ?>"><?php _e('Back to Parent Page', 'constructor');?></a> |
                    <?php endif; ?>
                    <?php the_time(__('F jS, Y', 'constructor')) ?> |
                    <?php the_tags(__('Tags', 'constructor') . ': ', ', ', '|'); ?>
                    <?php edit_post_link(__('Edit', 'constructor'), '', ' | '); ?>
                    <?php comments_popup_link(__('No Comments &#187;', 'constructor'), __('1 Comment &#187;', 'constructor'), __('% Comments &#187;', 'constructor'), '', __('Comments Closed', 'constructor') ); ?>                    </div>
                    <div class="line clear"></div>
                </div>
            </div>
        <?php endwhile; ?>
        </div>
        <div id='comments'>
           <?php comments_template(); ?>
        </div>
    <?php endif; ?>
    </div><!-- id='container' -->
</div><!-- id='wrapper' -->
<?php get_constructor_sidebar(); ?>
<?php get_footer(); ?>