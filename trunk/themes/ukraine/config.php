<?php
/**
 * Don't change this is file
 */
return array(
            "sidebar"   => 'right',
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
            "title"     => array(
                        "pos" => 'center'
                    ),
            "content"   => array(            // content
                        "author" => 0        // - link to author page
                        ),
            "footer"    => array(            // footer text
                        "text" => null
                    ),
            "fonts"     => array(
                        'header' => 0,
                        'body'   => 0,
                    ),
            "menu"     => array(
                        "type" => 2,
                        "home" => false,
                        "rss"  => true,
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
                        "body" => array('src'=>'themes/ukraine/body.png', 'pos'=>'left top', 'repeat'=>'repeat-y', 'fixed'=>true),
                        "wrap" => array('src'=>'','pos'=>'center top', 'fixed'=>false),
                        "sidebar"  => array('src'=>'','pos'=>'right bottom'),
                        "extrabar" => array('src'=>'','pos'=>'right bottom'),
                        "footer"   => array('src'=>'','pos'=>'left bottom'),
                    ),
            "opacity"   => 'lighthigh',
            "shadow"    => true,             // create shadow
            "color"   => array(
                        "bg"      => '#fff',
                        "bg2"     => '#fff5c5',
                        "opacity" => '#fff',
                        "title"   => '#333',
                        "title2"  => '#e60000',
                        "text"    => '#333',
                        "text2"   => '#aaa',
                        "border"  => '#aaa',
                        "border2" => '#999',

					    'header1' => '#ff0000',
					    'header2' => '#ff1212',
					    'header3' => '#ff3333',
                    ),
            );