<?php
/**
 * All AJAX actions control from this is file
 * 
 * @package WordPress
 * @subpackage Constructor
 */

require_once CONSTRUCTOR_DIRECTORY .'/libs/Constructor/Admin.php';

$admin = new Constructor_Admin();

add_action('wp_ajax_constructor_admin_save', array($admin, 'save'));
add_action('wp_ajax_constructor_admin_donate', array($admin, 'donate'));

/**
 * Definition of response OK/KO
 *
 * @var string
 */
define('RESPONSE_OK', 'ok');
define('RESPONSE_KO', 'ko');

/**
 * Return simple JSON response
 *
 * @param string $status RESPONSE_OK|RESPONSE_KO
 * @param string $message
 */
function returnResponse($status = RESPONSE_OK, $message = '') {
    header('Content-type: application/json');
    $message = addslashes($message);
    echo "{'status':'$status','message':'$message'}";
    die();
}

?>