<?php
/**
 * @package WordPress
 * @subpackage Constructor
 */

add_action('admin_menu', 'constructor_theme_page_add');

$directory_uri = get_template_directory_uri();

wp_enqueue_script('jquery');
wp_enqueue_script('jquery-ui-tabs');
wp_enqueue_script('thickbox');
wp_enqueue_script('constructor-colorpicker', $directory_uri .'/admin/js/colorpicker.js', 'jquery');
wp_enqueue_script('constructor-settings',    $directory_uri .'/admin/js/settings.js', 'jquery');

wp_enqueue_style('thickbox');
wp_enqueue_style('constructor-admin',       $directory_uri .'/admin/css/admin.css');
wp_enqueue_style('constructor-colorpicker', $directory_uri .'/admin/css/colorpicker.css');
wp_enqueue_style('jquery.ui.tabs',          $directory_uri .'/admin/css/jquery.ui.tabs.css');


if (version_compare(phpversion(), '5.0.0', '<')) {
    require_once 'compatibility.php';
}

/**
 * Add configuration page
 */
function constructor_theme_page_add()
{
    session_start();
    $directory = get_template_directory();

    if ( isset( $_REQUEST['action'] ) && 'save' == $_REQUEST['action'] ) {
        check_admin_referer('constructor');
        if (isset($_REQUEST['constructor'])) {

            $files = $_FILES['constructor'];
            $data  = $_REQUEST['constructor'];

            if (isset ($data['theme-reload']) && $data['theme-reload'] != 0) {
                $theme = $data['theme'];
                $data  = require $directory.'/themes/'.$theme.'/config.php';
                $data['theme'] = $theme;
            } else {
                $upload = $directory.'/images/';

                if ($files && is_writable($directory.'/images/'))

                $errors = array();
                foreach ($files['name']['images'] as $name => $image) {
                    if (isset($image['src']) && is_uploaded_file($files['tmp_name']['images'][$name]['src'])) {

                        if (!preg_match('/\.(jpe?g|png|gif)$/i', $image['src'])) {
                            $errors[] = sprintf(__('File "%s" is not a image','constructor'), $image['src']);
                            continue;
                        }

                        if (move_uploaded_file($files['tmp_name']['images'][$name]['src'], $upload . $image['src'])) {
                            $data['images'][$name]['src'] = 'images/'.$image['src'];
                        }
                    }
                }
                $_SESSION['constructor-errors'] = $errors;

                /**
                 * CSS changes
                 */
                if (isset($data['css']) && is_writable($directory.'/themes/'.$data['theme'].'/styles.css')) {
                    file_put_contents($directory.'/themes/'.$data['theme'].'/styles.css', $data['css']);
                    unset($data['css']);
                }

                /**
                 * Slideshow
                 */
                $data['slideshow']['id'] = (int)$data['slideshow']['id'];

                if (isset($data['slideshow']['onpage']))   $data['slideshow']['onpage'] = true;
                if (isset($data['slideshow']['onsingle'])) $data['slideshow']['onsingle'] = true;

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
    add_theme_page(__('Customize Theme', 'constructor'), __('Customize', 'constructor'), 'edit_themes', 'functions.php', 'constructor_theme_page');
}


/**
 * Configuration page
 *
 */
function constructor_theme_page()
{
    $constructor   = get_option('constructor');
    $directory     = get_template_directory();
    $directory_uri = get_template_directory_uri();

    if (!$constructor) {
        $constructor = require $directory.'/themes/default/config.php';
        $constructor['theme'] = 'default';
    }

    ?>

    <div class='wrap'>
       <h2><?php _e('Customize Theme', 'constructor'); ?></h2>
       <?php if ( isset( $_REQUEST['saved'] ) ) echo '<div id="message" class="updated fade"><p><strong>'.__('Options saved.').'</strong></p></div>'; ?>
       <?php
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
                <input type="hidden" id="constructor-sidebar" name="constructor[sidebar]" value="<?php echo $constructor['sidebar']?>"/>
                <input type="hidden" id="constructor-theme" name="constructor[theme]" value="<?php echo $constructor['theme']?>"/>
                <input type="hidden" id="constructor-theme-reload" name="constructor[theme-reload]" value="0"/>

                <input type="hidden" id="constructor-slideshow" name="constructor[slideshow][id]" value="<?php echo $constructor['slideshow']['id']?>"/>


                <input type="hidden" id="constructor-opacity" name="constructor[opacity]" value="<?php echo $constructor['opacity']?>"/>

                <input type="hidden" id="constructor-title-pos" name="constructor[title][pos]" value="<?php echo $constructor['title']['pos']?>"/>

                <input type="hidden" id="constructor-color_title" name="constructor[color][title]" value="<?php echo $constructor['color']['title']?>"/>
                <input type="hidden" id="constructor-color_title2" name="constructor[color][title2]" value="<?php echo $constructor['color']['title2']?>"/>

                <input type="hidden" id="constructor-color_bg" name="constructor[color][bg]" value="<?php echo $constructor['color']['bg']?>"/>
                <input type="hidden" id="constructor-color_bg2" name="constructor[color][bg2]" value="<?php echo $constructor['color']['bg2']?>"/>

                <input type="hidden" id="constructor-color_text" name="constructor[color][text]" value="<?php echo $constructor['color']['text']?>"/>
                <input type="hidden" id="constructor-color_text2" name="constructor[color][text2]" value="<?php echo $constructor['color']['text2']?>"/>

                <input type="hidden" id="constructor-color_border" name="constructor[color][border]" value="<?php echo $constructor['color']['border']?>"/>
                <input type="hidden" id="constructor-color_border2" name="constructor[color][border2]" value="<?php echo $constructor['color']['border2']?>"/>

                <input type="hidden" id="constructor-color_header1" name="constructor[color][header1]" value="<?php echo $constructor['color']['header1']?>"/>
                <input type="hidden" id="constructor-color_header2" name="constructor[color][header2]" value="<?php echo $constructor['color']['header2']?>"/>
                <input type="hidden" id="constructor-color_header3" name="constructor[color][header3]" value="<?php echo $constructor['color']['header3']?>"/>
                <input type="hidden" id="constructor-color_alt" name="constructor[color][alt]" value="<?php echo $constructor['color']['alt']?>"/>

                <input type="hidden" id="constructor-images-wrap-pos" name="constructor[images][wrap][pos]" value="<?php echo $constructor['images']['wrap']['pos']?>"/>
                <input type="hidden" id="constructor-images-sidebar-pos" name="constructor[images][sidebar][pos]" value="<?php echo $constructor['images']['sidebar']['pos']?>"/>
                <input type="hidden" id="constructor-images-footer-pos" name="constructor[images][footer][pos]" value="<?php echo $constructor['images']['footer']['pos']?>"/>

                <input type="hidden" name="action" value="save" />


                <ul id="tabs">
                    <li><a href="#constr-themes"><?php _e('Themes', 'constructor'); ?></a></li>
                    <li><a href="#constr-layout"><?php _e('Layout', 'constructor'); ?></a></li>
                    <li><a href="#constr-header"><?php _e('Header', 'constructor'); ?></a></li>
                    <li><a href="#constr-footer"><?php _e('Footer', 'constructor'); ?></a></li>
                    <li><a href="#constr-colors"><?php _e('Colors', 'constructor'); ?></a></li>
                    <li><a href="#constr-fonts"><?php _e('Fonts', 'constructor'); ?></a></li>
                    <li><a href="#constr-css"><?php _e('CSS', 'constructor'); ?></a></li>
                    <li><a href="#constr-images"><?php _e('Images', 'constructor'); ?></a></li>
                    <li><a href="#constr-gallery"><?php _e('Slideshow', 'constructor'); ?></a></li>
                    <li><a href="#constr-export"><?php _e('Export', 'constructor'); ?></a></li>
                </ul>

                <div id="constr-themes">
                    <?php require_once 'settings/themes.php' ?>
                </div>
                
                <div id="constr-layout">
                    <?php require_once 'settings/layout.php' ?>
                </div>

                <div id="constr-header">
                    <?php require_once 'settings/header.php' ?>
                </div>

                <div id="constr-footer">
                    <?php require_once 'settings/footer.php' ?>
                </div>

                <div id="constr-colors">
                    <?php require_once 'settings/colors.php' ?>
                </div>

                <div id="constr-fonts">
                    <?php require_once 'settings/fonts.php' ?>
                </div>

                <div id="constr-css">
                    <?php require_once 'settings/css.php' ?>
                </div>

                <div id="constr-images">
                    <?php require_once 'settings/images.php' ?>
                </div>

                <div id="constr-gallery">
                    <?php require_once 'settings/gallery.php' ?>
                </div>

                <div id="constr-export">
                    <?php require_once 'settings/export.php' ?>
                </div>
                
                <p class="submit">
                    <input type="submit" name="Submit" class="button-primary" value="<?php _e('Save Changes', 'constructor')?>" />
                </p>
            </form>
       </div>
    </div>
    <?
}
?>