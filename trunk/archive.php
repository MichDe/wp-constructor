<?php
/**
 * @package WordPress
 * @subpackage constructor
 */

// load header.php
get_header();

// load one of layout pages (layout-*.php)
get_constructor_layout('archive');

// load footer.php
get_footer();
?>