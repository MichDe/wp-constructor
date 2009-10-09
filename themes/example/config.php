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
                        'home'    => 'tile',
                        'archive' => 'default',
                        'search'  => 'list',
                        'index'   => 'default',
                                 ),
            "title"     => array(            // title
                        "pos" => 'left'      // - position
                    ),
            "content"   => array(            // content
                        "author" => 0        // - link to author page
                        ),
            "footer"    => array(            // footer text
                        "text" => '&copy; '.date('Y') .' '. sprintf(__('%1$s is proudly powered by %2$s', 'constructor'), get_bloginfo('name'), '<a href="http://wordpress.org/">WordPress</a>') .
                                  ' | <a href="http://anton.shevchuk.name/">'. __('Constructor Theme', 'constructor') .'</a>'
                    ),
            "fonts"     => array(            // fonts
                        'header' => 0,       // - for title
                        'body'   => 0,       // - for content
                    ),
            "menu"     => array(             // menu with links
                        "flag" => 1,         // - enable/disable
                        "home" => true,     // - link to home page
                        "rss"  => true,     // - link to RSS
                        "search" => true,    // - search form
                        "pages"      => array('depth'=>3),
                        "categories" => array('depth'=>3, 'group'=>1)
                        ),
            "slideshow" => array(
                        "flag" => 1,         // - enable/disable
                        "layout" => 'in',    // - slideshow "in" main container or "over"
                        "showposts" => 10,   // - show last N slides
                        "metakey" => 'thumb-slideshow', // - custom field name
                        "id" => null,        // - slideshow ID
                        "height" => 200,     // - height in px
                        "onpage" => false,   // - show slideshow on page
                        "onsingle" => false  // - show slideshow on single post
                    ),
            "images"   => array(             // background images
                        "body" => array('src'=>'themes/example/gradient.png', 'pos'=>'left top', 'repeat'=>'repeat-x', 'fixed'=>false),
                        "wrap" => array('src'=>'themes/example/header.png', 'pos'=>'center top', 'repeat'=>'no-repeat', 'fixed'=>false),
                        "wrapper"  => array('src'=>'themes/example/wrapper.png', 'pos'=>'left top', 'repeat'=>'repeat-y'),
                        "sidebar"  => array('src'=>'themes/example/sidebar.png', 'pos'=>'right bottom', 'repeat'=>'no-repeat'),
                        "extrabar" => array('src'=>'', 'pos'=>'right bottom', 'repeat'=>'no-repeat'),
                        "footer"   => array('src'=>'themes/example/footer.png', 'pos'=>'right bottom', 'repeat'=>'no-repeat'),
                    ),
            "opacity"   => 'light',          // type of opacity
            "shadow"    => true,             // create shadow
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