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
                // loading theme and forgot all changes
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
                            $errors[] = sprintf(__('File "%s" is not a image (jpeg, png, gif)','constructor'), $image['src']);
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

    // modules list - change list manualy only
    $modules = array(
                'themes',
                'sidebar',
                'layout',
                'header',
                'content',
                'footer',
                'colors',
                'fonts',
                'css',
                'images',
                'slideshow',
                'export',
                );
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
                <input type="hidden" name="action" value="save" />

                <ul id="tabs">
                    <?php foreach ($modules as $module) : ?>
                    <li><a href="#constr-<?php echo $module ?>"><?php _e(ucfirst($module), 'constructor'); ?></a></li>
                    <?php endforeach; ?>
                </ul>

                <?php foreach ($modules as $module) : ?>
                <div id="constr-<?php echo $module ?>">
                    <?php require_once "settings/$module.php" ?>
                </div>
                <?php endforeach; ?>
                
                <p class="submit">
                    <input type="submit" name="Submit" class="button-primary" value="<?php _e('Save Changes', 'constructor')?>" />
                </p>
            </form>
       </div>
    </div>
    <?
}
?>