<?php __('Fonts', 'constructor'); // requeried for correct translation 
    $fonts = require dirname(__FILE__) . '/../fonts.php';
?>
<script type="text/javascript">
/* <![CDATA[ */
(function($){
$(document).ready(function(){
    $(".font-selector").change(function(){
		var font = $(this).find("option:selected").attr('name');		
		$(this).css({'font-family':font});
	});
});
})(jQuery);
/* ]]> */
</script>
<table class="form-table">
    <tr>
        <th scope="row" valign="top" class="th-full"><?php _e('Header Font', 'constructor'); ?></th>
    </tr>
	<tr>
		<td>
			<select name="constructor[fonts][header]" class="font-selector" style='font-family:<?php echo $constructor['fonts']['header'] ?>'>
			    <?php foreach ($fonts as $key => $font) : ?>
				    <optgroup label='<?php _e('The quick brown fox jumps over the lazy dog', 'constructor'); ?>' style='font-family:<?php echo $font ?>'>
					    <option value="<?php echo $key ?>" name='<?php echo $font ?>' <?php if ($constructor['fonts']['header'] == $key) echo 'selected="selected"'; ?>>
					    	<?php echo $font ?>							
					    </option>
					</optgroup>
				<?php endforeach?>
			</select>
		</td>
	</tr>
    <tr>
        <th scope="row" valign="top" class="th-full"><?php _e('Body Font', 'constructor'); ?></th>
    </tr>
	<tr>
        <td>
            <select name="constructor[fonts][body]" class="font-selector" style='font-family:<?php echo $constructor['fonts']['body'] ?>'>
                <?php foreach ($fonts as $key => $font) : ?>
                    <optgroup label='<?php _e('The quick brown fox jumps over the lazy dog', 'constructor'); ?>' style='font-family:<?php echo $font ?>'>
                        <option value="<?php echo $key ?>" name='<?php echo $font ?>' <?php if ($constructor['fonts']['body'] == $key) echo 'selected="selected"'; ?>>
                            <?php echo $font ?>                         
                        </option>
                    </optgroup>
                <?php endforeach?>
            </select>
        </td>
    </tr>
</table>