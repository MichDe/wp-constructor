<?php __('Content', 'constructor'); // requeried for correct translation ?>
<table class="form-table">
<tr>
    <th scope="row" valign="top"><?php _e('Posts', 'constructor'); ?></th>
    <td>
        <input type="checkbox" id="constructor-author" name="constructor[content][author]" value="1" <?php if (isset($constructor['content']['author']) && $constructor['content']['author'] == 1) echo 'checked="checked"'; ?> />
        <label for="constructor-author"><?php _e('Show author link', 'constructor'); ?></label>
    </td>
</tr>
</table>