<?php __('Images', 'constructor'); // requeried for correct translation ?>
<input type="hidden" id="constructor-images-body-repeat" name="constructor[images][body][repeat]" value="<?php echo $constructor['images']['body']['repeat']?>"/>
<input type="hidden" id="constructor-images-body-pos" name="constructor[images][body][pos]" value="<?php echo $constructor['images']['body']['pos']?>"/>
<input type="hidden" id="constructor-images-wrap-repeat" name="constructor[images][wrap][repeat]" value="<?php echo $constructor['images']['wrap']['repeat']?>"/>
<input type="hidden" id="constructor-images-wrap-pos" name="constructor[images][wrap][pos]" value="<?php echo $constructor['images']['wrap']['pos']?>"/>
<input type="hidden" id="constructor-images-wrapper-repeat" name="constructor[images][wrapper][repeat]" value="<?php echo $constructor['images']['wrapper']['repeat']?>"/>
<input type="hidden" id="constructor-images-wrapper-pos" name="constructor[images][wrapper][pos]" value="<?php echo $constructor['images']['wrapper']['pos']?>"/>
<input type="hidden" id="constructor-images-header-repeat" name="constructor[images][header][repeat]" value="<?php echo $constructor['images']['header']['repeat']?>"/>
<input type="hidden" id="constructor-images-header-pos" name="constructor[images][header][pos]" value="<?php echo $constructor['images']['header']['pos']?>"/>
<input type="hidden" id="constructor-images-sidebar-repeat" name="constructor[images][sidebar][repeat]" value="<?php echo $constructor['images']['sidebar']['repeat']?>"/>
<input type="hidden" id="constructor-images-sidebar-pos" name="constructor[images][sidebar][pos]" value="<?php echo $constructor['images']['sidebar']['pos']?>"/>
<input type="hidden" id="constructor-images-extrabar-repeat" name="constructor[images][extrabar][repeat]" value="<?php echo $constructor['images']['extrabar']['repeat']?>"/>
<input type="hidden" id="constructor-images-extrabar-pos" name="constructor[images][extrabar][pos]" value="<?php echo $constructor['images']['extrabar']['pos']?>"/>
<input type="hidden" id="constructor-images-footer-repeat" name="constructor[images][footer][repeat]" value="<?php echo $constructor['images']['footer']['repeat']?>"/>
<input type="hidden" id="constructor-images-footer-pos" name="constructor[images][footer][pos]" value="<?php echo $constructor['images']['footer']['pos']?>"/>
<!-- wrappers -->
<input type="hidden" id="constructor-images-wrapheader-repeat" name="constructor[images][wrapheader][repeat]" value="<?php echo $constructor['images']['wrapheader']['repeat']?>"/>
<input type="hidden" id="constructor-images-wrapheader-pos" name="constructor[images][wrapheader][pos]" value="<?php echo $constructor['images']['wrapheader']['pos']?>"/>
<input type="hidden" id="constructor-images-wrapcontent-repeat" name="constructor[images][wrapcontent][repeat]" value="<?php echo $constructor['images']['wrapcontent']['repeat']?>"/>
<input type="hidden" id="constructor-images-wrapcontent-pos" name="constructor[images][wrapcontent][pos]" value="<?php echo $constructor['images']['wrapcontent']['pos']?>"/>
<input type="hidden" id="constructor-images-wrapfooter-repeat" name="constructor[images][wrapfooter][repeat]" value="<?php echo $constructor['images']['wrapfooter']['repeat']?>"/>
<input type="hidden" id="constructor-images-wrapfooter-pos" name="constructor[images][wrapfooter][pos]" value="<?php echo $constructor['images']['wrapfooter']['pos']?>"/>

<div class="constructor-admin-help" title="<?php _e('Help', 'constructor'); ?>" name="Images">
    <div id="constructor-layers">
        <ol>
            <li><?php _e('Body Image', 'constructor'); ?></li>
            <li><?php _e('Background Image', 'constructor'); ?></li>
            <li><?php _e('Header Wrapper Image', 'constructor'); ?></li>
            <li><?php _e('Content Wrapper Image', 'constructor'); ?></li>
            <li><?php _e('Footer Wrapper Image', 'constructor'); ?></li>
            <li><?php _e('Header Image', 'constructor'); ?></li>
            <li><?php _e('Content Image', 'constructor'); ?></li>
            <li><?php _e('Footer Image', 'constructor'); ?></li>
            <li><?php _e('Sidebar Image', 'constructor'); ?></li>
        </ol>
    </div>
</div>

