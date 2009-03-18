<?php
/**
 * CSS Generator, please never change this is file, if your not sure what are you doing!
 * 
 * @package WordPress
 * @subpackage Constructor
 */
header('Content-type: text/css');

if (file_exists(dirname(__FILE__) . '/../../../wp-load.php')) {
    include_once dirname(__FILE__) . '/../../../wp-load.php';
    // load from DB
    $constructor = get_option('constructor');
} else {
    // load from default config
    $constructor = null;
}

if (!$constructor) {
    $constructor = include dirname(__FILE__) . '/themes/default/config.php';
}

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

/* Opacity */
// switch statement for $constructor['opacity']
switch ($constructor['opacity']) {
    case 'dark':
        $opacity = <<<CSS
.opacity {
    background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAA9JREFUeNpiYmBgaAAIMAAAjwCD5Hc2/AAAAABJRU5ErkJggg==);
    background:rgba(0, 0, 0, 0.5);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#85000000, endColorstr=#85000000);
}
CSS;
        break;
    case 'light':
    default:
        $opacity = <<<CSS
.opacity {
    background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABBJREFUeNpi/v//fyxAgAEACWgDXjXePfkAAAAASUVORK5CYII=);
    background:rgba(255, 255, 255, 0.5);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#85FFFFFF, endColorstr=#85FFFFFF);
}
CSS;
        break;
}

/* Layout */
// switch statement for $sidebar
switch ($constructor['sidebar']) {
    case 'left':
$layout = <<<CSS
#container {
    width:787px;
    margin-left:240px;
    border-left:1px dotted {$color_border};
}
#sidebar {
    margin-left:-1024px !important;
}
CSS;
        break;
    case 'two':
$layout = <<<CSS
#container {
    width:547px;
    margin-left:240px;
    border-left:1px dotted {$color_border};

    margin-right:240px;
    border-right:1px dotted {$color_border};
}
#sidebar {
    margin-left:-240px;
}
#extra {
    margin-left:-1024px;
}
CSS;
        break;
    case 'two-right':
$layout = <<<CSS
#container {
    width:562px;

    margin-right:460px;
    border-right:1px dotted {$color_border};
}
#sidebar {
    margin-left:-458px;
    border-right:1px dotted {$color_border};
}
#extra {
    margin-left:-226px;
}
CSS;
        break;
    case 'two-left':
$layout = <<<CSS
#container {
    width:562px;
    margin-left:460px;
    border-left:1px dotted {$color_border};
}
#sidebar {
    margin-left:-1024px;
    border-right:1px dotted {$color_border};
}
#extra {
    margin-left:-794px;
}
CSS;
        break;
    case 'none':
        break;
    case 'right':
    default:
$layout = <<<CSS
#container {
    width:787px;
    margin-right:240px;
    border-right:1px dotted {$color_border};
}
#sidebar {
    margin-left:-240px;
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
    $body_bg = "background-image: url({$constructor['images']['body']['src']});\n"
              ."background-repeat: repeat-x;\n"
              ."background-position: center top;\n";
} else { $body_bg = null; }

if (isset($constructor['images']['wrap']['src']) && !empty($constructor['images']['wrap']['src'])) {
    $wrap_bg = "background-image: url({$constructor['images']['wrap']['src']});\n"
              ."background-repeat: no-repeat;\n"
              ."background-position: {$constructor['images']['wrap']['pos']};\n";
} else { $wrap_bg = null; }

if (isset($constructor['images']['wrapper']['src']) && !empty($constructor['images']['wrapper']['src'])) {
    $wrapper_bg = "background-image: url({$constructor['images']['wrapper']['src']});\n"
                 ."background-repeat: repeat-y;\n";
} else { $wrapper_bg = null; }

if (isset($constructor['images']['sidebar']['src']) && !empty($constructor['images']['sidebar']['src'])) {
    $sidebar_bg = "background-image: url({$constructor['images']['sidebar']['src']});\n"
              ."background-repeat: no-repeat;\n"
              ."background-position: {$constructor['images']['sidebar']['pos']};\n";
} else { $sidebar_bg = null; }

if (isset($constructor['images']['footer']['src']) && !empty($constructor['images']['footer']['src'])) {
    $footer_bg = "background-image: url({$constructor['images']['footer']['src']});\n"
              ."background-repeat: no-repeat;\n"
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
    border-color:1px solid {$color_border}
}
td {
    border-color:1px solid {$color_border}
}

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
.shadow {
    -webkit-box-shadow: 5px 5px 7px {$color_bg2}
}
{$opacity}
/*/CSS3*/
/*Layout*/
#wrap {
    {$wrap_bg}
}

#wrapper {
{$wrapper_bg}
}

{$layout}

#sidebar{
    $sidebar_bg
}

#footer{
    $footer_bg
}
/*/Layout*/
/*Header*/
#header { text-align: {$constructor['title']['pos']}}
#header h1 { font: bold 600%/100% {$fonts_header}; }
#header h1 a { color: {$color_title}}
#header h2 { color: {$color_title2}}
#header-links {    border-color: {$color_border} }
    #header-links ul { border-color: {$color_border} }
    #header-links li { border-color: {$color_border} }
    #header-links li li a { background-color:{$color_bg}  }
    #header-links li a:hover { background-color:{$color_bg2} }
/*/Header*/
/*Images*/
.wp-caption {
   color:{$color_text};
   border: 1px solid {$color_border};
   background-color: {$color_bg};
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
.post .title a,
.post .title span{
    border-bottom:3px dotted {$color3}
}
.post .entry a,
.post .footer a{
    border-bottom:1px dotted {$color_text}
}
.post .entry a:hover,
.post .footer a:hover{
    border-bottom:1px solid {$color1}
}
.post .entry p:first-letter {
    color:{$color1}
}
.post .entry img {
    border-color:{$color_border}
}
/*/Post*/
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
.depth-2, .depth-4 {
	border-left:3px dotted {$color_border}
}

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

