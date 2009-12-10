<?php
/**
 * @package WordPress
 * @subpackage Constructor
 */

/**
 * @see functions.php
 * @var $template_uri
 */


add_action('admin_menu', 'constructor_theme_page_add');

wp_enqueue_script('thickbox');

if (version_compare($wp_version, '2.8', '<')) {
    wp_deregister_script('jquery');
    wp_deregister_script('jquery-ui');
    
    wp_enqueue_script('jquery',                  $template_uri .'/admin/js/jquery.js');
}

wp_enqueue_script('jquery-ui',               $template_uri .'/admin/js/jquery-ui.js', 'jquery');
    
wp_enqueue_script('constructor-colorpicker', $template_uri .'/admin/js/colorpicker.js', 'jquery');
wp_enqueue_script('constructor-settings',    $template_uri .'/admin/js/settings.js', 'jquery');
wp_enqueue_script('constructor-messages',    $template_uri .'/admin/js/messages.js', 'jquery');

wp_enqueue_style('thickbox');
wp_enqueue_style('constructor-admin',       $template_uri .'/admin/css/admin.css');
wp_enqueue_style('constructor-colorpicker', $template_uri .'/admin/css/colorpicker.css');
wp_enqueue_style('jquery.ui',               $template_uri .'/admin/css/jquery-ui.css');

if (version_compare(phpversion(), '5.0.0', '<')) {
    require_once 'compatibility.php';
}

require_once 'ajax.php';

/**
 * Add configuration page
 */
function constructor_theme_page_add()
{
    session_start();
    $directory = get_template_directory();
    
    if ( isset( $_GET['page'] ) && $_GET['page'] == "functions.php" ) {
        if ( isset( $_REQUEST['action'] ) && 'save' == $_REQUEST['action'] ) {
            check_admin_referer('constructor');
            if (isset($_REQUEST['constructor'])) {
    
                $files = $_FILES['constructor'];
                $data  = $_REQUEST['constructor'];
    			
                if (isset ($data['theme-reload']) && $data['theme-reload'] != 0) {
                    // loading theme and forgot all changes
                    $theme = $data['theme'];
                    $data  = require $directory.'/themes/'.$theme.'/config.php';
                    $data['theme'] = $theme;
                } else {
                	global $blog_id;
    				// is MU WP
    				if ($blog_id && $blog_id != 1) {
    					$upload = $directory.'/images/'.$blog_id.'/';
    					$path   = 'images/'.$blog_id.'/';
    					
    					if (!is_dir($upload)) {
    						if (!@mkdir($upload)) {
    							$errors[] = sprintf(__('System can\'t create "%s" directory','constructor'), $upload);
    						}
    					}
    				} else {
    					$upload = $directory.'/images/';
    					$path   = 'images/';
    				}
    
                    if ($files && is_writable($upload)) {
    
                        $errors = array();
                        foreach ($files['name']['images'] as $name => $image) {
                            if (isset($image['src']) && is_uploaded_file($files['tmp_name']['images'][$name]['src'])) {
    
                                if (!preg_match('/\.(jpe?g|png|gif)$/i', $image['src'])) {
                                    $errors[] = sprintf(__('File "%s" is not a image (jpeg, png, gif)','constructor'), $image['src']);
                                    continue;
                                }
    
                                if (move_uploaded_file($files['tmp_name']['images'][$name]['src'], $upload . $image['src'])) {
                                    $data['images'][$name]['src'] = $path.$image['src'];
                                }
                            }
                        }
                        $_SESSION['constructor-errors'] = $errors;
                    }
                    /**
                     * Shadow
                     */
                    if (isset($data['shadow'])) $data['shadow'] = true;
    
                    /**
                     * CSS changes
                     */
                    if (isset($data['css']) && is_writable($directory.'/themes/'.$data['theme'].'/style.css')) {
                        file_put_contents($directory.'/themes/'.$data['theme'].'/style.css', $data['css']);
                        unset($data['css']);
                    }
    
                    /**
                     * Slideshow
                     */
                    $data['slideshow']['id']        = (int)$data['slideshow']['id'];
                    $data['slideshow']['showposts'] = (int)$data['slideshow']['showposts'];
    
                    /**
                     * Flags changes
                     * @todo Need check follows code
                     */
    				/*
    			    $arr_false = array_keys(array_diff_key($constructor, $data));
    			    $arr_false = array_fill_keys($arr_false, false);
    			    $data      = array_merge($constructor, $arr_false);
    				*/
                    $data['menu']['flag']   = isset($data['menu']['flag'])?true:false;
                    $data['menu']['home']   = isset($data['menu']['home'])?true:false;
                    $data['menu']['rss']    = isset($data['menu']['rss'])?true:false;
                    $data['menu']['search'] = isset($data['menu']['search'])?true:false;
    				
    				$data['content']['author'] = isset($data['content']['author'])?true:false;
                    $data['content']['thumb']['auto'] = isset($data['content']['thumb']['auto'])?true:false;
    				
                    $data['content']['list']['filter'] = isset($data['content']['list']['filter'])?true:false;
    				$data['content']['list']['thumb']['noimage'] = isset($data['content']['list']['thumb']['noimage'])?true:false;
    				
                    $data['shadow'] = isset($data['shadow'])?true:false;
    				
    				$data['images']['body']['fixed'] = isset($data['images']['body']['fixed'])?true:false;
                    $data['images']['wrap']['fixed'] = isset($data['images']['wrap']['fixed'])?true:false;
    				
                    $data['slideshow']['flag']     = isset($data['slideshow']['flag'])?true:false;
                    $data['slideshow']['onpage']   = isset($data['slideshow']['onpage'])?true:false;
    				$data['slideshow']['onsingle'] = isset($data['slideshow']['onsingle'])?true:false;
    
                    /**
                     * Merge Configuration
                     */
                    $constructor = get_option('constructor') or $constructor = array();
                    $data = array_merge($constructor, $data);
                }
                
                // show text message
                update_option('constructor', $data);
            } 
            wp_redirect("themes.php?page=functions.php&saved=true");
            die;
        } elseif (isset( $_REQUEST['action'] ) && 'export' == $_REQUEST['action']) {
            $constructor = get_option('constructor');
            if (!$constructor) {
                $constructor = require $directory.'/themes/default/config.php';
            }
            unset($constructor['theme']); // forgot theme name
    
            header('Content-Type: text/plain');
            header('Content-Disposition: attachment; filename="config.php"');
    
            echo "<?php \n";
            echo "/* Export on ".date('Y-m-d H:i')." */ \n";
            echo "return ";
            var_export($constructor);
            echo "\n ?>";
            die;
        }
    }
    add_theme_page(__('Customize Theme', 'constructor'), __('Customize', 'constructor'), 'edit_themes', 'functions.php', 'constructor_theme_page');
}


