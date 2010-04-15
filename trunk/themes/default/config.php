<?php
/**
 * Don't change this is file
 */
return array(
            "sidebar"   => 'right',          // sidebar position
            'layout'    =>  array(           // layouts styles
                        'header'  => 140,    // header height
                        'width'   => 1024,   // container width
                        'sidebar' => 240,    // sidebar width
                        'extra'   => 240,    // extrabar  width
                        'home'    => 'default',
                        'archive' => 'default',
                        'search'  => 'default',
                        'index'   => 'default',
                                 ),
            'title'     => array(            // title
                        'pos' => 'left top', // - position
                        'hidden' => false    // - hidden title text
                        ),
            "content"   => array(            // content
                        "author" => 0,       // - link to author page
                        'thumb' =>  array ('auto'   => false), // - autogenerate thumbnails
                        'list'  =>  array (                    // list layout
                                           'filter' => false,  // - strip HTML tags
                                           'thumb'  => array ( 'pos' => 'left', 'noimage' => false, ), // - thumbnail position and "No Image" option
                                          ),
                        ),
            'comments'  => array(
                        'avatar' => array ('size'   => 64,     // - avatar size (see comments)
                                           'pos'    => 'right' // - avatarposition
                                          ),
                        ),
            "footer"    => array(            // footer text
                        "text" => null,
                        ),
            "fonts"     => array(            // fonts
                        'header' => 0,       // - for title
                        'body'   => 0,       // - for content
                        ),
            "menu"     => array(             // menu with links
                        'pos'  => 'right bottom',// - position (left|right)+(top|center|bottom)
                        'width'=> false,     // - can be '100%'
                        "flag" => 1,         // - enable/disable
                        "home" => false,     // - link to home page
                        "rss"  => false,     // - link to RSS
                        "search" => true,    // - search form
                        'pages'      => array('depth'=>1, 'exclude'=>''),
                        'categories' => array('depth'=>1, 'exclude'=>'', 'group'=>1, 'title'=>'')
                        ),
            "slideshow" => array(            // Slideshow options
                        "flag" => 0,         // - enable/disable
                        "layout" => 'in',    // - slideshow "in" main container or "over"
                        "onpage" => false,   // - show slideshow on page
                        "onsingle" => false, // - show slideshow on single post
                        'onarchive' => false, // - show slideshow on archives
                        "showposts" => 10,   // - show last N slides
                        "metakey" => 'thumb-slideshow', // - custom field name
                        "id" => null,        // - slideshow ID - for NextGenGallery
                        "height" => 200,     // - height in px
                        "advanced" => array(
                                "thumb"      => false,
                                "play"       => true,
                                "effect"     => 'slide',
                                "effectTime" => 300,
                                "timeout"    => 3000
                            )
                        ),
            'design'   => array(
                        'box'       => array (
                                'flag' => true, // create box border radius
                                'radius' => 4,  // value of it
                            ),           
                        'shadow'    => array (
                                'flag' => true, // create shadow
                                'x'    => 0,
                                'y'    => 0,
                                'blur' => 3
                                ),           
                        ),
            "images"   => array(             // background images
                        "body" => array('src'=>'', 'pos'=>'left top', 'repeat'=>'repeat', 'fixed'=>false),
                        "wrap" => array('src'=>'themes/default/header.png', 'pos'=>'center top', 'repeat'=>'no-repeat', 'fixed'=>false),
                        "header"   => array('src'=>'', 'pos'=>'left top', 'repeat'=>'no-repeat'),
                        "wrapper"  => array('src'=>'', 'pos'=>'left top', 'repeat'=>'no-repeat'),
                        "sidebar"  => array('src'=>'', 'pos'=>'right bottom', 'repeat'=>'no-repeat'),
                        "extrabar" => array('src'=>'', 'pos'=>'right bottom', 'repeat'=>'no-repeat'),
                        "footer"   => array('src'=>'themes/default/footer.png', 'pos'=>'right bottom', 'repeat'=>'no-repeat'),
                        "wrapheader"  => array('src'=>'', 'pos'=>'left top', 'repeat'=>'no-repeat'),
                        "wrapcontent" => array('src'=>'', 'pos'=>'left top', 'repeat'=>'no-repeat'),
                        "wrapfooter"  => array('src'=>'', 'pos'=>'left top', 'repeat'=>'no-repeat'),
                        ),
            "opacity"   => 'light',          // type of opacity
            "color"     => array(            // theme colors
                        "bg"      => '#fff',
                        "bg2"     => '#fff5c5',
                        "opacity" => '#fff',
                        "title"   => '#333',
                        "title2"  => '#555',
                        "text"    => '#333',
                        "text2"   => '#aaa',
                        "border"  => '#aaa',
                        "border2" => '#999',

                        "header1"   => '#ff6600',
                        "header2"   => '#ff7711',
                        "header3"   => '#ff9933',
                        )
            );