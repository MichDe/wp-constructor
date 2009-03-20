<?php __('Colors', 'constructor'); // requeried for correct translation ?>
<script type="text/javascript">
(function($){
$(document).ready(function(){
    // Init Color Picker
    function initColorPicker(el) {
        $('#'+el).ColorPicker({
            color:$('#constructor-'+el).val(),
            onChange: function (hsb, hex, rgb) {
                $('#constructor-'+el).val('#' + hex);
                $('#'+el+' div').css('backgroundColor', '#' + hex);
            }
        })
        .bind('keyup', function(){
            $(this).ColorPickerSetColor(this.value);
        });
    }

    initColorPicker('color_header1');
    initColorPicker('color_header2');
    initColorPicker('color_header3');

    initColorPicker('color_bg');
    initColorPicker('color_bg2');
    initColorPicker('color_title');
    initColorPicker('color_title2');
    initColorPicker('color_text');
    initColorPicker('color_text2');
    initColorPicker('color_border');
    initColorPicker('color_border2');
});
})(jQuery);
</script>

<input type="hidden" id="constructor-opacity" name="constructor[opacity]" value="<?php echo $constructor['opacity']?>"/>

<input type="hidden" id="constructor-color_title" name="constructor[color][title]" value="<?php echo $constructor['color']['title']?>"/>
<input type="hidden" id="constructor-color_title2" name="constructor[color][title2]" value="<?php echo $constructor['color']['title2']?>"/>

<input type="hidden" id="constructor-color_bg" name="constructor[color][bg]" value="<?php echo $constructor['color']['bg']?>"/>
<input type="hidden" id="constructor-color_bg2" name="constructor[color][bg2]" value="<?php echo $constructor['color']['bg2']?>"/>

<input type="hidden" id="constructor-color_text" name="constructor[color][text]" value="<?php echo $constructor['color']['text']?>"/>
<input type="hidden" id="constructor-color_text2" name="constructor[color][text2]" value="<?php echo $constructor['color']['text2']?>"/>

<input type="hidden" id="constructor-color_border" name="constructor[color][border]" value="<?php echo $constructor['color']['border']?>"/>
<input type="hidden" id="constructor-color_border2" name="constructor[color][border2]" value="<?php echo $constructor['color']['border2']?>"/>

<input type="hidden" id="constructor-color_header1" name="constructor[color][header1]" value="<?php echo $constructor['color']['header1']?>"/>
<input type="hidden" id="constructor-color_header2" name="constructor[color][header2]" value="<?php echo $constructor['color']['header2']?>"/>
<input type="hidden" id="constructor-color_header3" name="constructor[color][header3]" value="<?php echo $constructor['color']['header3']?>"/>
<input type="hidden" id="constructor-color_alt" name="constructor[color][alt]" value="<?php echo $constructor['color']['alt']?>"/>

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