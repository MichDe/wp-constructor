<?php __('Images', 'constructor'); // requeried for correct translation ?>
<input type="hidden" id="constructor-images-wrap-pos" name="constructor[images][wrap][pos]" value="<?php echo $constructor['images']['wrap']['pos']?>"/>
<input type="hidden" id="constructor-images-sidebar-pos" name="constructor[images][sidebar][pos]" value="<?php echo $constructor['images']['sidebar']['pos']?>"/>
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
        <th scope="row" valign="top"><?php _e('Background Gradient', 'constructor'); ?> <br/><small><?php _e('repeat by X', 'constructor'); ?></small></th>
        <td>
            <input type="text" name="constructor[images][body][src]" value="<?php echo $constructor['images']['body']['src']?>"/>
            <?php if($constructor['images']['body']['src']) : ?>
            (<a class="thickbox" href="<?php echo $directory_uri .'/'.$constructor['images']['body']['src']; ?>"><?php _e('preview', 'constructor'); ?></a>)
            <?php endif; ?>
            <?php if ($upload) : ?><input type="file" name="constructor[images][body][src]"/><?php endif; ?>
        </td>
    </tr>
    <tr>
        <th scope="row" valign="top"><?php _e('Background Image', 'constructor'); ?></th>
        <td>
            <input type="text" name="constructor[images][wrap][src]" value="<?php echo $constructor['images']['wrap']['src']?>"/>
            <?php if($constructor['images']['wrap']['src']) : ?>
            (<a class="thickbox" href="<?php echo $directory_uri .'/'.$constructor['images']['wrap']['src']; ?>"><?php _e('preview', 'constructor'); ?></a>)
            <?php endif; ?>
            <?php if ($upload) : ?><input type="file" name="constructor[images][wrap][src]"/><?php endif; ?>
        </td>
    </tr>
    <tr>
        <th scope="row" valign="top"><?php _e('Image Position', 'constructor'); ?></th>
        <td class="position select" id="images-wrap-pos">
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
    </tr>
    <tr>
        <th scope="row" valign="top"><?php _e('Content Image', 'constructor'); ?> <br/><small><?php _e('repeat by Y and w/out opacity', 'constructor'); ?></small></th>
        <td>
            <input type="text" name="constructor[images][wrapper][src]" value="<?php echo $constructor['images']['wrapper']['src']?>"/>
            <?php if($constructor['images']['wrapper']['src']) : ?>
            (<a class="thickbox" href="<?php echo $directory_uri .'/'.$constructor['images']['wrapper']['src']; ?>"><?php _e('preview', 'constructor'); ?></a>)
            <?php endif; ?>
            <?php if ($upload) : ?><input type="file" name="constructor[images][wrapper][src]"/><?php endif; ?>
        </td>
    </tr>
    <tr>
        <th scope="row" valign="top"><?php _e('Sidebar Image', 'constructor'); ?></th>
        <td>
            <input type="text" name="constructor[images][sidebar][src]" value="<?php echo $constructor['images']['sidebar']['src']?>"/>
            <?php if($constructor['images']['sidebar']['src']) : ?>
            (<a class="thickbox" href="<?php echo $directory_uri .'/'.$constructor['images']['sidebar']['src']; ?>"><?php _e('preview', 'constructor'); ?></a>)
            <?php endif; ?>
            <?php if ($upload) : ?><input type="file" name="constructor[images][sidebar][src]"/><?php endif; ?>
        </td>
    </tr>
    <tr>
        <th scope="row" valign="top"><?php _e('Image Position', 'constructor'); ?></th>
        <td class="position select" id="images-sidebar-pos">
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
    </tr>
    <tr>
        <th scope="row" valign="top"><?php _e('Footer Image', 'constructor'); ?></th>
        <td>
            <input type="text" name="constructor[images][footer][src]" value="<?php echo $constructor['images']['footer']['src']?>"/>
            <?php if($constructor['images']['footer']['src']) : ?>
            (<a class="thickbox" href="<?php echo $directory_uri .'/'.$constructor['images']['footer']['src']; ?>"><?php _e('preview', 'constructor'); ?></a>)
            <?php endif; ?>
            <?php if ($upload) : ?><input type="file" name="constructor[images][footer][src]"/><?php endif; ?>
        </td>
    </tr>
    <tr>
        <th scope="row" valign="top"><?php _e('Image Position', 'constructor'); ?></th>
        <td class="position select" id="images-footer-pos">
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
    </tr>
</table>