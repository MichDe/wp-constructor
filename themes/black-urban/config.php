<?php
/**
 * Don't change this is file
 */
return array(
            "sidebar"   => 'right',
            'layout'    =>  array(           // layouts styles
                        'width'   => 1024,   // container width
                        'sidebar' => 240,    // sidebar width
                        'extra'   => 240,    // extrabar  width
                        'home'    => 'default',
                        'archive' => 'default',
                        'search'  => 'default',
                        'index'   => 'default',
                                 ),
            "title"     => array(
                        "pos" => 'center'
                    ),
            "footer"    => array(            // footer text
                        "text" => null
                    ),
            "fonts"     => array(
                        'header' => 1,
                        'body'   => 0,
                    ),
            "menu"     => array(
                        "type" => 1,
                        "home" => false,
                        "rss"  => false,
                        "size" => false,
                    ),
            "slideshow" => array(
                        "layout" => 'in',
                        "id" => null,
                        "height" => 200,
                        "onpage" => false,    // show slideshow on page
                        "onsingle" => false   // show slideshow on single post
                    ),
            "images"   => array(
                        "body" => array('src'=>'', 'pos'=>'left top', 'repeat'=>'repeat'),
                        "wrap" => array('src'=>'themes/black-urban/header.jpg','pos'=>'center top'),
                        "sidebar" => array('src'=>'themes/black-urban/sidebar.jpg','pos'=>'right bottom'),
                        "extrabar" => array('src'=>'','pos'=>'right bottom'),
                        "footer"  => array('src'=>'themes/black-urban/footer.jpg','pos'=>'left bottom'),
                    ),
            "opacity"   => 'dark',
            "color"   => array(
                        "bg"      => '#000',
                        "bg2"     => '#333',
                        "opacity" => '#000',
                        "title"   => '#fff',
                        "title2"  => '#ccc',
                        "text"    => '#fff',
                        "text2"   => '#ccc',
                        "border"  => '#555',
                        "border2" => '#999',

                        "header1"   => '#ff6600',
                        "header2"   => '#ff7711',
                        "header3"   => '#ff9933',
                    ),
            );