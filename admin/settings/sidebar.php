<?php __('Sidebar', 'constructor'); // requeried for correct translation ?>
<input type="hidden" id="constructor-sidebar" name="constructor[sidebar]" value="<?php echo $constructor['sidebar']?>"/>
<table class="form-table">
<tr>
    <th scope="row" valign="top"><?php _e('Sidebar', 'constructor'); ?></th>
    <td class="select" id="sidebar">
        <a href="#" title="<?php echo attribute_escape(__('Left', 'constructor')); ?>" name="left" <?php if($constructor['sidebar'] == 'left') echo 'class="selected"'; ?>>
            <img src="<?php echo $directory_uri ?>/admin/images/sidebar-left.png" alt="<?php echo attribute_escape(__('Left', 'constructor')); ?>" />
        </a>
        <a href="#" title="<?php echo attribute_escape(__('Right', 'constructor')); ?>" name="right" <?php if($constructor['sidebar'] == 'right') echo 'class="selected"'; ?>>
            <img src="<?php echo $directory_uri ?>/admin/images/sidebar-right.png" alt="<?php echo attribute_escape(__('Right', 'constructor')); ?>" />
        </a>
        <br class="clear"/>
        <a href="#" title="<?php echo attribute_escape(__('Two', 'constructor')); ?>" name="two" <?php if($constructor['sidebar'] == 'two') echo 'class="selected"'; ?>>
            <img src="<?php echo $directory_uri ?>/admin/images/sidebar-two.png" alt="<?php echo attribute_escape(__('Two', 'constructor')); ?>" />
        </a>
        <a href="#" title="<?php echo attribute_escape(__('None', 'constructor')); ?>" name="none" <?php if($constructor['sidebar'] == 'none') echo 'class="selected"'; ?>>
            <img src="<?php echo $directory_uri ?>/admin/images/sidebar-none.png" alt="<?php echo attribute_escape(__('None', 'constructor')); ?>" />
        </a>
        <br class="clear"/>
        <a href="#" title="<?php echo attribute_escape(__('Two Right', 'constructor')); ?>" name="two-right" <?php if($constructor['sidebar'] == 'two-right') echo 'class="selected"'; ?>>
            <img src="<?php echo $directory_uri ?>/admin/images/sidebar-two-right.png" alt="<?php echo attribute_escape(__('Two Right', 'constructor')); ?>" />
        </a>
        <a href="#" title="<?php echo attribute_escape(__('Two Left', 'constructor')); ?>" name="two-left" <?php if($constructor['sidebar'] == 'two-left') echo 'class="selected"'; ?>>
            <img src="<?php echo $directory_uri ?>/admin/images/sidebar-two-left.png" alt="<?php echo attribute_escape(__('Two Left', 'constructor')); ?>" />
        </a>
    </td>
</tr>
</table>