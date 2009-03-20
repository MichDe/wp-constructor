<?php __('Slideshow', 'constructor'); // requeried for correct translation 
    global $nggdb;
?>
<input type="hidden" id="constructor-slideshow" name="constructor[slideshow][id]" value="<?php echo $constructor['slideshow']['id']?>"/>
<table class="form-table">
    <?php
    if ($nggdb) :
        $gallerylist = $nggdb->find_all_galleries();
    ?>
    <tr>
        <th scope="row" valign="top" rowspan="3"><?php _e('Slideshow', 'constructor'); ?> (<em><small><?php _e('use <a href="http://wordpress.org/extend/plugins/nextgen-gallery/">NextGEN-Gallery</a>', 'constructor');?></small></em>)</th>
        <td>
            <label for="constructor-slideshow-height"><?php _e('Slideshow height', 'constructor'); ?> <em>(<?php _e('in px', 'constructor'); ?>)</em></label>
            <input type="text" id="constructor-slideshow-height" name="constructor[slideshow][height]" value="<?php echo $constructor['slideshow']['height']?>"/>
        </td>
    </tr>
    <tr>
        <td>
            <input type="checkbox" id="constructor-slideshow-onpage" name="constructor[slideshow][onpage]" value="1" <?php if ($constructor['slideshow']['onpage']) echo 'checked="checked"'; ?> />
            <label for="constructor-slideshow-onpage"><?php _e('Show on page', 'constructor')?></label>
            <br/>
            <input type="checkbox" id="constructor-slideshow-onsingle" name="constructor[slideshow][onsingle]" value="1" <?php if ($constructor['slideshow']['onsingle']) echo 'checked="checked"'; ?> />
            <label for="constructor-slideshow-onsingle"><?php _e('Show on single post', 'constructor')?></label>
        </td>
    </tr>
    <tr>
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
        <th scope="row" valign="top" colspan="2" class="th-full"><?php _e('If you want to display slideshow on homepage, please install <a href="http://wordpress.org/extend/plugins/nextgen-gallery/">NextGEN-Gallery</a> plugin', 'constructor'); ?></th>
    </tr>
    <?php
    endif;
    ?>
</table>