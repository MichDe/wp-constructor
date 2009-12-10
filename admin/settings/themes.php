<?php __('Themes', 'constructor'); // requeried for correct translation ?>
<script type="text/javascript">
(function($){
$(document).ready(function(){
    $("#constr-themes div").hover(function(){
        $(this).toggleClass('hover');
    },function(){
        $(this).toggleClass('hover');
    });

    $("#constr-themes div:not(.selected)").click(function(){
        if (confirm('All data was reloaded from theme config. Continue?..')) {
            $('#constructor-theme').val($(this).attr('title'));
            $('#constructor-theme-reload').val(1);
            $("#constructor-form").submit();
        }
    });
});
})(jQuery);
</script>

<input type="hidden" id="constructor-theme" name="constructor[theme]" value="<?php echo $constructor['theme']?>"/>
<input type="hidden" id="constructor-theme-reload" name="constructor[theme-reload]" value="0"/>

<?php
// load themes
$themes = scandir($directory.'/themes/');

$themes = array_diff($themes, array( '.','..','.svn','.htaccess','readme.txt'));

foreach ($themes as $theme) :
      $img = null;
      if (file_exists($directory.'/themes/'.$theme.'/style.css')) {
          $data = get_theme_data($directory.'/themes/'.$theme.'/style.css');

          if (file_exists($directory.'/themes/'.$theme.'/screenshot.png')) {
              $img = $template_uri .'/themes/'.$theme.'/screenshot.png';
          }
      } else {
          $data = array(
              'Title' => $theme,
              'Description' => __('File "style.css" is not exists','constructor'),
              'Author' => __('Anonymous','constructor'),
              'Version' => '0.0',
          );

      }
?>
    <div <?php if($constructor['theme'] == $theme) echo 'class="selected"'; ?> title="<?php echo $theme ?>">
        <span>
            <?php if ($img): ?>
            <img src="<?php echo $img ;?>" />
            <?php endif; ?>
        </span>
        <strong><?php echo $data['Title'] ?></strong> <em>@<?php echo $data['Author'] ?></em>- <?php _e('version', 'constructor'); ?> <?php echo $data['Version'] ?>
        <p><?php echo $data['Description'] ?></p>
    </div>
<?php endforeach; ?>
<br class="clear"/>