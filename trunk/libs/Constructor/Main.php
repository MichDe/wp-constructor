<?php
/**
 * @package WordPress
 * @subpackage Constructor
 */
require_once 'Abstract.php';

class Constructor_Main extends Constructor_Abstract
{
    /**
     * init all hooks
     */
    function init() 
    {
        add_action('wp_head', array($this, 'addThemeScripts'), 2);
        add_action('wp_head', array($this, 'addThemeStyles'),  3);
    }
    
    /**
     * add script by wp_head hook
     *
     * @return  void
     */
    function addThemeScripts() 
    {
        wp_enqueue_script('constructor-theme',     CONSTRUCTOR_DIRECTORY_URI.'/js/ready.js', array('jquery'));

    }
    
    /**
     * add styles by wp_head hook
     *
     * @global $blog_id
     * @return void
     */
    function addThemeStyles() 
    {
        global $blog_id;
        
        // need for wordpress MU and WP3
        if (!$blog_id) {
            $blog_id = 1;
        }
        
        // load style
        if (file_exists(CONSTRUCTOR_DIRECTORY .'/cache/style'.$blog_id.'.css')) {
            wp_enqueue_style('constructor-style',   CONSTRUCTOR_DIRECTORY_URI .'/cache/style'.$blog_id.'.css');
        } else {
            wp_enqueue_style('constructor-style', get_option('home').'/?theme-constructor=css');
        }
        
        // load constructor subtheme style
        if (file_exists(CONSTRUCTOR_DIRECTORY .'/themes/'.$this->getTheme().'/style.css')) {
            wp_enqueue_style( 'constructor-theme', CONSTRUCTOR_DIRECTORY_URI.'/themes/'.$this->getTheme().'/style.css');
        }
    }
    /**
     * get_constructor_slideshow
     *
     * @access  public
     * @param   boolean  $in In or Out of content container
     * @return  rettype  return
     */
    function getSlideshow($in = false)
    {
        if (!$this->_options['slideshow']['flag']) {
            return false;
        }
        if (is_page()   && !$this->_options['slideshow']['onpage'])   return false;
        if (is_single() && !$this->_options['slideshow']['onsingle']) return false;

        if ( $in && $this->_options['slideshow']['layout'] == 'over') return false;
        if (!$in && $this->_options['slideshow']['layout'] == 'in')   return false;

        echo '<div id="header-slideshow" style="height:'.$this->_options['slideshow']['height'].'px">';

        // switch statement for true
        switch (true) {
            case (isset($this->_options['slideshow']['id']) && $this->_options['slideshow']['id']!='' && function_exists('nggShowSlideshow')):
                if (!$in) {
                    echo nggShowSlideshow((int)$this->_options['slideshow']['id'],
                                          (int)($this->_options['layout']['width'] - 2),
                                          (int)$this->_options['slideshow']['height']);
                } else {
                    // switch statement for $this->_options['sidebar']
                    switch ($this->_options['sidebar']) {
                        case 'none':
                            echo nggShowSlideshow((int)$this->_options['slideshow']['id'],
                                                  (int)($this->_options['layout']['width'] - 4),
                                                  (int)$this->_options['slideshow']['height']);
                            break;
                        case 'two':
                        case 'two-right':
                        case 'two-left':
                            echo nggShowSlideshow((int)$this->_options['slideshow']['id'],
                                                  (int)($this->_options['layout']['width'] - $this->_options['layout']['sidebar'] - $this->_options['layout']['extra'] - 6),
                                                  (int)$this->_options['slideshow']['height']);
                            break;
                        default:
                            echo nggShowSlideshow((int)$this->_options['slideshow']['id'],
                                                  (int)($this->_options['layout']['width'] - $this->_options['layout']['sidebar'] - 4),
                                                  (int)$this->_options['slideshow']['height']);
                            break;
                    }
                }
                break;
        
            default:
                $this->getDefaultSlideshow();
                break;
        }
        
        
        echo '</div>';
    }
    
    /**
     * get_constructor_default_slideshow
     *
     * generate code for embedded slideshow
     *
     * @return  string
     */
    function getDefaultSlideshow() 
    {
        $options = $this->_options['slideshow']['advanced'];
        $options['slideshow'] = get_option('home').'/?theme-constructor=slideshow';
        $options['thumbPath'] = CONSTRUCTOR_DIRECTORY_URI."/libs/timthumb.php?src=";
        
        $options = json_encode($options);
        
        echo '<div class="wp-sl"></div>';
        wp_enqueue_script('constructor-slideshow', CONSTRUCTOR_DIRECTORY_URI.'/js/jquery.wp-slideshow.js', array('jquery'));
        wp_print_scripts('constructor-slideshow');
        echo "
        <script type='text/javascript'>
        /* <![CDATA[ */
            var wpSl = $options;
        /* ]]> */
        </script>";
    }
    