/**
 * Configuration page
 *
 */
function constructor_theme_page()
{
    global $template_uri;
    $constructor   = get_option('constructor');
    $admin         = get_option('constructor_admin');
    $directory     = get_template_directory();
    
    $donate = '<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_donations">
            <input type="hidden" name="business" value="mxleod@yahoo.com">
            <input type="hidden" name="lc" value="US">
            <input type="hidden" name="item_name" value="Wordpress Constructor Theme">
            <input type="hidden" name="currency_code" value="USD">
            <input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest">
            <input type="submit" name="Submit" class="button-primary" value="Donate" />
            <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </form>';

    if (!$constructor) {
        $constructor = require $directory.'/themes/default/config.php';
        $constructor['theme'] = 'default';
    }
    
    if (!$admin) {
        $admin['donate'] = true;
    }

    // modules list - change list manualy only
    $modules = array(
                'themes',
                'layout',
                'sidebar',
                'header',
                'content',
                'footer',
                'colors',
                'fonts',
                'css',
                'images',
                'slideshow',
                'save',
                'export',
				'help'
                );
    ?>

    <div class='wrap'>
       <h2><?php _e('Customize Theme', 'constructor'); ?></h2>
       <?php
       if ( $admin['donate'] ) {
           echo '<div id="message" class="updated fade donate"><div class="donate-button">'.$donate.'</div><p>'.__('If you like this theme and find it useful, help keep this theme free and actively developed by clicking the donate button (via PayPal or CC)').'</p><a href="'.get_bloginfo('wpurl').'/wp-admin/admin-ajax.php" class="message-close" title=":("><span class="ui-icon ui-icon-close"/></a><br class="clear"/></div>';
       }
       
       if ( isset( $_REQUEST['saved'] ) ) {
           echo '<div id="message" class="updated fade"><p><strong>'.__('Options saved.').'</strong></p></div>';
       }
       
       if ( isset( $_SESSION['constructor-errors']) && !empty ($_SESSION['constructor-errors'])) {
           echo '<div id="errors" class="error fade">';
           echo '<p><strong>'.__('Errors', 'constructor').'</strong></p>';
           foreach ($_SESSION['constructor-errors'] as $error) {
               echo "<p>{$error}</p>";
           }
           echo '</div>';
           unset ($_SESSION['constructor-errors']);
       }
       ?>
       <div class="constructor">
            <form method="post" id="constructor-form" action="<?php echo attribute_escape($_SERVER['REQUEST_URI']); ?>" enctype="multipart/form-data">
                <?php wp_nonce_field('constructor'); ?>
                <input type="hidden" name="action" value="save" />
                <div id="tabs">
                    <ul>
                        <?php foreach ($modules as $module) : ?>
                        <li><a href="#constr-<?php echo $module ?>"><?php _e(ucfirst($module), 'constructor'); ?></a></li>
                        <?php endforeach; ?>
                    </ul>

                    <?php foreach ($modules as $module) : ?>
                    <div id="constr-<?php echo $module ?>">
                        <?php require_once "settings/$module.php" ?>
                    </div>
                    <?php endforeach; ?>

                </div>
                <p class="submit">
                    <input type="submit" name="Submit" class="button-primary" value="<?php _e('Save Changes', 'constructor')?>" />
                </p>
            </form>
       </div>
    </div>
    <?php
}
?>