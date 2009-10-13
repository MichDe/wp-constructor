<?php __('Content', 'constructor'); // requeried for correct translation ?>

<input type="hidden" id="constructor-content-list-thumb-pos" name="constructor[content][list][thumb][pos]" value="<?php echo $constructor['content']['list']['thumb']['pos']?>"/>
<table class="form-table">
<tr>
    <th scope="row" valign="top"><?php _e('Posts', 'constructor'); ?></th>
    <td>
        <input type="checkbox" id="constructor-author" name="constructor[content][author]" value="1" <?php if (isset($constructor['content']['author']) && $constructor['content']['author'] == 1) echo 'checked="checked"'; ?> />
        <label for="constructor-author"><?php _e('Show author link', 'constructor'); ?></label>
    </td>
</tr>
<tr>
    <th scope="row" valign="top"><?php _e('Thumbnails', 'constructor'); ?></th>
    <td>
        <input type="checkbox" id="constructor-thumb-auto" name="constructor[content][thumb][auto]" value="1" <?php if (isset($constructor['content']['thumb']['auto']) && $constructor['content']['thumb']['auto'] == 1) echo 'checked="checked"'; ?> />
        <label for="constructor-thumb-auto"><?php _e('Autogenerate thumbnails', 'constructor'); ?></label>
    </td>
</tr>
<?php
if (!is_writable($directory.'/cache/')) : ;
?>
<tr>
	<td></td>
    <td scope="row" valign="top" class="updated"><?php printf(__('<font color="red"><b>Warning!</b></font>: Directory "%s" is not writable.', 'constructor'), $directory.'/cache/'); ?></td>
</tr>
<?php endif; ?>
<tr>
    <th scope="row" valign="top" rowspan="3"><?php _e('"List" layout options', 'constructor'); ?></th>
    <td>
        <input type="checkbox" id="constructor-content-list-filter" name="constructor[content][list][filter]" value="1" <?php if (isset($constructor['content']['list']['filter']) && $constructor['content']['list']['filter'] == 1) echo 'checked="checked"'; ?> />
        <label for="constructor-content-list-filter"><?php _e('Strip HTML tags from announce (leave only <code>&lt;p&gt;&lt;br&gt;&lt;a&gt;&lt;hr&gt;&lt;i&gt;&lt;em&gt;&lt;b&gt;&lt;strong&gt;&lt;ul&gt;&lt;ol&gt;&lt;li&gt;</code>)', 'constructor'); ?></label>
    </td>
</tr>
<tr>
    <td>
        <input type="checkbox" id="constructor-content-list-thumb-noimage" name="constructor[content][list][thumb][noimage]" value="1" <?php if (isset($constructor['content']['list']['thumb']['noimage']) && $constructor['content']['list']['thumb']['noimage'] == 1) echo 'checked="checked"'; ?> />
        <label for="constructor-content-list-thumb-noimage"><?php _e('Show "No Image" picture', 'constructor'); ?></label>
    </td>
</tr>
<tr>
	<td class="position select" id="content-list-thumb-pos">
		<p><?php _e('Thumbnail position', 'constructor'); ?></p>
        <a href="#" title="<?php _e('Left', 'constructor'); ?>" name="left" <?php if($constructor['content']['list']['thumb']['pos'] == 'left') echo 'class="selected"'; ?>> </a>
        <a href="#" title="<?php _e('Right', 'constructor'); ?>" name="right" <?php if($constructor['content']['list']['thumb']['pos'] == 'right') echo 'class="selected"'; ?>> </a>
        <br class="clear"/>
    </td>
</tr>
</table>