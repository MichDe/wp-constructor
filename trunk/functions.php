<?php
/**
 * @package WordPress
 * @subpackage Constructor
 * 
 * Don't work preview on admin page?
 * Read issue 11006 for more details
 * 
 * @see      http://core.trac.wordpress.org/ticket/11006
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
      
    register_sidebar(array(
        'name'=>'header',
        'before_widget' => '<li>',
        'after_widget' => '</li>',
        'before_title' => '<span>',
        'after_title' => '</span>',
    )); 
}

define('CONSTRUCTOR_DIRECTORY',     get_template_directory());
define('CONSTRUCTOR_DIRECTORY_URI', get_template_directory_uri());

load_theme_textdomain('constructor', CONSTRUCTOR_DIRECTORY.'/lang');

if ( version_compare( $wp_version, '2.8', '<=' ) ) {
    require_once 'admin/compatibility/body_class.php';
}

$constructor       = get_option('constructor');
$constructor_admin = get_option('constructor_admin');

if (!$constructor) {
    $constructor = require 'themes/default/config.php';
    $constructor_admin = array('theme'  => 'default');
}

// back compatibility  
//if (isset($constructor['theme'])) {
//    $theme = $constructor['theme'];
//} elseif (isset($constructor_admin['theme'])) {
//    $theme = $constructor_admin['theme'];
//} else {
//    $theme = 'default';
//}
//
//if (!$constructor_admin) {
//    $constructor_admin = array('theme'  => $theme);
//}
//    


//require_once 'widgets/many-in-one.php';

if (!is_admin()) {    
    
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
    
    /**
     * Preview filter
     *
     * @param string $content
     */
    function constructor_preview($content) {
        $link = add_query_arg(array('preview' => 1, 'template' => get_template()), '?theme-constructor=css');
        
        $content = str_replace('?theme-constructor=css', $link, $content);
        return $content;
    }
    
    add_filter('preview_theme_ob_filter', 'constructor_preview');
    
    
    if (file_exists(get_template_directory() .'/themes/'.$theme.'/style.css'))
        wp_enqueue_style( 'constructor-theme', CONSTRUCTOR_DIRECTORY_URI.'/themes/'.$theme.'/style.css');

        
    require_once CONSTRUCTOR_DIRECTORY .'/libs/Constructor/Main.php';
    
    $main = new Constructor_Main($constructor, $constructor_admin);
    $main -> init();
    
    /* Alias section for fast theme development */
    
    /**
     * get_constructor_slideshow
     *
     * @access  public
     * @param   boolean  $in In or Out of content container
     * @return  rettype  return
     */
    function get_constructor_slideshow($in = false)
    {
        global $main;
        $main->getSlideshow($in);
    }
    
    /**
     * get_constructor_layout
     *
     * @param  string $where
     * @return string
     */
    function get_constructor_layout($where = 'index')
    {
        global $main;
        $main->getLayout($where);
    }
    
    /**
     * get_constructor_links
     *
     * @return string
     */
    function get_constructor_menu()
    {
        global $main;
        $main->getMenu();
    }
    
    /**
     * get constructor content
     * 
     * @param string $layout [optional]
     * @return 
     */
    function get_constructor_content($layout = 'default')
    {
        global $main;
        $main->getContent($layout);
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
        global $main;
        echo $main->getAuthor($before, $after);
    }
    
    /**
     * get_constructor_sidebar
     *
     * @access  public
     * @return  string
     */
    function get_constructor_sidebar()
    {
        global $main;
        $main->getSidebar();
    }
    
    /**
     * get_constructor_footer
     *
     * @access public
     * @return string
     */
    function get_constructor_footer()
    {
        global $main;
        $main->getFooter();
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
    function get_constructor_post_image($width = 312, $height = 292, $key = 'thumb', $align = 'none', $noimage = true)
    {
        global $main;
        $main->getPostImage($width, $height, $key, $align, $noimage);
    }
    
    /**
     * get constructor category classname
     * 
     * @return string
     */
    function get_constructor_category_class()
    {
        global $main;
        return $main->getCategoryClass();
    }

    /**
     * get constructor category
     * 
     * @return string
     */
    function get_constructor_category()
    {
        global $main;
        return $main->getCategory();
    }
    
} else {
    // init modules for admin pages
    $constructor_modules = array(
        __('Themes',  'constructor') => 'themes',
        __('Layout',  'constructor') => 'layout',
        __('Sidebar', 'constructor') => 'sidebar',
        __('Header',  'constructor') => 'header',
        __('Content', 'constructor') => 'content',
        __('Footer',  'constructor') => 'footer',
        __('Colors',  'constructor') => 'colors',
        __('Fonts',   'constructor') => 'fonts',
        __('CSS',     'constructor') => 'css',
        __('Images',  'constructor') => 'images',
        __('Slideshow', 'constructor') => 'slideshow',
        __('Save',    'constructor') => 'save',
		__('Help',    'constructor') => 'help'
    );
    
    require_once CONSTRUCTOR_DIRECTORY .'/libs/Constructor/Admin.php';
    
    $admin = new Constructor_Admin($constructor, $constructor_admin);
    $admin -> init($constructor_modules);
}