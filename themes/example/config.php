<?php
/**
 * Don't change this is file
 */
return array(
    "sidebar" => 'right', // sidebar position
    'layout' => array(
        // layouts styles
        'header' => 140, // header height
        'width' => 1024, // container width
        'sidebar' => 240, // sidebar width
        'extra' => 240, // extrabar  width
        'home' => 'tile',
        'archive' => 'default',
        'search' => 'list',
        'index' => 'default',
    ),
    "title" => array(
        // title
        "pos" => 'bottom left' // - position
    ),
    "content" => array(
        // content
        'date' => 1, // show date
        // content
        'links' => array(
            'author' => 0, // - link to author page
            'category' => 1, // - links to categories
            'tags' => 1, // - links to tags
            'comments' => 1 // - link to comments
        ),
        'widget' => array(
            'flag' => false, // - enable content widget place
            'after' => 1 // - show after N post
        ),
        'social' => array(
            'twitter' => 1,
            'facebook' => 1,
            'del.icio.us' => 1,
            'reddit' => 1,
            'vkontakte' => 0,
            'digg' => 0,
            'mixx' => 0,
            'stumbleupon' => 0,
        )
    ),
    "footer" => array(
        // footer text
        "text" => '&copy; ' . date('Y') . ' ' . sprintf(__('%1$s is proudly powered by %2$s', 'constructor'), get_bloginfo('name'), '<a href="http://wordpress.org/">WordPress</a>') .
                  ' | <a href="http://anton.shevchuk.name/">' . __('Constructor Theme', 'constructor') . '</a>'
    ),
    "fonts" => array(
        // fonts
        'title' => array(
            'family' => 'Arial,Helvetica,sans-serif',
            'size' => 64,
            'weight' => 800,
            'color' => '#333',
            'transform' => 'uppercase',

        ),
        'description' => array(
            'family' => 'Arial,Helvetica,sans-serif',
            'size' => 14,
            'weight' => 600,
            'color' => '#777',
            'transform' => 'uppercase'
        ),
        'header' => array(
            'family' => 'Arial,Helvetica,sans-serif'
        ),
        'content' => array(
            'family' => 'Arial,Helvetica,sans-serif'
        ),
    ),
    "menu" => array(
        // menu with links
        "flag" => 1, // - enable/disable
        "home" => true, // - link to home page
        "rss" => true, // - link to RSS
        "search" => true, // - search form
        "pages" => array(
            'depth' => 3
        ),
        "categories" => array(
            'depth' => 3, 'group' => 1
        )
    ),
    "slideshow" => array(
        "flag" => 1, // - enable/disable
        "layout" => 'in', // - slideshow "in" main container or "over"
        "showposts" => 10, // - show last N slides
        "metakey" => 'thumb-slideshow', // - custom field name
        "id" => null, // - slideshow ID
        "height" => 200, // - height in px
        "onpage" => false, // - show slideshow on page
        "onsingle" => false // - show slideshow on single post
    ),
    "images" => array(
        // background images
        "body" => array(
            'src' => 'gradient.png', 'pos' => 'left top', 'repeat' => 'repeat-x', 'fixed' => false
        ),
        "wrap" => array(
            'src' => 'header.png', 'pos' => 'center top', 'repeat' => 'no-repeat', 'fixed' => false
        ),
        "wrapper" => array(
            'src' => 'wrapper.png', 'pos' => 'left top', 'repeat' => 'repeat-y'
        ),
        "sidebar" => array(
            'src' => 'sidebar.png', 'pos' => 'right bottom', 'repeat' => 'no-repeat'
        ),
        "extrabar" => array(
            'src' => '', 'pos' => 'right bottom', 'repeat' => 'no-repeat'
        ),
        "footer" => array(
            'src' => 'footer.png', 'pos' => 'right bottom', 'repeat' => 'no-repeat'
        ),
    ),
    "opacity" => 'light', // type of opacity
    "shadow" => true, // create shadow
    "color" => array(
        // theme colors
        "bg" => '#fff',
        "bg2" => '#fff5c5',
        "opacity" => '#fff',
        "title" => '#333',
        "title2" => '#555',
        "text" => '#333',
        "text2" => '#aaa',
        "border" => '#aaa',
        "border2" => '#999',

        "header1" => '#ff6600',
        "header2" => '#ff7711',
        "header3" => '#ff9933',
    )
);