    /**
     * get_constructor_layout
     *
     * @param  string $where
     * @return string
     */
    function getLayout($where = 'index')
    {
        if (!isset($this->_options['layout'][$where])) {
            return include_once CONSTRUCTOR_DIRECTORY .'/layouts/default.php';
        }
        
        $layout = $this->_options['layout'][$where];
        
        if (is_file(CONSTRUCTOR_DIRECTORY .'/layouts/'.$layout.'.php')) {
            include_once CONSTRUCTOR_DIRECTORY .'/layouts/'.$layout.'.php';
        } else {
            include_once CONSTRUCTOR_DIRECTORY .'/layouts/default.php';
        }
        return true;
    }
    
    /**
     * get_constructor_menu
     *
     * @param  string $before
     * @param  string $after
     * @return string
     */
    function getMenu($before = '', $after = '')
    {
        if (!isset($this->_options['menu']['flag']) or !$this->_options['menu']['flag']) return false;

        echo '<div id="menu" class="opacity shadow">';
//        echo '<div>';
        echo '<ul class="menu opacity">';
        
        // before items
        if (!empty($before)) {
            echo '<li class="before-item">';
            if (is_array($before)) {
                echo join('</li><li class="before-item">', $before);
            } else {
                echo $before;
            }
            echo '</li>';
        }
        
        // navigation menu - WP3
        if (function_exists('wp_nav_menu')) {
            $nav_menu = wp_nav_menu( array( 'sort_column' => 'menu_order',
                                            'container'   => '', 'echo' => 0,
                                            'menu_class'  => 'menu opacity' ) );
                                            
            $nav_menu = strip_tags($nav_menu, '<li><a>');
            echo $nav_menu;
        }
        // maybe "else" or not? 
        {
            
            // show link to homepage
            if (isset($this->_options['menu']['home']) && $this->_options['menu']['home']) {
                echo '<li id="home"><a href="'.get_option('home').'/" title="'.get_bloginfo('name').'">'.__('Home', 'constructor').'</a></li>';
            }
            
            // show pages drop-down menu (or as is)
            if (isset($this->_options['menu']['pages']['depth']) && $this->_options['menu']['pages']['depth']) {
                $arg = array('title_li'=>'',
                             'exclude' => $this->_options['menu']['pages']['exclude'],
                             'depth'   => $this->_options['menu']['pages']['depth']
                             );
                wp_list_pages($arg);
            }
            
            // dynamic sidebar "header"
            if ( function_exists('dynamic_sidebar')) {
                dynamic_sidebar('header');
            }
            
            // show categories drop-down menu (or as is)
            if (isset($this->_options['menu']['categories']['depth']) && $this->_options['menu']['categories']['depth']) {  
                $arg = array('title_li'=>'',
                     'exclude' => $this->_options['menu']['categories']['exclude'],
                     'depth'   => $this->_options['menu']['categories']['depth']
                     );
    
                if (isset($this->_options['menu']['categories']['group']) && $this->_options['menu']['categories']['group']) {
                    $cat_title = !empty($this->_options['menu']['categories']['title'])?$this->_options['menu']['categories']['title']:__('Categories','constructor');
                    echo '<li><a href="#" title="'.$cat_title.'">'.$cat_title.'</a><ul>';
                    wp_list_categories($arg);
                    echo '</ul></li>';
                } else {
                    wp_list_categories($arg);
                }
            }
            
            // show search bar
            if (isset($this->_options['menu']['search']) && $this->_options['menu']['search'])  {
                echo '<li id="menusearchform">
                          <form role="search" method="get" action="' . get_option('home') . '/" >
                          <input class="s" type="text" value="' . esc_attr(apply_filters('the_search_query', get_search_query())) . '" name="s"/>
                          
                          </form>
                      </li>';
            }
            
            // show link to RSS
            if (isset($this->_options['menu']['rss']) && $this->_options['menu']['rss'])  {
                echo '<li id="rss"><a href="'.get_bloginfo('rss2_url').'"  title="'.__('RSS Feed', 'constructor').'">'. __('RSS Feed', 'constructor').'</a></li>';
            }
            
        }
        // after items
        if (!empty($after)) {            
            echo '<li class="after-item">';
            if (is_array($after)) {
                echo join('</li><li class="after-item">', $after);
            } else {
                echo $after;
            }
            echo '</li>';
        }
        echo '</ul>';
//        echo '</div>';
        echo '</div>';
    }
    