<table class="form-table">
    <?php
    $upload = true;
    if (!is_writable(CONSTRUCTOR_DIRECTORY.'/images/')) : $upload = false;
    ?>
    <tr>
        <th scope="row" valign="top" colspan="3" class="th-full updated"><?php printf(__('<font color="red"><b>Warning!</b></font>: Directory "%s" is not writable.', 'constructor'), CONSTRUCTOR_DIRECTORY.'/images/'); ?></th>
    </tr>
    <?php endif; ?>
    <tr>
        <th scope="row" valign="top" rowspan="3"><?php _e('Body Image', 'constructor'); ?> (<em><a href="#" class="help-button" title="<?php _e('Help', 'constructor'); ?>">?</a></em>)</th>
        <?php constructor_admin_image_src('body', $upload) ?>
    </tr>
    <tr>
        <td colspan="2">
			<input type="checkbox" id="constructor-images-body-fixed" name="constructor[images][body][fixed]" value="1" <?php if($constructor['images']['body']['fixed']) : ?>checked="checked" <?php endif; ?>/>
			<label for="constructor-images-body-fixed"><?php _e('Fixed position', 'constructor')?></label>
        </td>
    </tr>
    <tr>
        <?php constructor_admin_image('body') ?>
    </tr>

    <tr>
        <th scope="row" valign="top" rowspan="3"><?php _e('Background Image', 'constructor'); ?> (<em><a href="#" class="help-button" title="<?php _e('Help', 'constructor'); ?>">?</a></em>)</th>
        <?php constructor_admin_image_src('wrap', $upload) ?>
    </tr>
    <tr>
        <td colspan="2">
			<input type="checkbox" id="constructor-images-wrap-fixed" name="constructor[images][wrap][fixed]" value="1" <?php if($constructor['images']['wrap']['fixed']) : ?>checked="checked" <?php endif; ?>/>
			<label for="constructor-images-wrap-fixed"><?php _e('Fixed position', 'constructor')?></label>
        </td>
    </tr>
    <tr>
        <?php constructor_admin_image('wrap') ?>
    </tr>

    <tr>
        <th scope="row" valign="top" rowspan="2"><?php _e('Header Wrapper Image', 'constructor'); ?> (<em><a href="#" class="help-button" title="<?php _e('Help', 'constructor'); ?>">?</a></em>)</th>
        <?php constructor_admin_image_src('wrapheader', $upload) ?>
    </tr>
    <tr>
        <?php constructor_admin_image('wrapheader') ?>
    </tr>
    
    <tr>
        <th scope="row" valign="top" rowspan="2"><?php _e('Header Image', 'constructor'); ?> (<em><a href="#" class="help-button" title="<?php _e('Help', 'constructor'); ?>">?</a></em>)</th>
        <?php constructor_admin_image_src('header', $upload) ?>
    </tr>
    <tr>
        <?php constructor_admin_image('header') ?>
    </tr>
    
    <tr>
        <th scope="row" valign="top" rowspan="2"><?php _e('Content Wrapper Image', 'constructor'); ?> (<em><a href="#" class="help-button" title="<?php _e('Help', 'constructor'); ?>">?</a></em>)</th>
        <?php constructor_admin_image_src('wrapcontent', $upload) ?>
    </tr>
    <tr>
        <?php constructor_admin_image('wrapcontent') ?>
    </tr>
    
    <tr>
        <th scope="row" valign="top" rowspan="2"><?php _e('Content Image', 'constructor'); ?> (<em><a href="#" class="help-button" title="<?php _e('Help', 'constructor'); ?>">?</a></em>)</th>
        <?php constructor_admin_image_src('wrapper', $upload) ?>
    </tr>
    <tr>
        <?php constructor_admin_image('wrapper') ?>
    </tr>
    
    <tr>
        <th scope="row" valign="top" rowspan="2"><?php _e('Sidebar Image', 'constructor'); ?> (<em><a href="#" class="help-button" title="<?php _e('Help', 'constructor'); ?>">?</a></em>)</th>
        <?php constructor_admin_image_src('sidebar', $upload) ?>
    </tr>
    <tr>
        <?php constructor_admin_image('sidebar') ?>
    </tr>
    <tr>
        <th scope="row" valign="top" rowspan="2"><?php _e('Extrabar Image', 'constructor'); ?> (<em><a href="#" class="help-button" title="<?php _e('Help', 'constructor'); ?>">?</a></em>)</th>
        <?php constructor_admin_image_src('extrabar', $upload) ?>
    </tr>
    <tr>
        <?php constructor_admin_image('extrabar') ?>
    </tr>
    
    <tr>
        <th scope="row" valign="top" rowspan="2"><?php _e('Footer Wrapper Image', 'constructor'); ?> (<em><a href="#" class="help-button" title="<?php _e('Help', 'constructor'); ?>">?</a></em>)</th>
        <?php constructor_admin_image_src('wrapcontent', $upload) ?>
    </tr>
    <tr>
        <?php constructor_admin_image('wrapcontent') ?>
    </tr>
    
    <tr>
        <th scope="row" valign="top" rowspan="2"><?php _e('Footer Image', 'constructor'); ?> (<em><a href="#" class="help-button" title="<?php _e('Help', 'constructor'); ?>">?</a></em>)</th>
        <?php constructor_admin_image_src('footer', $upload) ?>
    </tr>
    <tr>
        <?php constructor_admin_image('footer') ?>
    </tr>
