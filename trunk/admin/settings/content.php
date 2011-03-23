<?php __('Content', 'constructor'); // requeried for correct translation ?>

<table class="form-table">
<tr>
    <th rowspan="5" scope="row" valign="top"><?php _e('Meta information', 'constructor'); ?></th>
    <td>
        <input type="checkbox" id="constructor-content-date" name="constructor[content][date]" value="1" <?php if (isset($constructor['content']['date']) && $constructor['content']['date'] == 1) echo 'checked="checked"'; ?> />
        <label for="constructor-content-date"><?php _e('Show post date', 'constructor'); ?></label>
    </td>
    <td rowspan="5" valign="top" class="updated quick-links" width="320px">
    <h3><?php _e('Help', 'constructor'); ?></h3>
        <?php _e('Use this options to control what meta information is shown', 'constructor'); ?>

    </td>
</tr>
<tr>
    <td>
        <input type="checkbox" id="constructor-content-links-author" name="constructor[content][links][author]" value="1" <?php if (isset($constructor['content']['links']['author']) && $constructor['content']['links']['author'] == 1) echo 'checked="checked"'; ?> />
        <label for="constructor-content-links-author"><?php _e('Link to author page', 'constructor'); ?></label>
    </td>
</tr>
<tr>
    <td>
        <input type="checkbox" id="constructor-content-links-category" name="constructor[content][links][category]" value="1" <?php if (isset($constructor['content']['links']['category']) && $constructor['content']['links']['category'] == 1) echo 'checked="checked"'; ?> />
        <label for="constructor-content-links-category"><?php _e('List of categories', 'constructor'); ?></label>
    </td>
</tr>
<tr>
    <td>
        <input type="checkbox" id="constructor-content-links-tags" name="constructor[content][links][category]" value="1" <?php if (isset($constructor['content']['links']['tags']) && $constructor['content']['links']['tags'] == 1) echo 'checked="checked"'; ?> />
        <label for="constructor-content-links-tags"><?php _e('List of tags', 'constructor'); ?></label>
    </td>
</tr>
<tr>
    <td>
        <input type="checkbox" id="constructor-content-links-comments" name="constructor[content][links][comments]" value="1" <?php if (isset($constructor['content']['links']['comments']) && $constructor['content']['links']['comments'] == 1) echo 'checked="checked"'; ?> />
        <label for="constructor-content-links-comments"><?php _e('Link to comments', 'constructor'); ?></label>
    </td>
</tr>

<tr>
    <th rowspan="5" scope="row" valign="top">
        <?php _e('Sharing Icons', 'constructor'); ?><br/>
    </th>
    <td>
        <input type="checkbox" id="constructor-content-social-twitter" name="constructor[content][social][twitter]" value="1" <?php if (isset($constructor['content']['social']['twitter']) && $constructor['content']['social']['twitter'] == 1) echo 'checked="checked"'; ?> />
        <label for="constructor-content-social-twitter"><?php _e('Twitter', 'constructor'); ?></label>
        &nbsp;
        <input type="checkbox" id="constructor-content-social-facebook" name="constructor[content][social][facebook]" value="1" <?php if (isset($constructor['content']['social']['facebook']) && $constructor['content']['social']['facebook'] == 1) echo 'checked="checked"'; ?> />
        <label for="constructor-content-social-facebook"><?php _e('Facebook', 'constructor'); ?></label>
    </td>
    <td rowspan="5" valign="top" class="updated quick-links">
    <?php _e('Select which service you would like to use for sharing', 'constructor')?>
    </td>
</tr>
<tr>
    <td>
        <input type="checkbox" id="constructor-content-social-delicious" name="constructor[content][social][delicious]" value="1" <?php if (isset($constructor['content']['social']['delicious']) && $constructor['content']['social']['delicious'] == 1) echo 'checked="checked"'; ?> />
        <label for="constructor-content-social-delicious"><?php _e('Del.icio.us', 'constructor'); ?></label>
        &nbsp;
        <input type="checkbox" id="constructor-content-social-reddit" name="constructor[content][social][reddit]" value="1" <?php if (isset($constructor['content']['social']['reddit']) && $constructor['content']['social']['reddit'] == 1) echo 'checked="checked"'; ?> />
        <label for="constructor-content-social-reddit"><?php _e('Reddit', 'constructor'); ?></label>
    </td>
</tr>
<tr>
    <td>
        <input type="checkbox" id="constructor-content-social-google" name="constructor[content][social][google]" value="1" <?php if (isset($constructor['content']['social']['google']) && $constructor['content']['social']['google'] == 1) echo 'checked="checked"'; ?> />
        <label for="constructor-content-social-google"><?php _e('Google', 'constructor'); ?></label>
        &nbsp;
        <input type="checkbox" id="constructor-content-social-digg" name="constructor[content][social][digg]" value="1" <?php if (isset($constructor['content']['social']['digg']) && $constructor['content']['social']['digg'] == 1) echo 'checked="checked"'; ?> />
        <label for="constructor-content-social-digg"><?php _e('Digg', 'constructor'); ?></label>
    </td>
