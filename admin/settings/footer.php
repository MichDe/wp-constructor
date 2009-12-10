<?php __('Footer', 'constructor'); // requeried for correct translation ?>
<table class="form-table">
    <tr>
        <th scope="row" valign="top" class="th-full"><?php _e('Footer Text', 'constructor'); ?></th>
    </tr>
    <tr>
        <td class="td-full">
            <textarea name="constructor[footer][text]" class="big" rows="5"><?php echo stripslashes($constructor['footer']['text']) ?></textarea>
        </td>
    </tr>
</table>
