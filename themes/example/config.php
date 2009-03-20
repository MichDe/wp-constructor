<?php
/**
 * Don't change this is file
 */
return array(
            "sidebar"   => 'right',          // sidebar position
            "layout"    => 'tile',           // layout of homepage
            "title"     => array(            // title
                        "pos" => 'left'      // - position
                    ),
            "footer"    => array(            // footer text
                        "text" => '&copy; '.date('Y') .' '. sprintf(__('%1$s is proudly powered by %2$s', 'constructor'), get_bloginfo('name'), '<a href="http://wordpress.org/">WordPress</a>') .
                                  ' | <a href="http://anton.shevchuk.name/">'. __('Constructor Theme', 'constructor') .'</a>'
                    ),
            "fonts"     => array(            // fonts
                        'header' => 0,       // - for title
                        'body'   => 0,       // - for content
                    ),
            "menu"     => array(            // menu with links
                        "type" => 3,         // - menu levels
                        "home" => true,      // - link to home page
                        "rss"  => true,      // - link to RSS
                        "size" => false,     // - font resizer
                    ),
            "slideshow" => array(            // NextGen gallery options
                        "id" => null,        // - slideshow ID
                        "height" => 200,     // - height in px
                        "onpage" => false,   // - show slideshow on page
                        "onsingle" => false  // - show slideshow on single post
                    ),
            "images"   => array(             // background images
                        "body" => array('src'=>'themes/example/gradient.png'),
                        "wrap" => array('src'=>'themes/example/header.png','pos'=>'center top'),
                        "wrapper" => array('src'=>'themes/example/wrapper.png'),
                        "sidebar" => array('src'=>'themes/example/sidebar.png','pos'=>'right bottom'),
                        "footer"  => array('src'=>'themes/example/footer.png','pos'=>'right bottom'),
                    ),
            "opacity"   => 'light',          // type of opacity
            "color"   => array(              // theme colors
                        "bg"      => '#fff',
                        "bg2"     => '#fff5c5',
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