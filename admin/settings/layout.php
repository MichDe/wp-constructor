<?php __('Layout', 'constructor'); // requeried for correct translation  
$layouts = scandir(CONSTRUCTOR_DIRECTORY.'/layouts/');
$layouts = array_diff($layouts, array( '.','..','.svn','.htaccess','readme.txt'));

function is_php($file) {
    $info = pathinfo($file);
    return ($info['extension'] == 'php');
}
$layouts = array_filter($layouts, 'is_php');
?>
<input type="hidden" id="constructor-layout-home" name="constructor[layout][home]" value="<?php echo $constructor['layout']['home']?>"/>
<input type="hidden" id="constructor-layout-archive" name="constructor[layout][archive]" value="<?php echo $constructor['layout']['archive']?>"/>
<input type="hidden" id="constructor-layout-search" name="constructor[layout][search]" value="<?php echo $constructor['layout']['search']?>"/>
<input type="hidden" id="constructor-layout-index" name="constructor[layout][index]" value="<?php echo $constructor['layout']['index']?>"/>
<table class="form-table">
<tr>
    <th><?php _e('Homepage', 'constructor')?></th>
    <td class="select" id="layout-home">
        <?php constructor_admin_layout($layouts, 'home'); ?>
    </td>
</tr>
<tr>
    <th><?php _e('Archive', 'constructor')?></th>
    <td class="select" id="layout-archive">
        <?php constructor_admin_layout($layouts, 'archive'); ?>
    </td>
</tr>
<tr>
    <th><?php _e('Search', 'constructor')?></th>
    <td class="select" id="layout-search">
        <?php constructor_admin_layout($layouts, 'search'); ?>
    </td>
</tr>
<tr>
    <th><?php _e('Index', 'constructor')?></th>
    <td class="select" id="layout-index">
        <?php constructor_admin_layout($layouts, 'index'); ?>
    </td>
</tr>
<tr>
    <th><?php _e('Page', 'constructor')?></th>
    <td class="select" id="layout-index">
        <?php constructor_admin_layout($layouts, 'page'); ?>
    </td>
</tr>
<tr>
    <th><?php _e('Post', 'constructor')?></th>
    <td class="select" id="layout-index">
        <?php constructor_admin_layout($layouts, 'single'); ?>
    </td>
</tr>
</table>

<?php       
/**
 * Return string for build options
 *
 * @param  array  $layouts
 * @param  string $key
 * @return string
 */
function constructor_admin_layout($layouts, $key) 
{
    global $constructor;
    foreach ($layouts as $layout) {
        $info = pathinfo($layout);
        $name = $info['filename'];
        $title = ucfirst(strtolower($name));
        ?>
        <a href="#" title="<?php echo attribute_escape(__($title, 'constructor')); ?>" name="<?php echo $name; ?>" <?php if($constructor['layout'][$key] == $name) echo 'class="selected"'; ?>>
            <img src="<?php echo CONSTRUCTOR_DIRECTORY_URI ?>/admin/images/layout-<?php echo $name; ?>.png" alt="<?php echo attribute_escape(__($title, 'constructor')); ?>" />
        </a>
        <?php
    }
}
?>