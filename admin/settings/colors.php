<table class="form-table">
<tr>
    <th scope="row" valign="top"><?php _e('Opacity', 'constructor'); ?></th>
    <td class="select" id="opacity" >
        <a href="#" title="<?php echo attribute_escape(__('Dark', 'constructor')); ?>" name="dark" <?php if($constructor['opacity'] == 'dark') echo 'class="selected"'; ?>>
            <div class="dark"><?php echo attribute_escape(__('Dark', 'constructor')); ?></div>
        </a>
        <a href="#" title="<?php echo attribute_escape(__('Light', 'constructor')); ?>" name="light" <?php if($constructor['opacity'] == 'light') echo 'class="selected"'; ?>>
            <div class="light"><?php echo attribute_escape(__('Light', 'constructor')); ?></div>
        </a>
    </td>
</tr>
<tr>
    <th scope="row" valign="top"><?php _e('Elements Colors', 'constructor'); ?></th>
    <td class="color-selector">
        <div id="color_bg" class="color"><div style="background-color: <?php echo $constructor['color']['bg'] ?>"></div></div>
        - <?php echo attribute_escape(__('background', 'constructor')); ?>
        <br class="clear"/>
        <div id="color_bg2" class="color"><div style="background-color: <?php echo $constructor['color']['bg2'] ?>"></div></div>
        - <?php echo attribute_escape(__('background alternative', 'constructor')); ?>
        <br class="clear"/>
        <div id="color_text" class="color"><div style="background-color: <?php echo $constructor['color']['text'] ?>"></div></div>
        - <?php echo attribute_escape(__('text', 'constructor')); ?>
        <br class="clear"/>
        <div id="color_text2" class="color"><div style="background-color: <?php echo $constructor['color']['text2'] ?>"></div></div>
        - <?php echo attribute_escape(__('text alternative', 'constructor')); ?>
        <br class="clear"/>
        <div id="color_border" class="color"><div style="background-color: <?php echo $constructor['color']['border'] ?>"></div></div>
        - <?php echo attribute_escape(__('border', 'constructor')); ?>
        <br class="clear"/>
        <div id="color_border2" class="color"><div style="background-color: <?php echo $constructor['color']['border2'] ?>"></div></div>
        - <?php echo attribute_escape(__('border alternative', 'constructor')); ?>
        <br class="clear"/>
        <div id="color_header1" class="color"><div style="background-color: <?php echo $constructor['color']['header1'] ?>"></div></div>
        - <?php echo attribute_escape(__('tags', 'constructor')); ?> H1, H2, HR, A:hover
        <br class="clear"/>
        <div id="color_header2" class="color"><div style="background-color: <?php echo $constructor['color']['header2'] ?>"></div></div>
        - <?php echo attribute_escape(__('tags', 'constructor')); ?> H3, H4
        <br class="clear"/>
        <div id="color_header3" class="color"><div style="background-color: <?php echo $constructor['color']['header3'] ?>"></div></div>
        - <?php echo attribute_escape(__('tags', 'constructor')); ?> H5, H6, TH
        <br class="clear"/>
    </td>
</tr>
</table>