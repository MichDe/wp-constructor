<?php __('CSS', 'constructor'); // requeried for correct translation ?>
<table class="form-table">
<?php if (!is_writable($directory .'/themes/'.$constructor['theme'].'/style.css')) : ?>
    <tr>
        <th scope="row" valign="top" colspan="2" class="th-full updated"><?php printf(__('<font color="red"><b>Warning!</b></font>: File "%s" is not writable.', 'constructor'), $directory .'/themes/'.$constructor['theme'].'/styles.css'); ?></th>
    </tr>
    <tr>
        <td class="td-full"><textarea name="null[css]" class="big" readonly="readonly"><?php echo file_get_contents($directory .'/themes/'.$constructor['theme'].'/style.css')?></textarea></td>
    </tr>
<?php else: ?>
    <tr>
        <td class="td-full"><textarea name="constructor[css]" class="big"><?php echo file_get_contents($directory .'/themes/'.$constructor['theme'].'/style.css')?></textarea></td>
    </tr>
<?php endif; ?>
</table>