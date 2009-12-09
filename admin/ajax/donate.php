<?php
/**
 * @package WordPress
 * @subpackage Constructor
 */

// set donate flag to false
$constructor_admin = get_option('constructor_admin');
$constructor_admin['donate'] = false;
update_option('constructor_admin', $constructor_admin);

echo ":(";