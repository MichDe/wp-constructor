<?php
/**
 * @package WordPress
 * @subpackage Constructor
 */
require_once 'Abstract.php';

class Constructor_Ajax extends Constructor_Abstract
{
    var $_themes = null;
    var $_custom = null;
    var $_errors = array();

    /**
     * Save "Current" theme as "..."
     * @return void
     */
    function save()
    {
        global $current_user, $template_uri;
        // setup permissions for save
        $permission = 0777;

        // get theme options
        $constructor = $this->_options;
        $admin       = $this->_admin;

        // get theme name
        $theme = isset($_REQUEST['theme'])?$_REQUEST['theme']:$admin['theme'];
        $theme_new = strtolower($theme);
        $theme_new = preg_replace('/\W/', '-', $theme_new);
        $theme_new = preg_replace('/[-]+/', '-', $theme_new);

        $path_new = CONSTRUCTOR_CUSTOM_THEMES .'/'. $theme_new;
        $path_old = CONSTRUCTOR_CUSTOM_THEMES .'/current';

        $theme_uri   = isset($_REQUEST['theme-uri'])?$_REQUEST['theme-uri']:'';
        $description = stripslashes(isset($_REQUEST['description'])?$_REQUEST['description']:'');
        $version     = isset($_REQUEST['version'])?$_REQUEST['version']:'0.0.1';
        $author      = isset($_REQUEST['author'])?$_REQUEST['author']:'';
        $author_uri  = isset($_REQUEST['author-uri'])?$_REQUEST['author-uri']:$current_user->user_nicename;

        // create new folder for new theme
        if (is_dir($path_new) &&
            !is_writable($path_new)) {
            $this->returnResponse(RESPONSE_KO,  sprintf(__('Directory "%s" is not writable.', 'constructor'), $path_new));
        } else {
            if (!is_writable(CONSTRUCTOR_CUSTOM_THEMES .'/')) {
                $this->returnResponse(RESPONSE_KO, sprintf(__('Directory "%s" is not writable.', 'constructor'), CONSTRUCTOR_CUSTOM_THEMES .'/'));
            } else {
                @mkdir($path_new);
                @chmod($path_new, $permission);
            }
        }
        // copy all theme images to new? directory
        foreach ($constructor['images'] as $img => $data) {
            if (!empty($data['src'])) {
                $old_image = $path_old .'/'. $data['src'];
                $new_image = $path_new .'/'. $data['src'];

                if ($old_image != $new_image) {
                    // we are already check directory permissions
                    if (!@copy($old_image, $new_image)) {
                         $this->returnResponse(RESPONSE_KO, sprintf(__('Can\'t copy file "%s".', 'constructor'), $old_image));
                    }
                    // read and write for owner and everybody else
                    @chmod($new_image, $permission);
                }
            }
        }

        // copy default screenshot (if not exist)
        if (!file_exists($path_new.'/screenshot.png') &&
             file_exists($path_old.'/screenshot.png')) {
            if (!@copy($path_old.'/screenshot.png', $path_new.'/screenshot.png')) {
                $this->returnResponse(RESPONSE_KO, sprintf(__('Can\'t copy file "%s".', 'constructor'), $path_old.'/screenshot.png'));
            }
        } elseif (!file_exists($path_new.'/screenshot.png')) {
            if (!@copy(CONSTRUCTOR_DIRECTORY.'/admin/images/screenshot.png', $path_new.'/screenshot.png')) {
                $this->returnResponse(RESPONSE_KO, sprintf(__('Can\'t copy file "%s".', 'constructor'), '/admin/images/screenshot.png'));
            }
        }

        // read and write for owner and everybody else
        @chmod($path_new.'/screenshot.png', $permission);

        // update style file
        if (file_exists($path_old.'/style.css')) {
            $style = file_get_contents($path_old.'/style.css');
            // match first comment /* ... */
            $style = preg_replace('|\/\*(.*)\*\/|Umis', '', $style, 1);
        } else {
            $style = '';
        }

        $style = "/*
Theme Name: $theme
Theme URI: $theme_uri
Description: $description
Version: $version
Author: $author
Author URI: $author_uri
*/".$style;

        unset($constructor['theme']);

        $config = "<?php \n".
                  "/* Save on ".date('Y-m-d H:i')." */ \n".
                  "return ".
                  var_export($constructor, true).
                  "\n ?>";

        // update files content
        if (!@file_put_contents(CONSTRUCTOR_CUSTOM_THEMES .'/'.$theme_new.'/style.css', $style)) {
            $this->returnResponse(RESPONSE_KO, sprintf(__('Can\'t save file "%s".', 'constructor'), CONSTRUCTOR_CUSTOM_THEMES .'/'.$theme_new.'/style.css'));
        }

        if (!@file_put_contents(CONSTRUCTOR_CUSTOM_THEMES .'/'.$theme_new.'/config.php', $config)) {
            $this->returnResponse(RESPONSE_KO, sprintf(__('Can\'t save file "%s".', 'constructor'), CONSTRUCTOR_CUSTOM_THEMES .'/'.$theme_new.'/config.php'));
        }

        $this->returnResponse(RESPONSE_OK, __('Theme was saved, please reload page for view changes', 'constructor'));
    }

    /**
     * @return void
     */
    function donate()
    {
        // set donate flag to false
        $constructor_admin = get_option('constructor_admin');
        $constructor_admin['donate'] = false;
        update_option('constructor_admin', $constructor_admin);

        die();
    }
    
    /**
     * Return simple JSON response
     *
     * @param string $status RESPONSE_OK|RESPONSE_KO
     * @param string $message
     */
    function returnResponse($status = RESPONSE_OK, $message = '')
    {
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');

        $message = addslashes($message);
        echo '{"status":"'.$status.'","message":"'.$message.'"}';
        die();
    }
}
?>