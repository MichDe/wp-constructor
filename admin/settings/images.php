<?php __('Images', 'constructor'); // requeried for correct translation ?>
<input type="hidden" id="constructor-images-body-repeat" name="constructor[images][body][repeat]" value="<?php echo $constructor['images']['body']['repeat']?>"/>
<input type="hidden" id="constructor-images-body-pos" name="constructor[images][body][pos]" value="<?php echo $constructor['images']['body']['pos']?>"/>
<input type="hidden" id="constructor-images-wrap-repeat" name="constructor[images][wrap][repeat]" value="<?php echo $constructor['images']['wrap']['repeat']?>"/>
<input type="hidden" id="constructor-images-wrap-pos" name="constructor[images][wrap][pos]" value="<?php echo $constructor['images']['wrap']['pos']?>"/>
<input type="hidden" id="constructor-images-wrapper-repeat" name="constructor[images][wrapper][repeat]" value="<?php echo $constructor['images']['wrapper']['repeat']?>"/>
<input type="hidden" id="constructor-images-wrapper-pos" name="constructor[images][wrapper][pos]" value="<?php echo $constructor['images']['wrapper']['pos']?>"/>
<input type="hidden" id="constructor-images-sidebar-repeat" name="constructor[images][sidebar][repeat]" value="<?php echo $constructor['images']['sidebar']['repeat']?>"/>
<input type="hidden" id="constructor-images-sidebar-pos" name="constructor[images][sidebar][pos]" value="<?php echo $constructor['images']['sidebar']['pos']?>"/>
<input type="hidden" id="constructor-images-extrabar-repeat" name="constructor[images][extrabar][repeat]" value="<?php echo $constructor['images']['extrabar']['repeat']?>"/>
<input type="hidden" id="constructor-images-extrabar-pos" name="constructor[images][extrabar][pos]" value="<?php echo $constructor['images']['extrabar']['pos']?>"/>
<input type="hidden" id="constructor-images-footer-repeat" name="constructor[images][footer][repeat]" value="<?php echo $constructor['images']['footer']['repeat']?>"/>
<input type="hidden" id="constructor-images-footer-pos" name="constructor[images][footer][pos]" value="<?php echo $constructor['images']['footer']['pos']?>"/>
<table class="form-table">
    <?php
    $upload = true;
    if (!is_writable($directory.'/images/')) : $upload = false;
    ?>
    <tr>
        <th scope="row" valign="top" colspan="2" class="th-full updated"><?php printf(__('<font color="red"><b>Warning!</b></font>: Directory "%s" is not writable.', 'constructor'), $directory.'/images/'); ?></th>
    </tr>
    <?php endif; ?>
    <tr>
        <th scope="row" valign="top" rowspan="3"><?php _e('Body Image', 'constructor'); ?></th>
        <td colspan="2">
            <input type="text" name="constructor[images][body][src]" value="<?php echo $constructor['images']['body']['src']?>"/>
            <?php if ($upload) : ?><input type="file" name="constructor[images][body][src]"/><?php endif; ?>
            <?php if($constructor['images']['body']['src']) : ?>
                (<a class="thickbox" href="<?php echo $template_uri .'/'.$constructor['images']['body']['src']; ?>" title="<?php _e('Preview image', 'constructor'); ?>"><?php _e('preview', 'constructor'); ?></a>, 
                 <a href="#" class="clear-link" title="<?php _e('Remove image (only from theme)', 'constructor'); ?>"><?php _e('clear', 'constructor'); ?></a>)
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">
			<input type="checkbox" id="constructor-images-body-fixed" name="constructor[images][body][fixed]" value="1" <?php if($constructor['images']['body']['fixed']) : ?>checked="checked" <?php endif; ?>/>
			<label for="constructor-images-body-fixed"><?php _e('Fixed position', 'constructor')?></label>
        </td>
    </tr>
    <tr>
    	<td class="position select" id="images-body-pos" width="180">
            <p><?php _e('Image Position', 'constructor'); ?></p>
            <a href="#" title="<?php _e('Top Left', 'constructor'); ?>" name="left top" <?php if($constructor['images']['body']['pos'] == 'left top') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Top Center', 'constructor'); ?>" name="center top" <?php if($constructor['images']['body']['pos'] == 'center top') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Top Right', 'constructor'); ?>" name="right top" <?php if($constructor['images']['body']['pos'] == 'right top') echo 'class="selected"'; ?>> </a>

            <br class="clear"/>

            <a href="#" title="<?php _e('Center Left', 'constructor'); ?>" name="left center" <?php if($constructor['images']['body']['pos'] == 'left center') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Center Center', 'constructor'); ?>" name="center center" <?php if($constructor['images']['body']['pos'] == 'center center') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Center Right', 'constructor'); ?>" name="right center" <?php if($constructor['images']['body']['pos'] == 'right center') echo 'class="selected"'; ?>> </a>

            <br class="clear"/>

            <a href="#" title="<?php _e('Bottom Left', 'constructor'); ?>" name="left bottom" <?php if($constructor['images']['body']['pos'] == 'left bottom') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Bottom Center', 'constructor'); ?>" name="center bottom" <?php if($constructor['images']['body']['pos'] == 'center bottom') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Bottom Right', 'constructor'); ?>" name="right bottom" <?php if($constructor['images']['body']['pos'] == 'right bottom') echo 'class="selected"'; ?>> </a>
        </td>
        <td class="repeat select" id="images-body-repeat">
            <p><?php _e('Image Repeat', 'constructor'); ?></p>
			<a href="#" title="<?php _e('No Repeat', 'constructor'); ?>" name="no-repeat" class="norepeat <?php if($constructor['images']['body']['repeat'] == 'no-repeat') echo 'selected'; ?>"> </a>
            <a href="#" title="<?php _e('Repeat Horizontal', 'constructor'); ?>" name="repeat-x" class="repeatx <?php if($constructor['images']['body']['repeat'] == 'repeat-x') echo 'selected'; ?>"> </a>
            <br class="clear"/>
            <a href="#" title="<?php _e('Repeat Vertical', 'constructor'); ?>" name="repeat-y" class="repeaty <?php if($constructor['images']['body']['repeat'] == 'repeat-y') echo 'selected'; ?>"> </a>
            <a href="#" title="<?php _e('Tile', 'constructor'); ?>" name="repeat" class="repeat <?php if($constructor['images']['body']['repeat'] == 'repeat') echo 'selected'; ?>"> </a>
        </td>
    </tr>

    <tr>
        <th scope="row" valign="top" rowspan="3"><?php _e('Background Image', 'constructor'); ?></th>
        <td colspan="2">
            <input type="text" name="constructor[images][wrap][src]" value="<?php echo $constructor['images']['wrap']['src']?>"/>
            <?php if ($upload) : ?><input type="file" name="constructor[images][wrap][src]"/><?php endif; ?>
            <?php if($constructor['images']['wrap']['src']) : ?>
                (<a class="thickbox" href="<?php echo $template_uri .'/'.$constructor['images']['wrap']['src']; ?>" title="<?php _e('Preview image', 'constructor'); ?>"><?php _e('preview', 'constructor'); ?></a>, 
                 <a href="#" class="clear-link" title="<?php _e('Remove image (only from theme)', 'constructor'); ?>"><?php _e('clear', 'constructor'); ?></a>)
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">
			<input type="checkbox" id="constructor-images-wrap-fixed" name="constructor[images][wrap][fixed]" value="1" <?php if($constructor['images']['wrap']['fixed']) : ?>checked="checked" <?php endif; ?>/>
			<label for="constructor-images-wrap-fixed"><?php _e('Fixed position', 'constructor')?></label>
        </td>
    </tr>
    <tr>
        <td class="position select" id="images-wrap-pos">
            <p><?php _e('Image Position', 'constructor'); ?></p>
            <a href="#" title="<?php _e('Top Left', 'constructor'); ?>" name="left top" <?php if($constructor['images']['wrap']['pos'] == 'left top') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Top Center', 'constructor'); ?>" name="center top" <?php if($constructor['images']['wrap']['pos'] == 'center top') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Top Right', 'constructor'); ?>" name="right top" <?php if($constructor['images']['wrap']['pos'] == 'right top') echo 'class="selected"'; ?>> </a>

            <br class="clear"/>

            <a href="#" title="<?php _e('Center Left', 'constructor'); ?>" name="left center" <?php if($constructor['images']['wrap']['pos'] == 'left center') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Center Center', 'constructor'); ?>" name="center center" <?php if($constructor['images']['wrap']['pos'] == 'center center') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Center Right', 'constructor'); ?>" name="right center" <?php if($constructor['images']['wrap']['pos'] == 'right center') echo 'class="selected"'; ?>> </a>

            <br class="clear"/>

            <a href="#" title="<?php _e('Bottom Left', 'constructor'); ?>" name="left bottom" <?php if($constructor['images']['wrap']['pos'] == 'left bottom') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Bottom Center', 'constructor'); ?>" name="center bottom" <?php if($constructor['images']['wrap']['pos'] == 'center bottom') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Bottom Right', 'constructor'); ?>" name="right bottom" <?php if($constructor['images']['wrap']['pos'] == 'right bottom') echo 'class="selected"'; ?>> </a>
        </td>
        <td class="repeat select" id="images-wrap-repeat">
            <p><?php _e('Image Repeat', 'constructor'); ?></p>
            <a href="#" title="<?php _e('No Repeat', 'constructor'); ?>" name="no-repeat" class="norepeat <?php if($constructor['images']['wrap']['repeat'] == 'no-repeat') echo 'selected'; ?>"> </a>
            <a href="#" title="<?php _e('Repeat Horizontal', 'constructor'); ?>" name="repeat-x" class="repeatx <?php if($constructor['images']['wrap']['repeat'] == 'repeat-x') echo 'selected'; ?>"> </a>
            <br class="clear"/>
            <a href="#" title="<?php _e('Repeat Vertical', 'constructor'); ?>" name="repeat-y" class="repeaty <?php if($constructor['images']['wrap']['repeat'] == 'repeat-y') echo 'selected'; ?>"> </a>
            <a href="#" title="<?php _e('Tile', 'constructor'); ?>" name="repeat" class="repeat <?php if($constructor['images']['wrap']['repeat'] == 'repeat') echo 'selected'; ?>"> </a>
        </td>
    </tr>


    <tr>
        <th scope="row" valign="top" rowspan="2"><?php _e('Content Image', 'constructor'); ?></th>
        <td colspan="2">
            <input type="text" name="constructor[images][wrapper][src]" value="<?php echo $constructor['images']['wrapper']['src']?>"/>
            <?php if ($upload) : ?><input type="file" name="constructor[images][wrapper][src]"/><?php endif; ?>
            <?php if($constructor['images']['wrapper']['src']) : ?>
                (<a class="thickbox" href="<?php echo $template_uri .'/'.$constructor['images']['wrapper']['src']; ?>" title="<?php _e('Preview image', 'constructor'); ?>"><?php _e('preview', 'constructor'); ?></a>, 
                 <a href="#" class="clear-link" title="<?php _e('Remove image (only from theme)', 'constructor'); ?>"><?php _e('clear', 'constructor'); ?></a>)
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <td class="position select" id="images-wrapper-pos">
            <p><?php _e('Image Position', 'constructor'); ?></p>
            <a href="#" title="<?php _e('Top Left', 'constructor'); ?>" name="left top" <?php if($constructor['images']['wrapper']['pos'] == 'left top') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Top Center', 'constructor'); ?>" name="center top" <?php if($constructor['images']['wrapper']['pos'] == 'center top') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Top Right', 'constructor'); ?>" name="right top" <?php if($constructor['images']['wrapper']['pos'] == 'right top') echo 'class="selected"'; ?>> </a>

            <br class="clear"/>

            <a href="#" title="<?php _e('Center Left', 'constructor'); ?>" name="left center" <?php if($constructor['images']['wrapper']['pos'] == 'left center') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Center Center', 'constructor'); ?>" name="center center" <?php if($constructor['images']['wrapper']['pos'] == 'center center') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Center Right', 'constructor'); ?>" name="right center" <?php if($constructor['images']['wrapper']['pos'] == 'right center') echo 'class="selected"'; ?>> </a>

            <br class="clear"/>

            <a href="#" title="<?php _e('Bottom Left', 'constructor'); ?>" name="left bottom" <?php if($constructor['images']['wrapper']['pos'] == 'left bottom') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Bottom Center', 'constructor'); ?>" name="center bottom" <?php if($constructor['images']['wrapper']['pos'] == 'center bottom') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Bottom Right', 'constructor'); ?>" name="right bottom" <?php if($constructor['images']['wrapper']['pos'] == 'right bottom') echo 'class="selected"'; ?>> </a>

        </td>
        <td class="repeat select" id="images-wrapper-repeat">
            <p><?php _e('Image Repeat', 'constructor'); ?></p>
            <a href="#" title="<?php _e('No Repeat', 'constructor'); ?>" name="no-repeat" class="norepeat <?php if($constructor['images']['wrapper']['repeat'] == 'no-repeat') echo 'selected'; ?>"> </a>
            <a href="#" title="<?php _e('Repeat Horizontal', 'constructor'); ?>" name="repeat-x" class="repeatx <?php if($constructor['images']['wrapper']['repeat'] == 'repeat-x') echo 'selected'; ?>"> </a>
            <br class="clear"/>
            <a href="#" title="<?php _e('Repeat Vertical', 'constructor'); ?>" name="repeat-y" class="repeaty <?php if($constructor['images']['wrapper']['repeat'] == 'repeat-y') echo 'selected'; ?>"> </a>
            <a href="#" title="<?php _e('Tile', 'constructor'); ?>" name="repeat" class="repeat <?php if($constructor['images']['wrapper']['repeat'] == 'repeat') echo 'selected'; ?>"> </a>
        </td>
    </tr>
    <tr>
        <th scope="row" valign="top" rowspan="2"><?php _e('Sidebar Image', 'constructor'); ?></th>
        <td colspan="2">
            <input type="text" name="constructor[images][sidebar][src]" value="<?php echo $constructor['images']['sidebar']['src']?>"/>
            <?php if ($upload) : ?><input type="file" name="constructor[images][sidebar][src]"/><?php endif; ?>
            <?php if($constructor['images']['sidebar']['src']) : ?>
                (<a class="thickbox" href="<?php echo $template_uri .'/'.$constructor['images']['sidebar']['src']; ?>" title="<?php _e('Preview image', 'constructor'); ?>"><?php _e('preview', 'constructor'); ?></a>, 
                 <a href="#" class="clear-link" title="<?php _e('Remove image (only from theme)', 'constructor'); ?>"><?php _e('clear', 'constructor'); ?></a>)
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <td class="position select" id="images-sidebar-pos">
            <p><?php _e('Image Position', 'constructor'); ?></p>
            <a href="#" title="<?php _e('Top Left', 'constructor'); ?>" name="left top" <?php if($constructor['images']['sidebar']['pos'] == 'left top') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Top Center', 'constructor'); ?>" name="center top" <?php if($constructor['images']['sidebar']['pos'] == 'center top') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Top Right', 'constructor'); ?>" name="right top" <?php if($constructor['images']['sidebar']['pos'] == 'right top') echo 'class="selected"'; ?>> </a>

            <br class="clear"/>

            <a href="#" title="<?php _e('Center Left', 'constructor'); ?>" name="left center" <?php if($constructor['images']['sidebar']['pos'] == 'left center') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Center Center', 'constructor'); ?>" name="center center" <?php if($constructor['images']['sidebar']['pos'] == 'center center') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Center Right', 'constructor'); ?>" name="right center" <?php if($constructor['images']['sidebar']['pos'] == 'right center') echo 'class="selected"'; ?>> </a>

            <br class="clear"/>

            <a href="#" title="<?php _e('Bottom Left', 'constructor'); ?>" name="left bottom" <?php if($constructor['images']['sidebar']['pos'] == 'left bottom') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Bottom Center', 'constructor'); ?>" name="center bottom" <?php if($constructor['images']['sidebar']['pos'] == 'center bottom') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Bottom Right', 'constructor'); ?>" name="right bottom" <?php if($constructor['images']['sidebar']['pos'] == 'right bottom') echo 'class="selected"'; ?>> </a>

        </td>
        <td class="repeat select" id="images-sidebar-repeat">
            <p><?php _e('Image Repeat', 'constructor'); ?></p>
            <a href="#" title="<?php _e('No Repeat', 'constructor'); ?>" name="no-repeat" class="norepeat <?php if($constructor['images']['sidebar']['repeat'] == 'no-repeat') echo 'selected'; ?>"> </a>
            <a href="#" title="<?php _e('Repeat Horizontal', 'constructor'); ?>" name="repeat-x" class="repeatx <?php if($constructor['images']['sidebar']['repeat'] == 'repeat-x') echo 'selected'; ?>"> </a>
            <br class="clear"/>
            <a href="#" title="<?php _e('Repeat Vertical', 'constructor'); ?>" name="repeat-y" class="repeaty <?php if($constructor['images']['sidebar']['repeat'] == 'repeat-y') echo 'selected'; ?>"> </a>
            <a href="#" title="<?php _e('Tile', 'constructor'); ?>" name="repeat" class="repeat <?php if($constructor['images']['sidebar']['repeat'] == 'repeat') echo 'selected'; ?>"> </a>
        </td>
    </tr>
    <tr>
        <th scope="row" valign="top" rowspan="2"><?php _e('Extrabar Image', 'constructor'); ?></th>
        <td colspan="2">
            <input type="text" name="constructor[images][extrabar][src]" value="<?php echo $constructor['images']['extrabar']['src']?>"/>
            <?php if ($upload) : ?><input type="file" name="constructor[images][extrabar][src]"/><?php endif; ?>
            <?php if($constructor['images']['extrabar']['src']) : ?>
                (<a class="thickbox" href="<?php echo $template_uri .'/'.$constructor['images']['extrabar']['src']; ?>" title="<?php _e('Preview image', 'constructor'); ?>"><?php _e('preview', 'constructor'); ?></a>, 
                 <a href="#" class="clear-link" title="<?php _e('Remove image (only from theme)', 'constructor'); ?>"><?php _e('clear', 'constructor'); ?></a>)
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <td class="position select" id="images-extrabar-pos">
            <p><?php _e('Image Position', 'constructor'); ?></p>
            <a href="#" title="<?php _e('Top Left', 'constructor'); ?>" name="left top" <?php if($constructor['images']['extrabar']['pos'] == 'left top') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Top Center', 'constructor'); ?>" name="center top" <?php if($constructor['images']['extrabar']['pos'] == 'center top') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Top Right', 'constructor'); ?>" name="right top" <?php if($constructor['images']['extrabar']['pos'] == 'right top') echo 'class="selected"'; ?>> </a>

            <br class="clear"/>

            <a href="#" title="<?php _e('Center Left', 'constructor'); ?>" name="left center" <?php if($constructor['images']['extrabar']['pos'] == 'left center') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Center Center', 'constructor'); ?>" name="center center" <?php if($constructor['images']['extrabar']['pos'] == 'center center') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Center Right', 'constructor'); ?>" name="right center" <?php if($constructor['images']['extrabar']['pos'] == 'right center') echo 'class="selected"'; ?>> </a>

            <br class="clear"/>

            <a href="#" title="<?php _e('Bottom Left', 'constructor'); ?>" name="left bottom" <?php if($constructor['images']['extrabar']['pos'] == 'left bottom') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Bottom Center', 'constructor'); ?>" name="center bottom" <?php if($constructor['images']['extrabar']['pos'] == 'center bottom') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Bottom Right', 'constructor'); ?>" name="right bottom" <?php if($constructor['images']['extrabar']['pos'] == 'right bottom') echo 'class="selected"'; ?>> </a>

        </td>
        <td class="repeat select" id="images-extrabar-repeat">
            <p><?php _e('Image Repeat', 'constructor'); ?></p>
            <a href="#" title="<?php _e('No Repeat', 'constructor'); ?>" name="no-repeat" class="norepeat <?php if($constructor['images']['extrabar']['repeat'] == 'no-repeat') echo 'selected'; ?>"> </a>
            <a href="#" title="<?php _e('Repeat Horizontal', 'constructor'); ?>" name="repeat-x" class="repeatx <?php if($constructor['images']['extrabar']['repeat'] == 'repeat-x') echo 'selected'; ?>"> </a>
            <br class="clear"/>
            <a href="#" title="<?php _e('Repeat Vertical', 'constructor'); ?>" name="repeat-y" class="repeaty <?php if($constructor['images']['extrabar']['repeat'] == 'repeat-y') echo 'selected'; ?>"> </a>
            <a href="#" title="<?php _e('Tile', 'constructor'); ?>" name="repeat" class="repeat <?php if($constructor['images']['extrabar']['repeat'] == 'repeat') echo 'selected'; ?>"> </a>
        </td>
    </tr>
    <tr>
        <th scope="row" valign="top" rowspan="2"><?php _e('Footer Image', 'constructor'); ?></th>
        <td colspan="2">
            <input type="text" name="constructor[images][footer][src]" value="<?php echo $constructor['images']['footer']['src']?>"/>
            <?php if ($upload) : ?><input type="file" name="constructor[images][footer][src]"/><?php endif; ?>
            <?php if($constructor['images']['footer']['src']) : ?>
                (<a class="thickbox" href="<?php echo $template_uri .'/'.$constructor['images']['footer']['src']; ?>" title="<?php _e('Preview image', 'constructor'); ?>"><?php _e('preview', 'constructor'); ?></a>, 
                 <a href="#" class="clear-link" title="<?php _e('Remove image (only from theme)', 'constructor'); ?>"><?php _e('clear', 'constructor'); ?></a>)
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <td class="position select" id="images-footer-pos">
            <p><?php _e('Image Position', 'constructor'); ?></p>
            <a href="#" title="<?php _e('Top Left', 'constructor'); ?>" name="left top" <?php if($constructor['images']['footer']['pos'] == 'left top') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Top Center', 'constructor'); ?>" name="center top" <?php if($constructor['images']['footer']['pos'] == 'center top') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Top Right', 'constructor'); ?>" name="right top" <?php if($constructor['images']['footer']['pos'] == 'right top') echo 'class="selected"'; ?>> </a>

            <br class="clear"/>

            <a href="#" title="<?php _e('Center Left', 'constructor'); ?>" name="left center" <?php if($constructor['images']['footer']['pos'] == 'left center') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Center Center', 'constructor'); ?>" name="center center" <?php if($constructor['images']['footer']['pos'] == 'center center') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Center Right', 'constructor'); ?>" name="right center" <?php if($constructor['images']['footer']['pos'] == 'right center') echo 'class="selected"'; ?>> </a>

            <br class="clear"/>

            <a href="#" title="<?php _e('Bottom Left', 'constructor'); ?>" name="left bottom" <?php if($constructor['images']['footer']['pos'] == 'left bottom') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Bottom Center', 'constructor'); ?>" name="center bottom" <?php if($constructor['images']['footer']['pos'] == 'center bottom') echo 'class="selected"'; ?>> </a>
            <a href="#" title="<?php _e('Bottom Right', 'constructor'); ?>" name="right bottom" <?php if($constructor['images']['footer']['pos'] == 'right bottom') echo 'class="selected"'; ?>> </a>
         </td>
        <td class="repeat select" id="images-footer-repeat">
            <p><?php _e('Image Repeat', 'constructor'); ?></p>
            <a href="#" title="<?php _e('No Repeat', 'constructor'); ?>" name="no-repeat" class="norepeat <?php if($constructor['images']['footer']['repeat'] == 'no-repeat') echo 'selected'; ?>"> </a>
            <a href="#" title="<?php _e('Repeat Horizontal', 'constructor'); ?>" name="repeat-x" class="repeatx <?php if($constructor['images']['footer']['repeat'] == 'repeat-x') echo 'selected'; ?>"> </a>
            <br class="clear"/>
            <a href="#" title="<?php _e('Repeat Vertical', 'constructor'); ?>" name="repeat-y" class="repeaty <?php if($constructor['images']['footer']['repeat'] == 'repeat-y') echo 'selected'; ?>"> </a>
            <a href="#" title="<?php _e('Tile', 'constructor'); ?>" name="repeat" class="repeat <?php if($constructor['images']['footer']['repeat'] == 'repeat') echo 'selected'; ?>"> </a>
        </td>
    </tr>
</table>