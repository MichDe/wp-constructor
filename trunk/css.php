<?php
/**
 * CSS Generator, please never change this is file, if your not sure what are you doing!
 * 
 * @package WordPress
 * @subpackage Constructor
 */
header('Content-type: text/css');

// debug only current theme
error_reporting(E_ALL);

// template directory
$template_uri = get_template_directory_uri();

// config is null
$constructor = null;

// load custom theme (using theme switcher)
if (isset($_GET['theme'])) {
    $theme = $_GET['theme'];
    $theme = preg_replace('/[^a-z0-9\-\_]+/i', '', $theme);
    if (file_exists(dirname(__FILE__) . '/themes/'.$theme.'/config.php')) {
       $constructor = include dirname(__FILE__) . '/themes/'.$theme.'/config.php';
    }
} else {
    $constructor = get_option('constructor');
}

if (!$constructor) {
    $constructor = include dirname(__FILE__) . '/themes/default/config.php';
}

$width    = isset($constructor['layout']['width'])?$constructor['layout']['width']:1024;
$sidebar  = isset($constructor['layout']['sidebar'])?$constructor['layout']['sidebar']:240;
$extra    = isset($constructor['layout']['extra'])?$constructor['layout']['extra']:240;

$color1   = $constructor['color']['header1'];
$color2   = $constructor['color']['header2'];
$color3   = $constructor['color']['header3'];

$color_bg      = $constructor['color']['bg'];
$color_bg2     = $constructor['color']['bg2'];
$color_title   = $constructor['color']['title'];
$color_title2  = $constructor['color']['title2'];
$color_text    = $constructor['color']['text'];
$color_text2   = $constructor['color']['text2'];
$color_border  = $constructor['color']['border'];
$color_border2 = $constructor['color']['border2'];
$color_opacity = isset($constructor['color']['opacity'])?$constructor['color']['opacity']:'#ffffff';

/* Opacity */
// switch statement for $constructor['opacity']
switch ($constructor['opacity']) {
    case 'none':
        $opacity = '';
        break;
    case 'color':
        $opacity = <<<CSS
.opacity {
    background-color:{$color_opacity}
}
CSS;
        break;
    case 'darklow':
        $opacity = <<<CSS
.opacity {
    background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAA9JREFUeNpiYGBg8AUIMAAAUgBOUWVeTwAAAABJRU5ErkJggg==);
    background:rgba(0, 0, 0, 0.3);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#50000000, endColorstr=#50000000);
}
CSS;
        break;
    case 'dark':
        $opacity = <<<CSS
.opacity {
    background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAA9JREFUeNpiYmBgaAAIMAAAjwCD5Hc2/AAAAABJRU5ErkJggg==);
    background:rgba(0, 0, 0, 0.5);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#75000000, endColorstr=#75000000);
}
CSS;
        break;
    case 'darkhigh':
        $opacity = <<<CSS
.opacity {
    background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAA9JREFUeNpiYGBgOAMQYAAA0QDNW2hbhQAAAABJRU5ErkJggg==);
    background:rgba(0, 0, 0, 0.8);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#90000000, endColorstr=#90000000);
}
CSS;
        break;
    case 'lightlow':
        $opacity = <<<CSS
.opacity {
    background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABBJREFUeNpi+P//vy9AgAEACUkDS4BbGHwAAAAASUVORK5CYII=);
    background:rgba(255, 255, 255, 0.3);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#50FFFFFF, endColorstr=#50FFFFFF);
}
CSS;
        break;
    case 'lighthigh':
        $opacity = <<<CSS
.opacity {
    background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABBJREFUeNpi/P///xmAAAMACc0DyzeP8KAAAAAASUVORK5CYII=);
    background:rgba(255, 255, 255, 0.8);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#90FFFFFF, endColorstr=#90FFFFFF);
}
CSS;
        break;
    case 'light':
    default:
        $opacity = <<<CSS
.opacity {
    background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABBJREFUeNpi/v//fyxAgAEACWgDXjXePfkAAAAASUVORK5CYII=);
    background:rgba(255, 255, 255, 0.5);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#75FFFFFF, endColorstr=#75FFFFFF);
}
CSS;
        break;
}

/* Shadow */
if ($constructor['shadow']) {
    $shadow = <<<CSS
.shadow {
    box-shadow: 0 0 3px {$color_border};
    -moz-box-shadow: 0 0 3px {$color_border};
    -webkit-box-shadow: 0 0 3px {$color_border}
}
CSS;
} else {
    $shadow = '';
}

/* Layout */

// width changes
$sidebar2 = $sidebar - 4; // 2px - it's border width
$extra2   = $extra   - 4;

// switch statement for $sidebar
switch ($constructor['sidebar']) {
    case 'left':
$width2 = $width - ($sidebar + 1); // 1 is border width

$layout = <<<CSS
#container {
    width:{$width2}px;
    margin-left:{$sidebar}px;
    border-left:1px dotted {$color_border};
}
#sidebar {
    margin-left:-{$width}px !important;
}
CSS;
        break;
    case 'two':