</table>

<?php 

/**
 * Return string for build options
 *
 * @param  string $key
 * @return string
 */
function constructor_admin_image_src($key, $upload) 
{
    global $constructor;
    ?>
    <td colspan="2">
        <input type="text" name="constructor[images][<?php echo $key?>][src]" value="<?php echo $constructor['images'][$key]['src']?>"/>
        <?php if ($upload) : ?><input type="file" name="constructor[images][<?php echo $key?>][src]"/><?php endif; ?>
        <?php if ($constructor['images'][$key]['src']) : ?>
            (<a class="thickbox" href="<?php echo CONSTRUCTOR_DIRECTORY_URI .'/'.$constructor['images'][$key]['src']; ?>" title="<?php _e('Preview image', 'constructor'); ?>"><?php _e('preview', 'constructor'); ?></a>, 
             <a href="#" class="clear-link" title="<?php _e('Remove image (only from theme)', 'constructor'); ?>"><?php _e('clear', 'constructor'); ?></a>)
        <?php endif; ?>
    </td>
    <?php
}

/**
 * Return string for build options
 *
 * @param  string $key
 * @return string
 */
function constructor_admin_image($key) 
{
    global $constructor;
    ?>
    <td class="position select" id="images-<?php echo $key?>-pos">
        <p><?php _e('Image Position', 'constructor'); ?></p>
        <a href="#" title="<?php _e('Top Left', 'constructor'); ?>" name="left top" <?php if($constructor['images'][$key]['pos'] == 'left top') echo 'class="selected"'; ?>> </a>
        <a href="#" title="<?php _e('Top Center', 'constructor'); ?>" name="center top" <?php if($constructor['images'][$key]['pos'] == 'center top') echo 'class="selected"'; ?>> </a>
        <a href="#" title="<?php _e('Top Right', 'constructor'); ?>" name="right top" <?php if($constructor['images'][$key]['pos'] == 'right top') echo 'class="selected"'; ?>> </a>

        <br class="clear"/>

        <a href="#" title="<?php _e('Center Left', 'constructor'); ?>" name="left center" <?php if($constructor['images'][$key]['pos'] == 'left center') echo 'class="selected"'; ?>> </a>
        <a href="#" title="<?php _e('Center Center', 'constructor'); ?>" name="center center" <?php if($constructor['images'][$key]['pos'] == 'center center') echo 'class="selected"'; ?>> </a>
        <a href="#" title="<?php _e('Center Right', 'constructor'); ?>" name="right center" <?php if($constructor['images'][$key]['pos'] == 'right center') echo 'class="selected"'; ?>> </a>

        <br class="clear"/>

        <a href="#" title="<?php _e('Bottom Left', 'constructor'); ?>" name="left bottom" <?php if($constructor['images'][$key]['pos'] == 'left bottom') echo 'class="selected"'; ?>> </a>
        <a href="#" title="<?php _e('Bottom Center', 'constructor'); ?>" name="center bottom" <?php if($constructor['images'][$key]['pos'] == 'center bottom') echo 'class="selected"'; ?>> </a>
        <a href="#" title="<?php _e('Bottom Right', 'constructor'); ?>" name="right bottom" <?php if($constructor['images'][$key]['pos'] == 'right bottom') echo 'class="selected"'; ?>> </a>
     </td>
    <td class="repeat select" id="images-<?php echo $key?>-repeat">
        <p><?php _e('Image Repeat', 'constructor'); ?></p>
        <a href="#" title="<?php _e('No Repeat', 'constructor'); ?>" name="no-repeat" class="norepeat <?php if($constructor['images'][$key]['repeat'] == 'no-repeat') echo 'selected'; ?>"> </a>
        <a href="#" title="<?php _e('Repeat Horizontal', 'constructor'); ?>" name="repeat-x" class="repeatx <?php if($constructor['images'][$key]['repeat'] == 'repeat-x') echo 'selected'; ?>"> </a>
        <br class="clear"/>
        <a href="#" title="<?php _e('Repeat Vertical', 'constructor'); ?>" name="repeat-y" class="repeaty <?php if($constructor['images'][$key]['repeat'] == 'repeat-y') echo 'selected'; ?>"> </a>
        <a href="#" title="<?php _e('Tile', 'constructor'); ?>" name="repeat" class="repeat <?php if ($constructor['images'][$key]['repeat'] == 'repeat') echo 'selected'; ?>"> </a>
    </td>
    <?php
}
?>