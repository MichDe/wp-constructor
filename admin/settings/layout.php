<?php __('Layout', 'constructor'); // requeried for correct translation ?>

<input type="hidden" id="constructor-layout-home" name="constructor[layout][home]" value="<?php echo $constructor['layout']['home']?>"/>
<input type="hidden" id="constructor-layout-archive" name="constructor[layout][archive]" value="<?php echo $constructor['layout']['archive']?>"/>
<input type="hidden" id="constructor-layout-search" name="constructor[layout][search]" value="<?php echo $constructor['layout']['search']?>"/>
<input type="hidden" id="constructor-layout-index" name="constructor[layout][index]" value="<?php echo $constructor['layout']['index']?>"/>
<table class="form-table">

<tr>
    <th><?php _e('Homepage', 'constructor')?></th>
    <td class="select" id="layout-home">
        <a href="#" title="<?php echo attribute_escape(__('Default', 'constructor')); ?>" name="default" <?php if($constructor['layout']['home'] == 'default') echo 'class="selected"'; ?>>
            <img src="<?php echo $template_uri ?>/admin/images/layout-default.png" alt="<?php echo attribute_escape(__('Default', 'constructor')); ?>" />
        </a>
        <a href="#" title="<?php echo attribute_escape(__('Tile', 'constructor')); ?>" name="tile" <?php if($constructor['layout']['home'] == 'tile') echo 'class="selected"'; ?>>
            <img src="<?php echo $template_uri ?>/admin/images/layout-tile.png" alt="<?php echo attribute_escape(__('Tile', 'constructor')); ?>" />
        </a>
        <a href="#" title="<?php echo attribute_escape(__('List', 'constructor')); ?>" name="list" <?php if($constructor['layout']['home'] == 'list') echo 'class="selected"'; ?>>
            <img src="<?php echo $template_uri ?>/admin/images/layout-list.png" alt="<?php echo attribute_escape(__('List', 'constructor')); ?>" />
        </a>
    </td>
</tr>
<tr>
    <th><?php _e('Archive', 'constructor')?></th>
    <td class="select" id="layout-archive">
        <a href="#" title="<?php echo attribute_escape(__('Default', 'constructor')); ?>" name="default" <?php if($constructor['layout']['archive'] == 'default') echo 'class="selected"'; ?>>
            <img src="<?php echo $template_uri ?>/admin/images/layout-default.png" alt="<?php echo attribute_escape(__('Default', 'constructor')); ?>" />
        </a>
        <a href="#" title="<?php echo attribute_escape(__('Tile', 'constructor')); ?>" name="tile" <?php if($constructor['layout']['archive'] == 'tile') echo 'class="selected"'; ?>>
            <img src="<?php echo $template_uri ?>/admin/images/layout-tile.png" alt="<?php echo attribute_escape(__('Tile', 'constructor')); ?>" />
        </a>
        <a href="#" title="<?php echo attribute_escape(__('List', 'constructor')); ?>" name="list" <?php if($constructor['layout']['archive'] == 'list') echo 'class="selected"'; ?>>
            <img src="<?php echo $template_uri ?>/admin/images/layout-list.png" alt="<?php echo attribute_escape(__('List', 'constructor')); ?>" />
        </a>
    </td>
</tr>
<tr>
    <th><?php _e('Search', 'constructor')?></th>
    <td class="select" id="layout-search">
        <a href="#" title="<?php echo attribute_escape(__('Default', 'constructor')); ?>" name="default" <?php if($constructor['layout']['search'] == 'default') echo 'class="selected"'; ?>>
            <img src="<?php echo $template_uri ?>/admin/images/layout-default.png" alt="<?php echo attribute_escape(__('Default', 'constructor')); ?>" />
        </a>
        <a href="#" title="<?php echo attribute_escape(__('Tile', 'constructor')); ?>" name="tile" <?php if($constructor['layout']['search'] == 'tile') echo 'class="selected"'; ?>>
            <img src="<?php echo $template_uri ?>/admin/images/layout-tile.png" alt="<?php echo attribute_escape(__('Tile', 'constructor')); ?>" />
        </a>
        <a href="#" title="<?php echo attribute_escape(__('List', 'constructor')); ?>" name="list" <?php if($constructor['layout']['search'] == 'list') echo 'class="selected"'; ?>>
            <img src="<?php echo $template_uri ?>/admin/images/layout-list.png" alt="<?php echo attribute_escape(__('List', 'constructor')); ?>" />
        </a>
    </td>
</tr>
<tr>
    <th><?php _e('Index', 'constructor')?></th>
    <td class="select" id="layout-index">
        <a href="#" title="<?php echo attribute_escape(__('Default', 'constructor')); ?>" name="default" <?php if($constructor['layout']['index'] == 'default') echo 'class="selected"'; ?>>
            <img src="<?php echo $template_uri ?>/admin/images/layout-default.png" alt="<?php echo attribute_escape(__('Default', 'constructor')); ?>" />
        </a>
        <a href="#" title="<?php echo attribute_escape(__('Tile', 'constructor')); ?>" name="tile" <?php if($constructor['layout']['index'] == 'tile') echo 'class="selected"'; ?>>
            <img src="<?php echo $template_uri ?>/admin/images/layout-tile.png" alt="<?php echo attribute_escape(__('Tile', 'constructor')); ?>" />
        </a>
        <a href="#" title="<?php echo attribute_escape(__('List', 'constructor')); ?>" name="list" <?php if($constructor['layout']['index'] == 'list') echo 'class="selected"'; ?>>
            <img src="<?php echo $template_uri ?>/admin/images/layout-list.png" alt="<?php echo attribute_escape(__('List', 'constructor')); ?>" />
        </a>
    </td>
</tr>
</table>
