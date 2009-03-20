<?php __('Layout', 'constructor'); // requeried for correct translation ?>
<input type="hidden" id="constructor-layout" name="constructor[layout]" value="<?php echo $constructor['layout']?>"/>
<table class="form-table">
<tr>
    <td class="select td-full" id="layout">
        <a href="#" title="<?php echo attribute_escape(__('Default', 'constructor')); ?>" name="default" <?php if($constructor['layout'] == 'default') echo 'class="selected"'; ?>>
            <img src="<?php echo $directory_uri ?>/admin/images/layout-default.png" alt="<?php echo attribute_escape(__('Default', 'constructor')); ?>" />
        </a>
        <a href="#" title="<?php echo attribute_escape(__('Tile', 'constructor')); ?>" name="tile" <?php if($constructor['layout'] == 'tile') echo 'class="selected"'; ?>>
            <img src="<?php echo $directory_uri ?>/admin/images/layout-tile.png" alt="<?php echo attribute_escape(__('Tile', 'constructor')); ?>" />
        </a>
        <a href="#" title="<?php echo attribute_escape(__('List', 'constructor')); ?>" name="list" <?php if($constructor['layout'] == 'list') echo 'class="selected"'; ?>>
            <img src="<?php echo $directory_uri ?>/admin/images/layout-list.png" alt="<?php echo attribute_escape(__('List', 'constructor')); ?>" />
        </a>
    </td>
</tr>
</table>
