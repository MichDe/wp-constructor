<?php __('Layout', 'constructor'); // requeried for correct translation ?>
<script type="text/javascript">
/* <![CDATA[ */
(function($){
$(document).ready(function(){
    $("#constructor-layout-width-slider").slider({
        range: "min",
        value: <?php echo (int)$constructor['layout']['width']?>,
        min: 712,
        max: 1280,
        step:8,
        slide: function(event, ui) {
            $("#constructor-layout-width").val(ui.value);
        }
    });

    $("#constructor-layout-sidebar-slider").slider({
        range: "min",
        value: <?php echo (int)$constructor['layout']['sidebar']?>,
        min: 160,
        max: 320,
        step:8,
        slide: function(event, ui) {
            $("#constructor-layout-sidebar").val(ui.value);
        }
    });


    $("#constructor-layout-extra-slider").slider({
        range: "min",
        value: <?php echo (int)$constructor['layout']['extra']?>,
        min: 160,
        max: 320,
        step:8,
        slide: function(event, ui) {
            $("#constructor-layout-extra").val(ui.value);
        }
    });
});
})(jQuery);
/* ]]> */
</script>

<input type="hidden" id="constructor-layout-home" name="constructor[layout][home]" value="<?php echo $constructor['layout']['home']?>"/>
<input type="hidden" id="constructor-layout-archive" name="constructor[layout][archive]" value="<?php echo $constructor['layout']['archive']?>"/>
<input type="hidden" id="constructor-layout-search" name="constructor[layout][search]" value="<?php echo $constructor['layout']['search']?>"/>
<input type="hidden" id="constructor-layout-index" name="constructor[layout][index]" value="<?php echo $constructor['layout']['index']?>"/>
<table class="form-table">
<tr>
    <th rowspan="3"><?php _e('Options', 'constructor')?></th>
    <td class="slider">
        <p>
            <label for="constructor-layout-width"><?php _e('Container Width', 'constructor'); ?>:</label>
            <input type="text" id="constructor-layout-width" name="constructor[layout][width]" value="<?php echo $constructor['layout']['width']?>" style="border:0; color:#21759B; font-weight:bold; width:42px" /> px
        </p>
        <div id="constructor-layout-width-slider"  style="width:600px;"></div>
    </td>
</tr>
<tr>
    <td class="slider">
        <p>
            <label for="constructor-layout-sidebar"><?php _e('Sidebar Width', 'constructor'); ?>:</label>
            <input type="text" id="constructor-layout-sidebar" name="constructor[layout][sidebar]" value="<?php echo $constructor['layout']['sidebar']?>" style="border:0; color:#21759B; font-weight:bold; width:42px" /> px
        </p>
        <div id="constructor-layout-sidebar-slider"  style="width:600px;"></div>
    </td>
</tr>
<tr>
    <td class="slider">
        <p>
            <label for="constructor-layout-extra"><?php _e('Extra Bar Width', 'constructor'); ?>:</label>
            <input type="text" id="constructor-layout-extra" name="constructor[layout][extra]" value="<?php echo $constructor['layout']['extra']?>" style="border:0; color:#21759B; font-weight:bold; width:42px" /> px
        </p>
        <div id="constructor-layout-extra-slider"  style="width:600px;"></div>
    </td>
</tr>
<tr>
    <th><?php _e('Homepage', 'constructor')?></th>
    <td class="select" id="layout-home">
        <a href="#" title="<?php echo attribute_escape(__('Default', 'constructor')); ?>" name="default" <?php if($constructor['layout']['home'] == 'default') echo 'class="selected"'; ?>>
            <img src="<?php echo $directory_uri ?>/admin/images/layout-default.png" alt="<?php echo attribute_escape(__('Default', 'constructor')); ?>" />
        </a>
        <a href="#" title="<?php echo attribute_escape(__('Tile', 'constructor')); ?>" name="tile" <?php if($constructor['layout']['home'] == 'tile') echo 'class="selected"'; ?>>
            <img src="<?php echo $directory_uri ?>/admin/images/layout-tile.png" alt="<?php echo attribute_escape(__('Tile', 'constructor')); ?>" />
        </a>
        <a href="#" title="<?php echo attribute_escape(__('List', 'constructor')); ?>" name="list" <?php if($constructor['layout']['home'] == 'list') echo 'class="selected"'; ?>>
            <img src="<?php echo $directory_uri ?>/admin/images/layout-list.png" alt="<?php echo attribute_escape(__('List', 'constructor')); ?>" />
        </a>
    </td>
