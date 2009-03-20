<?php __('Header', 'constructor'); // requeried for correct translation ?>
<input type="hidden" id="constructor-title-pos" name="constructor[title][pos]" value="<?php echo $constructor['title']['pos']?>"/>
<table class="form-table">
<tr>
    <th scope="row" valign="top"><?php _e('Title position', 'constructor'); ?></th>
    <td class="position select" id="title-pos">
        <a href="#" title="<?php _e('Left', 'constructor'); ?>" name="left" <?php if($constructor['title']['pos'] == 'left') echo 'class="selected"'; ?>> </a>
        <a href="#" title="<?php _e('Center', 'constructor'); ?>" name="center" <?php if($constructor['title']['pos'] == 'center') echo 'class="selected"'; ?>> </a>
        <a href="#" title="<?php _e('Right', 'constructor'); ?>" name="right" <?php if($constructor['title']['pos'] == 'right') echo 'class="selected"'; ?>> </a>
        <br class="clear"/>
    </td>
</tr>
<tr>
    <th scope="row" valign="top"><?php _e('Title colors', 'constructor'); ?></th>
    <td class="color-selector">
        <div id="color_title" class="color"><div style="background-color: <?php echo $constructor['color']['title'] ?>"></div></div>
        - <?php echo attribute_escape(__('title', 'constructor')); ?>
        <br class="clear"/>
        <div id="color_title2" class="color"><div style="background-color: <?php echo $constructor['color']['title2'] ?>"></div></div>
        - <?php echo attribute_escape(__('description', 'constructor')); ?>
        <br class="clear"/>
    </td>
</tr>
<tr>
    <th scope="row" valign="top"><?php _e('Header menu', 'constructor'); ?></th>
    <td>
        <input type="radio" id="constructor-menu-1" name="constructor[menu][type]" value="1" <?php if ($constructor['menu']['type'] == 1) echo 'checked="checked"'; ?> />
        <label for="constructor-menu-1"><?php _e('Don\'t show menu', 'constructor'); ?></label>
        <br/>
        <input type="radio" id="constructor-menu-2" name="constructor[menu][type]" value="2" <?php if ($constructor['menu']['type'] == 2) echo 'checked="checked"'; ?> />
        <label for="constructor-menu-2"><?php _e('Show first-level pages', 'constructor'); ?></label>
        <br/>
        <input type="radio" id="constructor-menu-3" name="constructor[menu][type]" value="3" <?php if ($constructor['menu']['type'] == 3) echo 'checked="checked"'; ?> />
        <label for="constructor-menu-3"><?php _e('Show pages in drop-down menu', 'constructor'); ?></label>
        <br/>
        <input type="radio" id="constructor-menu-4" name="constructor[menu][type]" value="4" <?php if ($constructor['menu']['type'] == 4) echo 'checked="checked"'; ?> />
        <label for="constructor-menu-4"><?php _e('Show pages in drop-down menu (2-levels)', 'constructor'); ?></label>
        <br/>
        <input type="checkbox" id="constructor-menu-home" name="constructor[menu][home]" value="1" <?php if ($constructor['menu']['home']) echo 'checked="checked"'; ?>/>
        <label for="constructor-menu-home"><?php _e('Show link to home page', 'constructor'); ?></label>
        <br/>
        <input type="checkbox" id="constructor-menu-rss" name="constructor[menu][rss]" value="1" <?php if ($constructor['menu']['rss']) echo 'checked="checked"'; ?>/>
        <label for="constructor-menu-rss"><?php _e('Show link to RSS feed', 'constructor'); ?></label>
        <br/>
        <input type="checkbox" id="constructor-menu-size" name="constructor[menu][size]" value="1" <?php if ($constructor['menu']['size']) echo 'checked="checked"'; ?>/>
        <label for="constructor-menu-size"><?php _e('Show font resizer', 'constructor'); ?></label>
    </td>
</tr>
</table>