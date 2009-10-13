<?php 
/* Export on 2009-09-30 20:44 */ 
return array (
            "sidebar"   => 'right',
            "layout"    =>  array(           // layouts styles
                        'header'  => 300,    // header height
                        'width'   => 1024,   // container width
                        'sidebar' => 340,    // sidebar width
                        'extra'   => 240,    // extrabar  width
                        'home'    => 'default',
                        'archive' => 'default',
                        'search'  => 'default',
                        'index'   => 'default',
                                 ),
            "title"     => array(
                        'pos' => 'left'
                    ),
            "content"   => array(            // content
                        'author' => true,    // - link to author page
					    'thumb' =>  array ('auto' => true), // - autogenerate thumbnails
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
                        "flag" => false,         // - enable/disable
                        "home" => true,     // - link to home page
                        "rss"  => true,     // - link to RSS
                        "search" => true,    // - search form
                        "pages"      => array('depth'=>0),
                        "categories" => array('depth'=>3, 'group'=>1)
                        ),
            "slideshow" => array(            // Slideshow options
                        "flag" => false,         // - enable/disable
                        "layout" => 'in',
                        "showposts" => 10,   // - show last N slides
                        "metakey" => 'thumb-slideshow', // - custom field name
                        "id" => null,
                        "height" => 200,
                        "onpage" => false,    // show slideshow on page
                        "onsingle" => false   // show slideshow on single post
                    ),
            "images"   => array(
                        "body" => array('src'=>'themes/naruto/naruto.jpg', 'pos'=>'top center', 'repeat'=>'no-repeat', 'fixed'=>false),
                        "wrap" => array('src'=>'', 'pos'=>'center top', 'repeat'=>'no-repeat', 'fixed'=>false),
                        "wrapper"  => array('src'=>'', 'pos'=>'left top', 'repeat'=>'no-repeat'),
                        "sidebar"  => array('src'=>'themes/naruto/fox.jpg', 'pos'=>'right bottom', 'repeat'=>'no-repeat'),
                        "extrabar" => array('src'=>'', 'pos'=>'left top', 'repeat'=>'no-repeat'),
                        "footer"   => array('src'=>'', 'pos'=>'left top', 'repeat'=>'no-repeat'),
                    ),
            "opacity"   => 'darkhigh',
            "shadow"    => true,             // create shadow
            "color"   => array(
					    'title' => '#ffffff',
					    'title2' => '#d93103',
					    'bg' => '#000',
					    'bg2' => '#333',
					    'opacity' => '#000',
					    'text' => '#fff',
					    'text2' => '#ccc',
					    'border' => '#555',
					    'border2' => '#999',
					    'header1' => '#ff3700',
					    'header2' => '#ff3d12',
					    'header3' => '#ff5f33',
                    ),
)
 ?>