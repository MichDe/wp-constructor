<?php
/**
 * @package WordPress
 * @subpackage Constructor
 */
header ("content-type: text/xml"); 

$WP_Query = new WP_Query();   
$WP_Query->query('showposts=10&meta_key=thumb-slideshow');
echo '<?xml version="1.0" encoding="UTF-8" ?>';
echo '<posts>';

while($WP_Query->have_posts()) :
	$WP_Query->the_post();
	$image =  get_post_custom_values('thumb-slideshow');
	$image = $image[0];
	
    $content = apply_filters('the_content', get_the_content(__('Read the rest of this entry &raquo;', 'construtor')));
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