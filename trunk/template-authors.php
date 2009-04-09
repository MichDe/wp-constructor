<?php
/*
Template Name: Authors
*/

/**
 * @package WordPress
 * @subpackage Constructor
 */

get_header(); ?>
<div id="wrapper" class="box shadow opacity">
    <div id="container" class="container-authors">
        <div id="posts">
        <?php while (have_posts()) : the_post(); ?>
            <div <?php post_class(); ?> id="post-<?php the_ID() ?>">
                <div class="title opacity box">
                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'constructor'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
                </div>
                <div class="entry">

                    <?php the_content(__('Read the rest of this entry &raquo;', 'constructor')) ?>
                    <ul>
                        <?php wp_list_authors('optioncount=1&exclude_admin=0&show_fullname=1') ?>
                    </ul>
                </div>
                <div class="footer">
                    <div class="links right">
                    <?php edit_post_link(__('Edit', 'constructor'), '', ' | '); ?>
                    </div>
                    <div class="line clear"></div>
                </div>
            </div>
        <?php endwhile; ?>
        </div>

    </div><!-- id='container' -->
</div><!-- id='wrapper' -->
<?php get_constructor_sidebar(); ?>
<?php get_footer(); ?>