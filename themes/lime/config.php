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
                        'header' => 0,
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
                        "wrap" => array('src'=>'themes/lime/header.jpg','pos'=>'center top'),
                        "sidebar" => array('src'=>'','pos'=>'right bottom'),
                        "footer"  => array('src'=>'','pos'=>'left bottom'),
                    ),
            "opacity"   => 'light',
            "color"   => array(
                        "bg"      => '#fff',
                        "bg2"     => '#DFA',
                        "opacity" => '#fff',
                        "title"   => '#333',
                        "title2"  => '#555',
                        "text"    => '#333',
                        "text2"   => '#aaa',
                        "border"  => '#aaa',
                        "border2" => '#999',

                        "header1"   => '#60a000',
                        "header2"   => '#66aa11',
                        "header3"   => '#70b020',
                    ),

            );