<?php
/**
 * @package WordPress
 * @subpackage Constructor
 */
header ("content-type: text/xml"); 

// load config
if (!$constructor = get_option('constructor')) {
    $constructor = include dirname(__FILE__) . '/themes/default/config.php';
}

$showposts = isset($constructor['slideshow']['showposts'])?$constructor['slideshow']['showposts']:10;
$metakey   = isset($constructor['slideshow']['metakey'])?$constructor['slideshow']['metakey']:'thumb-slideshow';

$WP_Query = new WP_Query();   
$WP_Query->query('showposts='.$showposts.'&meta_key='.$metakey);
echo '<?xml version="1.0" encoding="UTF-8" ?>';
echo '<posts>';

while($WP_Query->have_posts()) :
	$WP_Query->the_post();
	$image =  get_post_custom_values($metakey);
	$image = $image[0];
	
    $content = apply_filters('the_content', get_the_content(__('Read the rest of this entry &raquo;', 'constructor')));
    $content = preg_replace('/(\<script.*\>.*\<\/script\>)/si', '', $content);
    $content = strip_tags($content, '<br><a><hr>');
?> 
<post>
	<title><?php the_title() ?></title>
	<permalink><?php the_permalink() ?></permalink>
	<image><?php echo $image ?></image>
	<content><![CDATA[<?php echo $content ?>]]></content>
</post>
<?php 
endwhile;
echo '</posts>';
?>