</tr>
<tr>
    <th><?php _e('Archive', 'constructor')?></th>
    <td class="select" id="layout-archive">
        <a href="#" title="<?php echo attribute_escape(__('Default', 'constructor')); ?>" name="default" <?php if($constructor['layout']['archive'] == 'default') echo 'class="selected"'; ?>>
            <img src="<?php echo $directory_uri ?>/admin/images/layout-default.png" alt="<?php echo attribute_escape(__('Default', 'constructor')); ?>" />
        </a>
        <a href="#" title="<?php echo attribute_escape(__('Tile', 'constructor')); ?>" name="tile" <?php if($constructor['layout']['archive'] == 'tile') echo 'class="selected"'; ?>>
            <img src="<?php echo $directory_uri ?>/admin/images/layout-tile.png" alt="<?php echo attribute_escape(__('Tile', 'constructor')); ?>" />
        </a>
        <a href="#" title="<?php echo attribute_escape(__('List', 'constructor')); ?>" name="list" <?php if($constructor['layout']['archive'] == 'list') echo 'class="selected"'; ?>>
            <img src="<?php echo $directory_uri ?>/admin/images/layout-list.png" alt="<?php echo attribute_escape(__('List', 'constructor')); ?>" />
        </a>
    </td>
</tr>
<tr>
    <th><?php _e('Search', 'constructor')?></th>
    <td class="select" id="layout-search">
        <a href="#" title="<?php echo attribute_escape(__('Default', 'constructor')); ?>" name="default" <?php if($constructor['layout']['search'] == 'default') echo 'class="selected"'; ?>>
            <img src="<?php echo $directory_uri ?>/admin/images/layout-default.png" alt="<?php echo attribute_escape(__('Default', 'constructor')); ?>" />
        </a>
        <a href="#" title="<?php echo attribute_escape(__('Tile', 'constructor')); ?>" name="tile" <?php if($constructor['layout']['search'] == 'tile') echo 'class="selected"'; ?>>
            <img src="<?php echo $directory_uri ?>/admin/images/layout-tile.png" alt="<?php echo attribute_escape(__('Tile', 'constructor')); ?>" />
        </a>
        <a href="#" title="<?php echo attribute_escape(__('List', 'constructor')); ?>" name="list" <?php if($constructor['layout']['search'] == 'list') echo 'class="selected"'; ?>>
            <img src="<?php echo $directory_uri ?>/admin/images/layout-list.png" alt="<?php echo attribute_escape(__('List', 'constructor')); ?>" />
        </a>
    </td>
</tr>
<tr>
    <th><?php _e('Index', 'constructor')?></th>
    <td class="select" id="layout-index">
        <a href="#" title="<?php echo attribute_escape(__('Default', 'constructor')); ?>" name="default" <?php if($constructor['layout']['index'] == 'default') echo 'class="selected"'; ?>>
            <img src="<?php echo $directory_uri ?>/admin/images/layout-default.png" alt="<?php echo attribute_escape(__('Default', 'constructor')); ?>" />
        </a>
        <a href="#" title="<?php echo attribute_escape(__('Tile', 'constructor')); ?>" name="tile" <?php if($constructor['layout']['index'] == 'tile') echo 'class="selected"'; ?>>
            <img src="<?php echo $directory_uri ?>/admin/images/layout-tile.png" alt="<?php echo attribute_escape(__('Tile', 'constructor')); ?>" />
        </a>
        <a href="#" title="<?php echo attribute_escape(__('List', 'constructor')); ?>" name="list" <?php if($constructor['layout']['index'] == 'list') echo 'class="selected"'; ?>>
            <img src="<?php echo $directory_uri ?>/admin/images/layout-list.png" alt="<?php echo attribute_escape(__('List', 'constructor')); ?>" />
        </a>
    </td>
</tr>
</table>
