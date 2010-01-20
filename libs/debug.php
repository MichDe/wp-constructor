<?php
    require_once 'includes/theme.php';
    require_once 'includes/plugin.php';

    $themes  = get_themes();
    $theme   = $themes[get_current_theme()];
    $plugins = get_plugins();
    
    error_reporting(E_ALL);
?>
    
<div id="debug">
    <div class="updated">
    <h4>Debug Information</h4>
    <hr/>
    php: <strong><?php echo phpversion()?></strong><br />
    wordpress: <strong><?php echo $wp_version?></strong><br />
    <?php if (defined('WPLANG'))
        echo 'localization: <strong>'. WPLANG .'</strong><br/>';
    ?>
    theme: <?php echo $theme['Name'] ?> - <strong><?php echo $theme['Version'] ?></strong><br />
    plugins (active):
    <ol>
    <?php foreach ($plugins as $file => $plugin) : ?>
    <?php if (is_plugin_active($file)) : ?>
        <li><?php echo $plugin['Name'] .' - '.$plugin['Version'];?></li>
    <?php endif; ?>
    <?php endforeach; ?>
    </ol>
    </div>
</div>