$width2 = $width - ($sidebar + $extra + 2); // 2 is borders width
$layout = <<<CSS
#container {
    width:{$width2}px;
    margin-left:{$extra}px;
    border-left:1px dotted {$color_border};

    margin-right:{$sidebar}px;
    border-right:1px dotted {$color_border};
}
#sidebar {
    margin-left:-{$sidebar}px;
}
#extra {
    margin-left:-{$width}px;
}
CSS;
        break;
    case 'two-right':
$margin = $sidebar + $extra + 2;
$width2 = $width - $margin;

$layout = <<<CSS
#container {
    width:{$width2}px;

    margin-right:{$margin}px;
    border-right:1px dotted {$color_border};
}
#sidebar {
    margin-left:-{$margin}px;
    border-right:1px dotted {$color_border};
}
#extra {
    margin-left:-{$extra}px;
}
CSS;
        break;
    case 'two-left':
$margin  = $sidebar + $extra + 2;
$margin2 = $width - $sidebar;
$width2  = $width - $margin;

$layout = <<<CSS
#container {
    width:{$width2}px;
    margin-left:{$margin}px;
    border-left:1px dotted {$color_border};
}
#sidebar {
    margin-left:-{$width}px;
    border-right:1px dotted {$color_border};
}
#extra {
    margin-left:-{$margin2}px;
}
CSS;
        break;
    case 'none':
        break;
    case 'right':
    default:
$width2  = $width - $sidebar;
$layout = <<<CSS
#container {
    width:{$width2}px;
    margin-right:{$sidebar}px;
    border-right:1px dotted {$color_border};
}
#sidebar {
    margin-left:-{$sidebar}px;
}
CSS;
        break;
}

/* List of Fonts */
$fonts = include dirname(__FILE__) . '/admin/fonts.php';

$fonts_header = $fonts[$constructor['fonts']['header']];
$fonts_body = $fonts[$constructor['fonts']['body']];

/* Background images */
if (isset($constructor['images']['body']['src']) && !empty($constructor['images']['body']['src'])) {
    $body_bg = "background-image: url('{$template_uri}/{$constructor['images']['body']['src']}');\n"
              ."background-repeat: {$constructor['images']['body']['repeat']};\n"
              ."background-position: {$constructor['images']['body']['pos']};\n";
	if (isset($constructor['images']['body']['fixed']) && $constructor['images']['body']['fixed']) {
    	$body_bg .= "background-attachment:fixed;\n";
    }
} else { $body_bg = null; }

if (isset($constructor['images']['wrap']['src']) && !empty($constructor['images']['wrap']['src'])) {
    $wrap_bg = "background-image: url('{$template_uri}/{$constructor['images']['wrap']['src']}');\n"
              ."background-repeat: {$constructor['images']['wrap']['repeat']};\n"
              ."background-position: {$constructor['images']['wrap']['pos']};\n";
    if (isset($constructor['images']['wrap']['fixed']) && $constructor['images']['wrap']['fixed']) {
    	$wrap_bg .= "background-attachment:fixed;\n";
    }
} else { $wrap_bg = null; }

if (isset($constructor['images']['wrapper']['src']) && !empty($constructor['images']['wrapper']['src'])) {
    $wrapper_bg = "background-image: url('{$template_uri}/{$constructor['images']['wrapper']['src']}');\n"
	             ."background-repeat: {$constructor['images']['wrapper']['repeat']};\n"
	             ."background-position: {$constructor['images']['wrapper']['pos']};\n";
} else { $wrapper_bg = null; }

if (isset($constructor['images']['sidebar']['src']) && !empty($constructor['images']['sidebar']['src'])) {
    $sidebar_bg = "background-image: url('{$template_uri}/{$constructor['images']['sidebar']['src']}');\n"
              ."background-repeat: {$constructor['images']['sidebar']['repeat']};\n"
              ."background-position: {$constructor['images']['sidebar']['pos']};\n";
} else { $sidebar_bg = null; }

if (isset($constructor['images']['extrabar']['src']) && !empty($constructor['images']['extrabar']['src'])) {
    $extrabar_bg = "background-image: url('{$template_uri}/{$constructor['images']['extrabar']['src']}');\n"
              ."background-repeat: {$constructor['images']['extrabar']['repeat']};\n"
              ."background-position: {$constructor['images']['extrabar']['pos']};\n";
} else { $extrabar_bg = null; }

if (isset($constructor['images']['footer']['src']) && !empty($constructor['images']['footer']['src'])) {
    $footer_bg = "background-image: url('{$template_uri}/{$constructor['images']['footer']['src']}');\n"
              ."background-repeat: {$constructor['images']['footer']['repeat']};\n"
              ."background-position: {$constructor['images']['footer']['pos']};\n";
} else { $footer_bg = null; }

/* Output CSS */
echo <<<CSS
body {
    font: 62.5%/1.6 {$fonts_body};
    background-color:{$color_bg};
    {$body_bg}
}

