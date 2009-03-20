<?php
/*
Template Name: Sitemap
*/

/**
 * @package WordPress
 * @subpackage Constructor
 */
?>
<?php get_header(); ?>
<div id="wrapper" class="box shadow opacity">
    <div id="container" class="container-sitemap">
    <?php get_constructor_slideshow() ?>

        <div id="posts">
        <?php while (have_posts()) : the_post(); ?>
            <div <?php post_class(); ?> id="post-<?php the_ID() ?>">
                <div class="title opacity box">
                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'constructor'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
                </div>
                <div class="entry">
                
                    <?php the_content(__('Read the rest of this entry &raquo;', 'constructor')) ?>
                    <h3><?php _e('Pages', 'constructor') ?></h3>
                    <ul>
                        <?php wp_list_pages('title_li=' ); ?>
                    </ul>
                    
                    <h3><?php _e('Categories', 'constructor') ?></h3>
                    <ul>
        			    <?php wp_list_categories('title_li=&depth=1&show_count=1'); ?>
                    </ul>
                    
                    <h3><?php _e('Archives', 'constructor') ?></h3>
                    <ul>
                        <?php wp_get_archives('type=monthly&show_post_count=1'); ?>
                    </ul>

                    <?php foreach (get_categories() as $cat) :
                          query_posts('cat='.$cat->cat_ID);
                    ?>
                    <h3><?php echo $cat->cat_name; ?></h3>
                    <ul>
                            <?php while (have_posts()) : the_post(); ?>
                            <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
                            <?php endwhile;  ?>
                    </ul>
					<?php endforeach; ?>
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

                    