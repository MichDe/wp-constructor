<?php
/**
 * @package WordPress
 * @subpackage Constructor
 */
// debug only current theme
// error_reporting(E_ALL);
if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name'=>'sidebar',
        'before_widget' => '<li>',
        'after_widget' => '</li>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name'=>'extra',
        'before_widget' => '<li>',
        'after_widget' => '</li>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name'=>'footer',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));    
}

$template_uri = get_template_directory_uri();

load_theme_textdomain('constructor', get_template_directory().'/lang');


if (!is_admin()) {    
    wp_enqueue_script( 'constructor-theme',     $template_uri.'/js/constructor.js', array('jquery'));
    
    wp_enqueue_style( 'constructor-style', $template_uri.'/css.php');
    
    $constructor = get_option('constructor');
    
    if (!$constructor) {
        $constructor = require 'themes/default/config.php';
        wp_enqueue_style( 'constructor-theme', $template_uri.'/themes/default/style.css');
    } else {
        if (file_exists(get_template_directory() .'/themes/'.$constructor['theme'].'/style.css'))
            wp_enqueue_style( 'constructor-theme', $template_uri.'/themes/'.$constructor['theme'].'/style.css');
    }

    if ($constructor['menu']['type'] > 2) {
        wp_enqueue_script( 'constructor-hover',     $template_uri.'/js/hoverIntent.js', array('jquery'));
        wp_enqueue_script( 'constructor-bgiframe',  $template_uri.'/js/jquery.bgiframe.min.js', array('jquery'));
        wp_enqueue_script( 'constructor-superfish', $template_uri.'/js/superfish.js', array('jquery'));
        
        wp_enqueue_style( 'constructor-superfish', $template_uri.'/css/superfish.css');
    }

    /**
     * get_constructor_slideshow
     *
     * @access  public
     * @return  rettype  return
     */
    function get_constructor_slideshow($in = false)
    {
        global $constructor, $template_uri;

        if (!isset($constructor['slideshow']['flag']) or $constructor['slideshow']['flag'] == '') {
            return false;
        }

        if (is_page()   && !$constructor['slideshow']['onpage'])   return false;
        if (is_single() && !$constructor['slideshow']['onsingle']) return false;

        if ( $in && $constructor['slideshow']['layout'] == 'over') return false;
        if (!$in && $constructor['slideshow']['layout'] == 'in')   return false;

        echo '<div id="header-slideshow" style="height:'.$constructor['slideshow']['height'].'px">';

        // switch statement for true
        switch (true) {
        	case (isset($constructor['slideshow']['id']) && $constructor['slideshow']['id']!='' && function_exists('nggShowSlideshow')):
        		if (!$in) {
                    echo nggShowSlideshow((int)$constructor['slideshow'], $constructor['layout']['width'] - 2 , $constructor['slideshow']['height']);
                } else {
                    // switch statement for $constructor['sidebar']
                    switch ($constructor['sidebar']) {
                        case 'none':
                            echo nggShowSlideshow((int)$constructor['slideshow'], ($constructor['layout']['width'] - 4) , $constructor['slideshow']['height']);
                            break;
                        case 'two':
                        case 'two-right':
                        case 'two-left':
                            echo nggShowSlideshow((int)$constructor['slideshow'], ($constructor['layout']['width'] - $constructor['layout']['sidebar'] - $constructor['layout']['extra'] - 6) , $constructor['slideshow']['height']);
                            break;
                        default:
                            echo nggShowSlideshow((int)$constructor['slideshow'], ($constructor['layout']['width'] - $constructor['layout']['sidebar'] - 4) , $constructor['slideshow']['height']);
                            break;
                    }
                }
        		break;
        
        	default:
        	    echo '<div class="wp-sl"></div>';
                wp_enqueue_script('constructor-slideshow', $template_uri.'/js/jquery.wp-slideshow.js', array('jquery'));
                wp_print_scripts('constructor-slideshow');
                echo <<<JS
                <script type='text/javascript'>
                /* <![CDATA[ */
                jQuery(document).ready(function(){
                    var sl = jQuery('.wp-sl').wpslideshow({
                        thumb:true,
                        thumbPath:'$template_uri/timthumb.php?src=',
                        limit:480,
                        effectTime:700,
                        timeout:5000,
                        play:true
                    });
                    
                    jQuery('.hentry').each(function(){
                        
                        var text  = jQuery(this).find('.entry').text();            
                        var title = jQuery(this).find('.title a').text();
                        var url   = jQuery(this).find('.title a').attr('href');
                        var img   = jQuery(this).find('.entry img:first').attr('src');
                        
                        if (img)
                            sl.addSlide(title,url,img,text);
                    });
                });
                /* ]]> */
                </script>
JS;
        		break;
        }
        
        
        echo '</div>';
    }

    /**
     * get_constructor_layout
     *
     * @param  string $where
     * @return string
     */
    function get_constructor_layout($where = 'default')
    {
        global $constructor;

        if (!isset($constructor['layout'][$where])) return include_once 'layout-default.php';

        switch ($constructor['layout'][$where]) {
            case 'tile':
                include_once 'layout-tile.php';
                break;
            case 'list':
                include_once 'layout-list.php';
                break;
            default:
                include_once 'layout-default.php';
                break;
        }
        return true;
    }

    /**
     * get_constructor_links
     *
     * @return string
     */
    function get_constructor_menu()
    {
        global $constructor;

        if (!isset($constructor['menu']['type']) or $constructor['menu']['type'] == 1) return false;
        if ($constructor['menu']['type'] == 2) {
            $params = 'depth=1&title_li=';
        } elseif ($constructor['menu']['type'] == 3) {
            $params = 'depth=2&title_li=';
        } elseif ($constructor['menu']['type'] == 4) {
            $params = 'depth=3&title_li=';
        }

        echo '<div id="header-links" class="opacity shadow"><ul class="opacity">';
        if ($constructor['menu']['home']) echo '<li id="home"><a href="'.get_option('home').'/" title="'.get_bloginfo('name').'">'.__('Home', 'constructor').'</a></li>';
        wp_list_pages($params);
        if ($constructor['menu']['rss'])  echo '<li id="rss"><a href="'.get_bloginfo('rss2_url').'"  title="'.__('RSS Feed', 'constructor').'">'. __('RSS Feed', 'constructor').'</a></li>';
        //if ($constructor['menu']['size']) echo '<li id="size"><a href="#" class="big">A</a><a href="#" class="normal">A</a><a href="#" class="small">A</a></li>';
        //if ($constructor['menu']['theme']) echo '<li id="theme"><a href="#">'.__('Theme', 'constructor').'</a></li>';
        echo '</ul><div class="clear"></div></div>';
    }

    /**
     * get_constructor_sidebar
     *
     * @access  public
     * @return  string
     */
    function get_constructor_sidebar()
    {
        global $constructor;
        if (isset($constructor['sidebar']) && $constructor['sidebar'] == 'none') return false;
        
        ?>
            <div id="sidebar" class="sidebar">
                <?php get_sidebar(); ?>
            </div>
        <?php
        
        if (isset($constructor['sidebar']) && 
            ($constructor['sidebar'] == 'two' or $constructor['sidebar'] == 'two-right' or $constructor['sidebar'] == 'two-left' )) {
        ?>
            <div id="extra" class="sidebar">
                <ul>
                    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('extra') ) : ?>
		            <?php wp_list_pages('title_li=<h2>'.__('Pages', 'constructor').'</h2>' ); ?>
                    <?php endif; ?>
                </ul>
            </div>
        <?php
        }
    }

    /**
     * get_constructor_author
     *
     * @param  string $before
     * @param  string $after
     * @return string
     */
    function get_constructor_author($before = '', $after = '')
    {
        global $constructor;
        if (isset($constructor['content']['author']) && $constructor['content']['author'])
            echo $before . the_author_posts_link() . $after;
    }

    /**
     * get_constructor_footer
     *
     * @access public
     * @return string
     */
    function get_constructor_footer()
    {
        global $constructor;
        if ($constructor['footer']['text']) {
            echo $constructor['footer']['text'];
        } else {
            echo '&copy; '.date('Y') .' '. sprintf(__('%1$s is proudly powered by %2$s', 'constructor'), get_bloginfo('name'), '<a href="http://wordpress.org/">WordPress</a>') .
                 ' | <a href="http://anton.shevchuk.name/">'. __('Constructor Theme', 'constructor') .'</a><br />'.
                 sprintf(__('%1$s and %2$s.', 'constructor'), '<a href="' . get_bloginfo('rss2_url') . '">' . __('Entries (RSS)', 'constructor') . '</a>', '<a href="' . get_bloginfo('comments_rss2_url') . '">' . __('Comments (RSS)', 'constructor') . '</a>');
        }

        if (defined('WP_DEBUG') && WP_DEBUG) {
            printf(__('%d queries. %s seconds.', 'constructor'), get_num_queries(), timer_stop(0, 3));
        }
    }

    /**
     * get_constructor_post_image
     *
     * @return string
     */
    function get_constructor_post_image($width = 312, $height = 292)
    {
        global $template_uri;
        if ($img = _get_post_image()) {
            echo '<img src="' .$template_uri. "/timthumb.php?src=".urlencode($img).'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1&amp;q=95" alt="' .get_the_title(). '"/>';
        } else {
            if ($img = _get_post_image(false)) {
                echo '<div class="crop" style="width:'.$width.'px;height:'.$height.'px;"><img src="'.$img.'" height="'.$height.'px" alt="' .get_the_title(). '"/></div>';
            } else {
                echo '<img src="' .$template_uri. '/images/noimage.png" width="'.$width.'px" height="'.$height.'px" alt="' .__('No Image', 'constructor'). '"/>';
            }
        }
    }

    /**
     * _get_post_image
     *
     * @see    wordpress loop
     * @param  bool $local search only local images
     * @return string
     */
    function _get_post_image($local = true)
    {
        global $post;

        if ($local) {
            $home = addcslashes(get_bloginfo('siteurl'), '.-/');
            $pattern = "/\<\s*img.*src\s*=\s*[\"\']?(?:$home|\/)([^\"\'\ >]*)[\"\']?.*\/\>/i";
        } else {
            $pattern = "/\<\s*img.*src\s*=\s*[\"\']?([^\"\'\ >]*)[\"\']?.*\/\>/i";
        }

        preg_match_all($pattern, $post->post_content, $images);

        if (!isset($images[1][0])) {
            return false;
        } else {
            return $images[1][0];
        }
    }

} else {
    require_once 'admin/settings.php';
}