<?php 
/* Export on 2009-09-30 20:44 */ 
return array (
            "sidebar"   => 'two-right',
            "layout"    =>  array(           // layouts styles
                        'header'  => 140,    // header height
                        'width'   => 1024,   // container width
                        'sidebar' => 240,    // sidebar width
                        'extra'   => 240,    // extrabar  width
                        'home'    => 'default',
                        'archive' => 'default',
                        'search'  => 'default',
                        'index'   => 'default',
                                 ),
            "title"     => array(
                        "pos" => 'right'
                    ),
            "content"   => array(            // content
                        "author" => 0,       // - link to author page
                        'thumb' =>  array ('auto' => false), // - autogenerate thumbnails
                        'list'  =>  array (                    // list layout
                                           'filter' => false,  // - strip HTML tags
                                           'thumb'  => array ( 'pos' => 'left', 'noimage' => false, ), // - thumbnail position and "No Image" option
                                          ),
                        ),
            "footer"    => array(            // footer text
                        "text" => null
                    ),
            "fonts"     => array(
                        'header' => 2,
                        'body'   => 2,
                    ),
            "menu"     => array(             // menu with links
                        "flag" => 1,         // - enable/disable
                        "home" => true,     // - link to home page
                        "rss"  => true,     // - link to RSS
                        "search" => true,    // - search form
                        "pages"      => array('depth'=>0),
                        "categories" => array('depth'=>3, 'group'=>1)
                        ),
            "slideshow" => array(            // Slideshow options
                        "flag" => 1,         // - enable/disable
                        "layout" => 'in',
                        "showposts" => 10,   // - show last N slides
                        "metakey" => 'thumb-slideshow', // - custom field name
                        "id" => null,
                        "height" => 200,
                        "onpage" => false,    // show slideshow on page
                        "onsingle" => false   // show slideshow on single post
                    ),
            "images"   => array(
                        "body" => array('src'=>'themes/sunrise/sunrise.jpg', 'pos'=>'left bottom', 'repeat'=>'repeat-x', 'fixed'=>1),
                        "wrap" => array('src'=>'', 'pos'=>'center top', 'repeat'=>'no-repeat', 'fixed'=>false),
                        "wrapper"  => array('src'=>'', 'pos'=>'left top', 'repeat'=>'no-repeat'),
                        "sidebar"  => array('src'=>'', 'pos'=>'left top', 'repeat'=>'no-repeat'),
                        "extrabar" => array('src'=>'', 'pos'=>'left top', 'repeat'=>'no-repeat'),
                        "footer"   => array('src'=>'', 'pos'=>'left top', 'repeat'=>'no-repeat'),
                    ),
            "opacity"   => 'darkhigh',
            "shadow"    => true,             // create shadow
            "color"   => array(
					    'title' => '#000000',
					    'title2' => '#404040',
					    'bg' => '#000',
					    'bg2' => '#333',
					    'opacity' => '#000',
					    'text' => '#fff',
					    'text2' => '#ccc',
					    'border' => '#555',
					    'border2' => '#999',
					    'header1' => '#ff6600',
					    'header2' => '#ff7711',
					    'header3' => '#ff9933',
                    ),
)
 ?>