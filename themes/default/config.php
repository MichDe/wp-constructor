<?php
/**
 * Don't change this is file
 */
return array(
            "sidebar"   => 'right',          // sidebar position
            'layout'    =>  array(           // layouts styles
                        'width'   => 1024,   // container width
                        'sidebar' => 240,    // sidebar width
                        'extra'   => 240,    // extrabar  width
                        'home'    => 'default',
                        'archive' => 'default',
                        'search'  => 'default',
                        'index'   => 'default',
                                 ),
            "title"     => array(            // title
                        "pos" => 'left'      // - position
                    ),
            "footer"    => array(            // footer text
                        "text" => null,
                                ),
            "fonts"     => array(            // fonts
                        'header' => 0,       // - for title
                        'body'   => 0,       // - for content
                    ),
            "menu"     => array(             // menu with links
                        "type" => 3,         // - menu levels
                        "home" => true,      // - link to home page
                        "rss"  => true,      // - link to RSS
                        "size" => false,     // - font resizer
                    ),
            "slideshow" => array(            // NextGen gallery options
                        "layout" => 'in',    // - slideshow "in" main container or "over"
                        "id" => null,        // - slideshow ID
                        "height" => 200,     // - height in px
                        "onpage" => false,   // - show slideshow on page
                        "onsingle" => false  // - show slideshow on single post
                    ),
            "images"   => array(             // background images
                        "body" => array('src'=>'', 'pos'=>'left top', 'repeat'=>'repeat'),
                        "wrap" => array('src'=>'themes/default/header.png','pos'=>'center top'),
                        "wrapper" => array('src'=>''),
                        "sidebar" => array('src'=>'','pos'=>'right bottom'),
                        "footer"  => array('src'=>'themes/default/footer.png','pos'=>'right bottom'),
                    ),
            "opacity"   => 'light',          // type of opacity
            "color"   => array(              // theme colors
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