    /**
     * get constructor content
     * 
     * @param string $layout [optional]
     * @return 
     */
    function getContent($layout = 'default')
    {
         switch ($layout) {
             case 'list':
                $this->getPostImage(128, 128, 'thumb-list',
                                    $this->_options['content']['list']['thumb']['pos'],
                                    $this->_options['content']['list']['thumb']['noimage']);
                if (!$this->_options['content']['list']['filter']) {
                    the_content(__('Read the rest of this entry &raquo;', 'constructor'));
                } else {
                    $content = apply_filters('the_content', get_the_content(__('Read the rest of this entry &raquo;', 'constructor')));
                    $content = preg_replace('/(\<script.*\>.*\<\/script\>)/si', '', $content);
                    echo strip_tags($content, '<p><br><a><hr><i><em><b><strong><ul><ol><li>');
                }
                break;
            case 'tile';
                $this->getPostImage();
                break;
            default:
                the_content(__('Read the rest of this entry &raquo;', 'constructor'));
                break;
         }
    }
    
    /**
     * get constructor content widget
     * 
     * @param integer $i post counter
     * @return 
     */
    function getContentWidget($i)
    {
        // widget is not enabled
        if (!$this->_options['content']['widget']['flag']) return false;
        
        // wrong position
        if ($this->_options['content']['widget']['after'] != $i) return false;
        echo "<div id=\"content-widget\" class=\"box\">\n";
        dynamic_sidebar('content');
        echo "<div class=\"empty clear\"></div></div>";
    }

    /**
     * get_constructor_author
     *
     * @param  string $before
     * @param  string $after
     * @return string
     */
    function getAuthor($before = '', $after = '')
    {
        if ($this->_options['content']['author'])
            echo $before; the_author_posts_link(); echo $after;
    }
    
    /**
     * get_constructor_author
     *
     * @param  string $before
     * @param  string $after
     * @return string
     */
    function getAvatarSize($size = 32)
    {
        if (isset($this->_options['comments']['avatar']['size'])) {
            return (int)$this->_options['comments']['avatar']['size'];
        } else {
            return $size;
        }
    }
    
    /**
     * get_constructor_sidebar
     *
     * @access  public
     * @return  string
     */
    function getSidebar()
    {
        // switch statement for $this->_options['sidebar']
        switch ($this->_options['sidebar']) {
            case 'left':
            case 'right':
                get_sidebar();
                break;
            case 'left':
            case 'right':
                get_sidebar();
                break;
            case 'two':
            case 'two-right':
            case 'two-left':
                get_sidebar();
                get_sidebar('extra');
                break;
            case 'none':
            default:
                // nothing
                break;
        }
    }
    
    /**
     * get_constructor_navigation
     *
     * @access  public
     * @return  string
     */
    function getNavigation()
    {
        include_once CONSTRUCTOR_DIRECTORY . '/navigation.php';
    }
    
    /**
     * get_constructor_footer
     *
     * @access public
     * @return string
     */
    function getFooter()
    {
        if ($this->_options['footer']['text']) {
            echo stripslashes($this->_options['footer']['text']);
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
     * Generate HTML code for images
     * 
     * @param integer $width [optional]
     * @param integer $height [optional]
     * @param string $key [optional]
     * @param string $align [optional]
     * @param bool $noimage [optional]
     * @return string
     */
    function getPostImage($width = 312, $height = 292, $key = 'thumb', $align = 'none', $noimage = true)
    {
        global $post;
        
        if ($this->_options['content']['thumb']['auto']) {
            if ($img = $this->_getPostImage()) {
                echo '<img class="thumb align'.$align.'" src="' .CONSTRUCTOR_DIRECTORY_URI. "/libs/timthumb.php?src=".urlencode($img).'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1&amp;q=95" alt="' .get_the_title(). '"/>';
            } else {
                if ($img = $this->_getPostImage(false)) {
                    echo '<div class="crop thumb align'.$align.'" style="width:'.$width.'px;height:'.$height.'px;"><img src="'.$img.'" height="'.$height.'px" alt="' .get_the_title(). '"/></div>';
                } else {
                    if ($noimage) {
                        echo '<img class="thumb align'.$align.'" src="' .CONSTRUCTOR_DIRECTORY_URI. '/images/noimage.png" width="'.$width.'px" height="'.$height.'px" alt="' .__('No Image', 'constructor'). '"/>';
                    }  
                }
            }
        } else {
            $thumbs = get_post_custom_values($key);
            if (sizeof($thumbs) > 0) {
                $img = $thumbs[0];
                echo '<img class="thumb align'.$align.'" src="' .$img.'" width="'.$width.'px" height="'.$height.'px" alt="' .get_the_title(). '"/>';
            } else {
                if ($noimage) {
                    echo '<img class="thumb align'.$align.'" src="' .CONSTRUCTOR_DIRECTORY_URI. '/images/noimage.png" width="'.$width.'px" height="'.$height.'px" alt="' .__('No Image', 'constructor'). '"/>';
                }
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
    function _getPostImage($local = true)
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
    
    /**
     * get constructor category
     * 
     * @return string
     */
    function getCategory()
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
    function getCategoryClass()
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
}
?>
