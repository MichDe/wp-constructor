<?php
/**
 * @package WordPress
 * @subpackage Constructor
 */
?>
<div id="extra" class="sidebar">
    <ul>
        <?php 
        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('extra')) :
            wp_list_pages('title_li=<h2>'.__('Pages', 'constructor').'</h2>' ); 
        endif;
        ?>
    </ul>
</div>