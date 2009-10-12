<?php __('Content', 'constructor'); // requeried for correct translation ?>
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
</table>