</tr>
<tr>
    <td>
        <input type="checkbox" id="constructor-content-social-mixx" name="constructor[content][social][mixx]" value="1" <?php if (isset($constructor['content']['social']['mixx']) && $constructor['content']['social']['mixx'] == 1) echo 'checked="checked"'; ?> />
        <label for="constructor-content-social-mixx"><?php _e('Mixx', 'constructor'); ?></label>
        &nbsp;
        <input type="checkbox" id="constructor-content-social-stumbleupon" name="constructor[content][social][stumbleupon]" value="1" <?php if (isset($constructor['content']['social']['stumbleupon']) && $constructor['content']['social']['stumbleupon'] == 1) echo 'checked="checked"'; ?> />
        <label for="constructor-content-social-stumbleupon"><?php _e('StumbleUpon', 'constructor'); ?></label>
    </td>
</tr>
<tr>
    <td>
        <input type="checkbox" id="constructor-content-social-vkontakte" name="constructor[content][social][vkontakte]" value="1" <?php if (isset($constructor['content']['social']['vkontakte']) && $constructor['content']['social']['vkontakte'] == 1) echo 'checked="checked"'; ?> />
        <label for="constructor-content-social-vkontakte"><?php _e('VKontakte', 'constructor'); ?></label>
        &nbsp;
        <input type="checkbox" id="constructor-content-social-memori" name="constructor[content][social][memori]" value="1" <?php if (isset($constructor['content']['social']['memori']) && $constructor['content']['social']['memori'] == 1) echo 'checked="checked"'; ?> />
        <label for="constructor-content-social-memori"><?php _e('Memori', 'constructor'); ?></label>
    </td>
</tr>
<tr>
    <th scope="row" valign="top">
        <?php _e('Content widgets place', 'constructor'); ?><br/>
        <small><em><?php _e('can configured with <a href="widgets.php">widgets</a>, use "After N Post" sidebar', 'constructor'); ?></em></small>
    </th>
    <td>
		<fieldset>
			<legend>
				<input type="checkbox" id="constructor-content-widget-flag" name="constructor[content][widget][flag]" value="1" <?php if ($constructor['content']['widget']['flag']) echo 'checked="checked"'; ?> />
                <label for="constructor-content-widget-flag"><?php _e('Show widgets place', 'constructor'); ?></label>
			</legend>
			<dl>
				<dt><?php _e('Position', 'constructor'); ?></dt>
				<dd><select name="constructor[content][widget][after]" id="constructor-content-widget-after">
		                <option value="1" <?php if ($constructor['content']['widget']['after'] == 1) echo 'selected="selected"'; ?>><?php printf(__('after %d post', 'constructor'),1); ?></option>
		                <option value="2" <?php if ($constructor['content']['widget']['after'] == 2) echo 'selected="selected"'; ?>><?php printf(__('after %d post', 'constructor'),2); ?></option>
		                <option value="3" <?php if ($constructor['content']['widget']['after'] == 3) echo 'selected="selected"'; ?>><?php printf(__('after %d post', 'constructor'),3); ?></option>
		                <option value="4" <?php if ($constructor['content']['widget']['after'] == 4) echo 'selected="selected"'; ?>><?php printf(__('after %d post', 'constructor'),4); ?></option>
		                <option value="5" <?php if ($constructor['content']['widget']['after'] == 5) echo 'selected="selected"'; ?>><?php printf(__('after %d post', 'constructor'),5); ?></option>
		                <option value="6" <?php if ($constructor['content']['widget']['after'] == 6) echo 'selected="selected"'; ?>><?php printf(__('after %d post', 'constructor'),6); ?></option>
		                <option value="7" <?php if ($constructor['content']['widget']['after'] == 7) echo 'selected="selected"'; ?>><?php printf(__('after %d post', 'constructor'),7); ?></option>
		                <option value="8" <?php if ($constructor['content']['widget']['after'] == 8) echo 'selected="selected"'; ?>><?php printf(__('after %d post', 'constructor'),8); ?></option>
		                <option value="9" <?php if ($constructor['content']['widget']['after'] == 9) echo 'selected="selected"'; ?>><?php printf(__('after %d post', 'constructor'),9); ?></option>
		                <option value="10" <?php if ($constructor['content']['widget']['after'] == 10) echo 'selected="selected"'; ?>><?php printf(__('after %d post', 'constructor'),10); ?></option>
		                       
		            </select></dd>			
			</dl>
		</fieldset>
    </td>
    <td valign="top" class="updated quick-links">
    <?php _e('You can use short code [widgets] in your post, and can configured with <a href="widgets.php">widgets</a> (use "In Posts" sidebar)', 'constructor')?>
    <br />
    <br />
    <?php _e('Available <a href="http://code.google.com/p/wp-constructor/wiki/ConstructorShortcodes" title="Constructor Short Codes">short codes</a>:', 'constructor')?>
    <ul>
        <li>[attachments <em>type=image</em> <em>preview=1</em>]</li>
        <li>[subpages]</li>
        <li>[widgets]</li>
    </ul>

    </td>
</tr>
</table>