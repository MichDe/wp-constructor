<?php
/**
 * @package WordPress
 * @subpackage Constructor
 * 
 * @author   Anton Shevchuk <AntonShevchuk@gmail.com>
 * @link     http://anton.shevchuk.name
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

if ( version_compare( $wp_version, '2.8', '<=' ) ) {
    require_once 'admin/compatibility/body_class.php';
}

//require_once 'widgets/many-in-one.php';

if (!is_admin()) {	
    wp_enqueue_script( 'constructor-theme',     $template_uri.'/js/constructor.js', array('jquery'));

    /**
     * Parse request
     *
     * @param unknown_type $wp
     */
    function constructor_parse_request($wp) {
        // only process requests with "my-plugin=ajax-handler"
        if (array_key_exists('theme-constructor', $wp->query_vars)){
            switch ($wp->query_vars['theme-constructor']) {
            	case 'css':
					require_once 'css.php';
					break;
            	case 'slideshow':
					require_once 'slideshow.php';
					break;
			}
			// die after return data
            die();
        } elseif (array_key_exists('preview', $wp->query_vars)) {
        	global $postfix;
			
        }
    }
    add_action('wp', 'constructor_parse_request');
    
    /**
     * register query vars
     *
     * @param array $vars
     * @return array
     */
    function constructor_query_vars($vars) {
        $vars[] = 'theme-constructor';
        return $vars;
    }
    add_filter('query_vars', 'constructor_query_vars');
	
    wp_enqueue_style( 'constructor-custom-style', get_option('home').'/?theme-constructor=css');
    
    $constructor = get_option('constructor');
    
    if (!$constructor) {
        $constructor = require 'themes/default/config.php';
        wp_enqueue_style( 'constructor-theme', $template_uri.'/themes/default/style.css');
    } else {
        if (file_exists(get_template_directory() .'/themes/'.$constructor['theme'].'/style.css'))
            wp_enqueue_style( 'constructor-theme', $template_uri.'/themes/'.$constructor['theme'].'/style.css');
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
                    echo nggShowSlideshow((int)$constructor['slideshow'],
										  $constructor['layout']['width'] - 2 ,
										  $constructor['slideshow']['height']);
                } else {
                    // switch statement for $constructor['sidebar']
                    switch ($constructor['sidebar']) {
                        case 'none':
                            echo nggShowSlideshow((int)$constructor['slideshow'],
												  $constructor['layout']['width'] - 4,
												  $constructor['slideshow']['height']);
                            break;
                        case 'two':
                        case 'two-right':
                        case 'two-left':
                            echo nggShowSlideshow((int)$constructor['slideshow'],
												  $constructor['layout']['width'] - $constructor['layout']['sidebar'] - $constructor['layout']['extra'] - 6,
												  $constructor['slideshow']['height']);
                            break;
                        default:
                            echo nggShowSlideshow((int)$constructor['slideshow'],
												  $constructor['layout']['width'] - $constructor['layout']['sidebar'] - 4,
												  $constructor['slideshow']['height']);
                            break;
                    }
                }
        		break;
        
        	default:
				$slideshow = get_option('home').'/?theme-constructor=slideshow';
        	    echo '<div class="wp-sl"></div>';
                wp_enqueue_script('constructor-slideshow', $template_uri.'/js/jquery.wp-slideshow.js', array('jquery'));
                wp_print_scripts('constructor-slideshow');
                echo <<<JS
                <script type='text/javascript'>
                /* <![CDATA[ */
					var wpSl = {thumbPath:'$template_uri/timthumb.php?src=',
								slideshow:'$slideshow'};
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

        if (!isset($constructor['menu']['flag']) or !$constructor['menu']['flag']) return false;
		

        echo '<div id="header-links" class="opacity shadow"><ul class="opacity">';
        if (isset($constructor['menu']['home']) && $constructor['menu']['home']) {
        	echo '<li id="home"><a href="'.get_option('home').'/" title="'.get_bloginfo('name').'">'.__('Home', 'constructor').'</a></li>';
		}
		
		if (isset($constructor['menu']['pages']['depth']) && $constructor['menu']['pages']['depth']) {
			wp_list_pages('title_li=&depth='.$constructor['menu']['pages']['depth']);
		}
        
		if (isset($constructor['menu']['categories']['depth']) && $constructor['menu']['categories']['depth']) {			
			if (isset($constructor['menu']['categories']['group']) && $constructor['menu']['categories']['group']) {
				echo '<li><a href="#" title="'.__('Categories','constructor').'">'.__('Categories','constructor').'</a><ul>';
				wp_list_categories('title_li=&depth='.$constructor['menu']['categories']['depth']);
				echo '</ul></li>';
			} else {
				wp_list_categories('title_li=&depth='.$constructor['menu']['categories']['depth']);
			}
		}
		
		if (isset($constructor['menu']['search']) && $constructor['menu']['search'])  {
			echo '<li id="menusearchform">
					  <form role="search" method="get" action="' . get_option('home') . '/" >
					  <input class="s" type="text" value="' . esc_attr(apply_filters('the_search_query', get_search_query())) . '" name="s"/>
					  
					  </form>
				  </li>';
		}
		
        if (isset($constructor['menu']['rss']) && $constructor['menu']['rss'])  {
			echo '<li id="rss"><a href="'.get_bloginfo('rss2_url').'"  title="'.__('RSS Feed', 'constructor').'">'. __('RSS Feed', 'constructor').'</a></li>';
		}
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
    function get_constructor_post_image($width = 312, $height = 292, $key = 'thumb')
    {
    	global $post,$template_uri;
		$thumbs = get_post_custom_values($key);
		if (sizeof($thumbs) == 0) {
			echo '<img src="' .$template_uri. '/images/noimage.png" width="'.$width.'px" height="'.$height.'px" alt="' .__('No Image', 'constructor'). '"/>';
		} else {
			$img = $thumbs[0];
			echo '<img src="' .$img.'" width="'.$width.'px" height="'.$height.'px" alt="' .get_the_title(). '"/>';
		}
    }
	
	/**
	 * get constructor category
	 * 
	 * @return string
	 */
	function get_constructor_category()
	{
		global $wp_query;

		$category = array();
        
        if (is_single()) {
			$cat = get_the_category($wp_query->post->ID);
			if ($cat) {
                $category = split('/', rtrim(get_category_parents($cat[0], false, '/', true), '/'));
            }
		} elseif (is_page()) {
			$category = get_post_custom_values('category_name', $wp_query->post->ID);
		} elseif (is_category()) {
			$cat = get_category(get_query_var('cat'));
			if ($cat) {
                $category = split('/', rtrim(get_category_parents($cat, false, '/', true), '/'));
            }
		}
		return $category;
	}
	
	/**
	 * get constructor category classname
	 * 
	 * @return string
	 */
	function get_constructor_category_class()
	{
		global $category_class;
		
		if ($category_class) {
			// nothing
		} elseif ($category = get_constructor_category()) {
			if (sizeof($category) > 0)
				$category_class =  'category-' .join(' category-', $category);
		} else {
			$category_class = '';
		}
		
		return $category_class;
	}

} else {
    require_once 'admin/settings.php';
}