<?php
    $fonts = require dirname(__FILE__) . '/../fonts.php';
?>
<table class="form-table">
    <tr>
        <th scope="row" valign="top" class="th-full" colspan="2"><h3><?php _e('Header Font', 'constructor'); ?></h3></th>
    </tr>
    <?php foreach ($fonts as $key => $font) : ?>
    <tr>
        <td><?php echo $font ?></td>
        <td valign="middle">            
            <input type="radio" id="constructor-fonts-header-<?php echo $key ?>" name="constructor[fonts][header]" value="<?php echo $key ?>" <?php if ($constructor['fonts']['header'] == $key) echo 'checked="checked"'; ?> />
            <label for="constructor-fonts-header-<?php echo $key ?>" style='font-family:<?php echo $font ?>;'><?php _e('The quick brown fox jumps over the lazy dog', 'constructor'); ?></label>
        </td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <th scope="row" valign="top" class="th-full" colspan="2"><h3><?php _e('Body Font', 'constructor'); ?></h3></th>
    </tr>    
    <?php foreach ($fonts as $key => $font) : ?>
    <tr>
        <td><?php echo $font ?></td>
        <td>
            <input type="radio" id="constructor-fonts-body-<?php echo $key ?>" name="constructor[fonts][body]" value="<?php echo $key ?>" <?php if ($constructor['fonts']['body'] == $key) echo 'checked="checked"'; ?> />
            <label for="constructor-fonts-body-<?php echo $key ?>" style='font-family:<?php echo $font ?>;'><?php _e('The quick brown fox jumps over the lazy dog', 'constructor'); ?></label>
        </td>
    </tr>
    <?php endforeach; ?>
</table>