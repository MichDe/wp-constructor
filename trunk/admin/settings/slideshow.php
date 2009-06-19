<?php
    __('Slideshow', 'constructor'); // requeried for correct translation
    global $nggdb;
?>
<script type="text/javascript">
/* <![CDATA[ */
(function($){
$(document).ready(function(){
    $("#constructor-slideshow-height-slider").slider({
        range: "min",
        value: <?php echo (int)$constructor['slideshow']['height']?>,
        min: 60,
        max: 600,
        slide: function(event, ui) {
            $("#constructor-slideshow-height").val(ui.value);
        }
    });
});
})(jQuery);
/* ]]> */
</script>
<input type="hidden" id="constructor-slideshow" name="constructor[slideshow][id]" value="<?php echo $constructor['slideshow']['id']?>"/>
<input type="hidden" id="constructor-slideshow-layout" name="constructor[slideshow][layout]" value="<?php echo $constructor['slideshow']['layout']?>"/>
<table class="form-table">
    <tr>
        <th scope="row" valign="top"><?php _e('Enable slideshow', 'constructor'); ?></th>
        <td>
            <input type="checkbox" id="constructor-slideshow" name="constructor[slideshow][flag]" value="1" <?php if (isset($constructor['slideshow']['flag']) && $constructor['slideshow']['flag']) echo 'checked="checked"'; ?>/> (<em><small><?php _e('by default use images from posts on current page', 'constructor');?></small></em>)
        </td>
    </tr>
    <tr>
        <th scope="row" valign="top" rowspan="3"><?php _e('Options', 'constructor'); ?></th>
        <td>
            <input type="checkbox" id="constructor-slideshow-onpage" name="constructor[slideshow][onpage]" value="1" <?php if (isset($constructor['slideshow']['onpage']) && $constructor['slideshow']['onpage']) echo 'checked="checked"'; ?> />
            <label for="constructor-slideshow-onpage"><?php _e('Show on page', 'constructor')?></label>
            <br/>
            <input type="checkbox" id="constructor-slideshow-onsingle" name="constructor[slideshow][onsingle]" value="1" <?php if (isset($constructor['slideshow']['onsingle']) && $constructor['slideshow']['onsingle']) echo 'checked="checked"'; ?> />
            <label for="constructor-slideshow-onsingle"><?php _e('Show on single post', 'constructor')?></label>
        </td>
    </tr>
    <tr>
        <td class="select" id="slideshow-layout">
            <a href="#" title="<?php echo attribute_escape(__('In Content', 'constructor')); ?>" name="in" <?php if($constructor['slideshow']['layout'] == 'in') echo 'class="selected"'; ?>>
                <img src="<?php echo $directory_uri ?>/admin/images/slideshow-in.png" alt="<?php echo attribute_escape(__('In Content', 'constructor')); ?>" />
            </a>

            <a href="#" title="<?php echo attribute_escape(__('Over Content', 'constructor')); ?>" name="over" <?php if($constructor['slideshow']['layout'] == 'over') echo 'class="selected"'; ?>>
                <img src="<?php echo $directory_uri ?>/admin/images/slideshow-over.png" alt="<?php echo attribute_escape(__('Over Content', 'constructor')); ?>" />
            </a>
        </td>
    </tr>
    <tr>
        <td>
            <p>
                <label for="constructor-slideshow-height"><?php _e('Height', 'constructor'); ?>:</label>
                <input type="text" id="constructor-slideshow-height" name="constructor[slideshow][height]" value="<?php echo $constructor['slideshow']['height']?>" style="border:0; color:#21759B; font-weight:bold; width:36px" /> px
            </p>

            <div id="constructor-slideshow-height-slider"  style="width:200px;"></div>
        </td>
    </tr>
    <?php
    if ($nggdb) :
        $gallerylist = $nggdb->find_all_galleries();
    ?>
    <tr>
        <th scope="row" valign="top" ><?php _e('Slideshow', 'constructor'); ?> (<em><small><?php _e('use <a href="http://wordpress.org/extend/plugins/nextgen-gallery/">NextGEN-Gallery</a>', 'constructor');?></small></em>)</th>
        <td class="select" id="slideshow">
            <a href="#" title="<?php _e('Disable', 'constructor'); ?>" name="0" <?php if($constructor['slideshow']['id'] == 0) echo 'class="selected"'; ?>>
                <img src="<?php echo $directory_uri ?>/admin/images/disable.png" title="<?php _e('Disable', 'constructor'); ?>" alt="<?php _e('Disable', 'constructor'); ?>"/>
            </a>
            <?php foreach ($gallerylist as $gallery) :?>
                <?php $img = nggdb::find_image($gallery->previewpic); ?>
                <a href="#" title="<?php echo $gallery->title ?>" name="<?php echo $gallery->gid ?>" <?php if($constructor['slideshow']['id'] == $gallery->gid) echo 'class="selected"'; ?>>
                <img src="<?php echo $img->thumbURL ?>" title="<?php echo $gallery->title ?>" alt="<?php echo $gallery->title ?>"/>
                </a>
            <?php endforeach;?>
        </td>
    </tr>
    <?php
    else :
    ?>
    <tr>
        <th scope="row" valign="top" colspan="2" class="th-full"><?php _e('You can use <a href="http://wordpress.org/extend/plugins/nextgen-gallery/">NextGEN-Gallery</a> plugin for build custom slideshow', 'constructor'); ?></th>
    </tr>
    <?php
    endif;
    ?>
</table>