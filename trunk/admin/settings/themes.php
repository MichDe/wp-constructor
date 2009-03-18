<?php
// load themes
$themes = scandir($directory.'/themes/');
unset($themes[array_search('.', $themes)]);
unset($themes[array_search('..', $themes)]);

foreach ($themes as $theme) :
      $img = null;
      if (file_exists($directory.'/themes/'.$theme.'/styles.css')) {
          $data = get_theme_data($directory.'/themes/'.$theme.'/styles.css');

          if (file_exists($directory.'/themes/'.$theme.'/screenshot.png')) {
              $img = $directory_uri .'/themes/'.$theme.'/screenshot.png';
          }
      } else {
          $data = array(
              'Title' => $theme,
              'Description' => __('File "styles.css" is not exists','constructor'),
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