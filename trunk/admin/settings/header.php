<?php __('Header', 'constructor'); // requeried for correct translation ?>
<script type="text/javascript">
/* <![CDATA[ */
(function($){
$(document).ready(function(){
    $("#constructor-layout-header-slider").slider({
        range: "min",
        value: <?php echo (int)($constructor['layout']['header'])?>,
        min: 80,
        max: 320,
        step:5,
        slide: function(event, ui) {
            $("#constructor-layout-header").val(ui.value);
        }
    });
});
})(jQuery);
/* ]]> */
</script>
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
    <th class="slider">
    	<?php _e('Header height', 'constructor')?>: 
	    <input type="text" id="constructor-layout-header" name="constructor[layout][header]" value="<?php echo $constructor['layout']['header']?>" />px
	</th>
    <td class="slider">
    	<br/>
        <div id="constructor-layout-header-slider"  style="width:200px;"></div>
    </td>
</tr>
<tr>
    <th scope="row" valign="top">
        <?php _e('Header menu', 'constructor'); ?><br/>
        <small><em><?php _e('menu can configured with <a href="widgets.php">widgets</a>, use "header" sidebar', 'constructor'); ?></em></small>
    </th>
    <td>
		<fieldset>
			<legend>
				<input type="checkbox" id="constructor-menu-flag" name="constructor[menu][flag]" value="1" <?php if ($constructor['menu']['flag'] == 1) echo 'checked="checked"'; ?> />
                <label for="constructor-menu-flag"><?php _e('Show top menu', 'constructor'); ?></label>
			</legend>
			<dl>
				<dt><?php _e('Pages', 'constructor'); ?></dt>
				<dd><select name="constructor[menu][pages][depth]" id="constructor-menu-pages">
		                <option value="0" <?php if ($constructor['menu']['pages']['depth'] == 0) echo 'selected="selected"'; ?>><?php _e('Disable pages', 'constructor'); ?></option>
		                <option value="1" <?php if ($constructor['menu']['pages']['depth'] == 1) echo 'selected="selected"'; ?>><?php _e('Show first-level pages', 'constructor'); ?></option>
		                <option value="2" <?php if ($constructor['menu']['pages']['depth'] == 2) echo 'selected="selected"'; ?>><?php _e('Show pages in drop-down menu', 'constructor'); ?></option>
		                <option value="3" <?php if ($constructor['menu']['pages']['depth'] == 3) echo 'selected="selected"'; ?>><?php _e('Show pages in drop-down menu (2-levels)', 'constructor'); ?></option>         
		            </select></dd>
                <dt><?php _e('Categories', 'constructor'); ?></dt>
				<dd>
					<input type="checkbox" id="constructor-menu-categories-group" name="constructor[menu][categories][group]" value="1" <?php if ($constructor['menu']['categories']['group']) echo 'checked="checked"'; ?>/>
                    <label for="constructor-menu-categories-group"><?php _e('Group categories in one menu item', 'constructor'); ?></label>
					<br/>
			        <select name="constructor[menu][categories][depth]" id="constructor-menu-categories">
		                <option value="0" <?php if ($constructor['menu']['categories']['depth'] == 0) echo 'selected="selected"'; ?>><?php _e('Disable categories', 'constructor'); ?></option>
		                <option value="1" <?php if ($constructor['menu']['categories']['depth'] == 1) echo 'selected="selected"'; ?>><?php _e('Show first-level categories', 'constructor'); ?></option>
		                <option value="2" <?php if ($constructor['menu']['categories']['depth'] == 2) echo 'selected="selected"'; ?>><?php _e('Show categories in drop-down menu', 'constructor'); ?></option>
		                <option value="3" <?php if ($constructor['menu']['categories']['depth'] == 3) echo 'selected="selected"'; ?>><?php _e('Show categories in drop-down menu (2-levels)', 'constructor'); ?></option>
		            </select>
			    </dd>
                <dt><?php _e('Links', 'constructor'); ?></dt>
				<dd>
					<input type="checkbox" id="constructor-menu-home" name="constructor[menu][home]" value="1" <?php if ($constructor['menu']['home']) echo 'checked="checked"'; ?>/>
			        <label for="constructor-menu-home"><?php _e('Show link to home page', 'constructor'); ?></label>
			        <br/>
			        <input type="checkbox" id="constructor-menu-rss" name="constructor[menu][rss]" value="1" <?php if ($constructor['menu']['rss']) echo 'checked="checked"'; ?>/>
                    <label for="constructor-menu-rss"><?php _e('Show link to RSS feed', 'constructor'); ?></label>
				</dd>
				<dt><?php _e('Tools', 'constructor'); ?></dt>
				<dd>
				   <input type="checkbox" id="constructor-menu-search" name="constructor[menu][search]" value="1" <?php if ($constructor['menu']['search']) echo 'checked="checked"'; ?>/>
                   <label for="constructor-menu-rss"><?php _e('Show search form', 'constructor'); ?></label>
			   </dd>
			</dl>
		</fieldset>
        <?php
        /*
        // TODO: Requeried cookie support in constructor.js
        <br/>
        <input type="checkbox" id="constructor-menu-size" name="constructor[menu][size]" value="1" <?php if ($constructor['menu']['size']) echo 'checked="checked"'; ?>/>
        <label for="constructor-menu-size"><?php _e('Show font resizer', 'constructor'); ?></label>
        */ 
        /*
        // TODO: Theme switcher
        <br/>
        <input type="checkbox" id="constructor-menu-theme" name="constructor[menu][theme]" value="1" <?php if ($constructor['menu']['theme']) echo 'checked="checked"'; ?>/>
        <label for="constructor-menu-theme"><?php _e('Theme switcher', 'constructor'); ?></label>
        */ ?>
    </td>
</tr>
</table>