body,
a { color:{$color_text} }

hr { color: {$color1}; background-color: {$color1} }

h1,h2,h3,h4,h5,h6 {font-family:{$fonts_header}}

h1,
h2 { color:{$color1} }
h3,
h4 { color:{$color2} }
h5,
h6 { color:{$color3} }

pre {font-family:{$fonts_body}}

a:hover { color:{$color1} }

th {
    color:{$color_text};
    background-color:{$color3};
    border-color: {$color_border}
}
td {
    border-color: {$color_border}
}

.color1 { color:{$color1} }
.color2 { color:{$color2} }
.color3 { color:{$color3} }

.color-text  { color:{$color_text} }
.color-text2 { color:{$color_text2} }

.color-bg  { background-color:{$color_bg}  }
.color-bg2 { background-color:{$color_bg2} }

.color_border  { border-color: {$color_border}  }
.color_border2 { border-color: {$color_border2} }


/*Form*/
input, select, textarea {
    color:{$color_text};
    border-color: {$color_border};
    background-color:{$color_bg}
}

input:active, select:active, textarea:active {
    border-color:{$color3};
    background-color:{$color_bg2}
}

input:focus, select:focus, textarea:focus {
    border-color:{$color3};
    background-color:{$color_bg2}
}

fieldset{
    border-color: {$color_border}
}
/*/Form*/
/*CSS3*/
.box {
    border-color: {$color_border}
}
::selection {
    background: {$color1};
    color:{$color_bg};
}
::-moz-selection {
    background: {$color1};
    color:{$color_bg};
}
{$opacity}
{$shadow}
/*/CSS3*/
/*Layout*/
#body {
    width:{$width}px;
}

#wrap {
    {$wrap_bg}
}

#wrapper {
    {$wrapper_bg}
}

{$layout}

    .container-full {
        width:{$width}px !important;
    }

#sidebar{
    width:{$sidebar2}px;
    {$sidebar_bg};
}
#extra {
    width:{$extra2}px;
    {$extrabar_bg};
}

#footer{
    width:{$width}px;
    $footer_bg
}
/*/Layout*/
/*Header*/
#header {
	height: {$constructor['layout']['header']}px;
	text-align: {$constructor['title']['pos']}
}
#header h1 { font: bold 600%/100% {$fonts_header}; }
#header h1 a { color: {$color_title}}
#header h2 { color: {$color_title2}}
#header-links {    border-color: {$color_border} }
    #header-links ul { border-color: {$color_border} }
    #header-links li { border-color: {$color_border} }
    #header-links li li { background-color:{$color_bg}  }
    #header-links li:hover { background-color:{$color_bg2} }
    
    #header-links .current_page_item a,
    #header-links .current-cat a{
        color:{$color1}
    }
    #header-links .current_page_item li a,
    #header-links .current-cat li a {
        color: {$color_text}
    }
/*/Header*/
/*Slideshow*/
.wp-sl img{
    border-color: {$color_border};
}
#wrapper .wp-sl {
    border-width:0 0 1px 0;
    border-style:solid;
    border-color:{$color_border};
}
/*/Slideshow*/
/*Images*/
.wp-caption {
   color:{$color_text};
   border: 1px solid {$color_border};
   background-color: {$color_bg2};
}
/*/Images*/
/*Calendar*/
#wp-calendar th {
    border-bottom:1px solid {$color_border}
}
#wp-calendar tbody {
    border-bottom:1px solid {$color_border2}
}
/*/Calendar*/
/*Post*/
.hentry .title a,
.hentry .title span{
    border-bottom:3px dotted {$color3}
}
.hentry .entry a,
.hentry .footer a{
    border-bottom:1px dotted {$color_text}
}
.hentry .entry a:hover,
.hentry .footer a:hover{
    border-bottom:1px solid {$color1}
}
.hentry .entry .crop,
.hentry .entry img {
    border-color:{$color_border}
}
/*/Post*/
/*Sidebar*/    
.sidebar .current_page_item a,
.sidebar .current-cat a{
    font-weight:900;
    border-color:{$color_text}
}
.sidebar .current_page_item li a,
.sidebar .current-cat li a{
    font-weight:500;
    border-color:{$color_border}
}
/*/Sidebar*/
/*Comments*/
.thread-even, .even {
    background-color: {$color_bg};
    border: 1px solid {$color_border}
}
.alt {
    background-color: {$color_bg};
}
.thread-odd, .odd {
    background-color: {$color_bg2};
    border: 1px solid {$color_border2}
}
/*
.depth-2, .depth-4 {
    border-left:3px dotted {$color_border}
}
*/
.commentlist li .avatar {
    border-color: {$color_border2};
}
.commentlist a {
    border-bottom:1px dotted {$color_text}
}
.commentlist a:hover {
    border-bottom:1px solid {$color1}
}
.comment-meta a{
    color:{$color_text2}
}
/*/Comments*/
/*Footer*/
#footer .copy{
    color:{$color_text2}
}
/*/Footer*/
CSS;

