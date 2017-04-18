<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function empowerer_script_enqueue() {
    //$cur_theme = strtolower(get_option('bootstrap_theme_id'));
    $settings = json_decode(get_option('empowerer_settings'));
    //$cur_theme = $settings->bootstrap_theme_id;
    //wp_enqueue_style( string $handle, string $src = false, array $deps = array(), string|bool|null $ver = false, string $media = 'all' )
//    
//    <link href="css/prettyPhoto.css" rel="stylesheet">
//    <link href="css/animate.min.css" rel="stylesheet">
//    <link href="css/main.css" rel="stylesheet">
//    <link href="css/responsive.css" rel="stylesheet">

    wp_enqueue_style('bootstrapcss', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', array(), false, false);
    wp_enqueue_style('fontawesomecss', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css', array(), false, false);
    wp_enqueue_style('prettyphotocss', get_template_directory_uri() . '/css/prettyPhoto.css', array(), false, false);
    wp_enqueue_style('animatecss', get_template_directory_uri() . '/css/animate.min.css', array(), false, false);
    wp_enqueue_style('maincss', get_template_directory_uri() . '/css/main.css', array(), false, false);
    wp_enqueue_style('responsivecss', get_template_directory_uri() . '/css/responsive.css', array(), false, false);
    wp_enqueue_style('themecss', get_template_directory_uri() . '/css/theme.css', array(), false, false);
    wp_add_inline_style('themecss', create_customizer_css());

    //wp_enqueue_script( string $handle, string $src = false, array $deps = array(), string|bool|null $ver = false, bool $in_footer = false );
//    
//    <script src="js/html5shiv.js"></script>
//    <script src="js/respond.min.js"></script>


    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.1.1.min.js', array(), false, false);
//    wp_enqueue_script('migrate', get_template_directory_uri() . '/js/jquery-migrate-1.2.1.min.js', array(), false, false);
//    wp_enqueue_script('html5shivjs', get_template_directory_uri() . '/js/html5shiv.js', array(), false, false);
//    wp_enqueue_script('respondjs', get_template_directory_uri() . '/js/respond.min.js', array(), false, false);
    wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array(), false, false);
//    

    $font_main_menu = str_replace(" ", "+", get_theme_mod('font_main_menu'));
    if ($font_main_menu) {
        wp_enqueue_style('font_main_menu', '//fonts.googleapis.com/css?family=' . $font_main_menu);
    } else {
        wp_enqueue_style('font_main_menu', '//fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
    }

    wp_enqueue_script('themejs', get_template_directory_uri() . '/js/theme.js', array(), '', 'true');
}

add_action('wp_enqueue_scripts', 'empowerer_script_enqueue');

function empowerer_theme_setup() {
    // enable menus support
    add_theme_support('menus');
    register_nav_menu('primary', 'Primary Header Navigation');
    register_nav_menu('footer', 'Footer Navigation');
    load_theme_textdomain('empowerer', get_template_directory() . '/languages');
    // other WP original theme supports
    empowerer_enable_standard_theme_supports();
}

add_action('init', 'empowerer_theme_setup');

function empowerer_enable_standard_theme_supports() {
    // quick enable WP original supports
//    Post Formats #Post Formats
//
//    This feature enables Post Formats support for a theme. When using child themes, be aware that
//    add_theme_support( 'post-formats' )
//    will override the formats as defined by the parent theme, not add to it.
//    To enable the specific formats (see supported formats at Post Formats), use:
//
//    add_theme_support('post-formats', array('aside', 'gallery'));
//    To check if there is a ‘quote’ post format assigned to the post, use has_post_format():
//    // In your theme single.php, page.php or custom post type
//    if ( has_post_format( 'quote' ) ) {
//        echo 'This is a quote.';
//      }
//        Post Thumbnails #Post Thumbnails
//
//        This feature enables Post Thumbnails support for a theme. Note that you can optionally pass a second argument, $args, with an array of the Post Types for which you want to enable this feature.
//
//        add_theme_support( 'post-thumbnails' );
    add_theme_support('post-thumbnails', array('post', 'page'));
//        add_theme_support( 'post-thumbnails', array( 'page' ) );          // Pages only
//        add_theme_support( 'post-thumbnails', array( 'post', 'movie' ) ); // Posts and Movies
//        This feature must be called before the ‘init’ hook is fired. That means it needs to be placed directly into functions.php or within a function attached to the ‘after_setup_theme’ hook. For custom post types, you can also add post thumbnails using the register_post_type() function as well.
//
//        To display thumbnails in themes index.php or single.php or custom templates, use:
//        the_post_thumbnail();
//        To check if there is a post thumbnail assigned to the post before displaying it, use:
//        if ( has_post_thumbnail() ) {
//            the_post_thumbnail();
//        }
//        Custom Background #Custom Background
//
//        This feature enables Custom_Backgrounds support for a theme.
//    add_theme_support('custom-background');
//        Note that you can add default arguments using:
//        $defaults = array(
//            'default-color'          => '',
//            'default-image'          => '',
//            'wp-head-callback'       => '_custom_background_cb',
//            'admin-head-callback'    => '',
//            'admin-preview-callback' => ''
//        );
//        add_theme_support( 'custom-background', $defaults );
//        Custom Header #Custom Header
//
//        This feature enables Custom_Headers support for a theme.

    add_theme_support('custom-header');
//        Note that you can add default arguments using:
//
//        $defaults = array(
//            'default-image'          => '',
//            'random-default'         => false,
//            'width'                  => 0,
//            'height'                 => 0,
//            'flex-height'            => false,
//            'flex-width'             => false,
//            'default-text-color'     => '',
//            'header-text'            => true,
//            'uploads'                => true,
//            'wp-head-callback'       => '',
//            'admin-head-callback'    => '',
//            'admin-preview-callback' => '',
//        );
//        add_theme_support( 'custom-header', $defaults );
//    Custom Logo #Custom Logo
//
//    This feature, first introduced in Version_4.5, enables Theme_Logo support for a theme.
//
//    add_theme_support('custom-logo');
//    Note that you can add default arguments using:
//
//    add_theme_support( 'custom-logo', array(
//        'height'      => 100,
//        'width'       => 400,
//        'flex-height' => true,
//        'flex-width'  => true,
//        'header-text' => array( 'site-title', 'site-description' ),
//    ) );
//    Feed Links #Feed Links
//
//    This feature enables Automatic Feed Links for post and comment in the head. This should be used in place of the deprecated automatic_feed_links() function.
//    add_theme_support('automatic-feed-links');
//HTML5 #HTML5
//
//This feature allows the use of HTML5 markup for the search forms, comment forms, comment lists, gallery, and caption.
//add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
//Title Tag #Title Tag
//This feature enables plugins and themes to manage the document title tag. This should be used in place of wp_title() function.
//
//add_theme_support( 'title-tag' );
//
//Customize Selective Refresh Widgets #Customize Selective Refresh Widgets
//This feature enables Selective Refresh for Widgets being managed within the Customizer. This feature became available in WordPress 4.5. For more on why and how Selective Refresh works read Implementing Selective Refresh Support for Widgets.
//
//add_theme_support( 'customize-selective-refresh-widgets' );
//
//Multisite #Multisite
//
//To show the “Featured Image” meta box in Multisite installation, make sure you update the allowed upload file types, in Network Admin, Network Admin Settings SubPanel#Upload_Settings, Media upload buttons options. Default is jpg jpeg png gif mp3 mov avi wmv midi mid pdf.
}

function theme_slug_widgets_init() {
    register_sidebar(array(
        'name' => __('Left Sidebar', 'empowerer'),
        'id' => 'sidebar-1',
        'description' => __('Widgets in this area will be shown on all posts and pages.', 'empowerer'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('Right Sidebar', 'empowerer'),
        'id' => 'sidebar-2',
        'description' => __('Widgets in this area will be shown on some pages.', 'empowerer'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('First Bottom Column', 'empowerer'),
        'id' => 'sidebar-b1',
        'description' => __('First Bottom Column', 'empowerer'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('Second Bottom Column', 'empowerer'),
        'id' => 'sidebar-b2',
        'description' => __('Second Bottom Column', 'empowerer'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('Third Bottom Column', 'empowerer'),
        'id' => 'sidebar-b3',
        'description' => __('Third Bottom Column', 'empowerer'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('Fourth Bottom Column', 'empowerer'),
        'id' => 'sidebar-b4',
        'description' => __('Fourth Bottom Column', 'empowerer'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'theme_slug_widgets_init'); // this type of action requires specific call point

function create_customizer_css() {

    $css = '';
    $css .= '@import url(http://fonts.googleapis.com/css?family='.get_theme_mod('body_text_font').')';
    $css .= '@import url(http://fonts.googleapis.com/css?family='.get_theme_mod('font_main_menu').')';
// body & typo
    $body_text_color = get_theme_mod('body_text_color', '#444444');
    $css .= "body { color: " . $body_text_color . "; font-family: '".get_theme_mod('body_text_font')."'; font-size:".get_theme_mod('body_text_font_size')."}";
    $css .= "body { background:#fff  url('" . get_theme_mod('site_bg_img') . "') bottom center no-repeat }";
    $top_bar_bg = get_theme_mod('top_bar_bg', '#191919');
// links
    $css .= "a { color: ".get_theme_mod('link_color').";}";
    $css .= "a:hover, a:focus { color: ".get_theme_mod('link_hover_color').";}";
// heading
    $css .= "h1,h2,h3,h4,h5 {color: " . get_theme_mod('heading_color') . "}";
    if (get_theme_mod('heading_bold'))
        $css .= "h1,h2,h3,h4,h5 {font-weight: bold}";
    $h1_size = get_theme_mod('h1_size');
    $css .= "h1 {font-size: " . $h1_size . "%}";
    $css .= "h2 {font-size: " . ($h1_size-10) . "%}";
    $css .= "h3 {font-size: " . ($h1_size-20) . "%}";
    $css .= "h4 {font-size: " . ($h1_size-30) . "%}";
    $css .= "h5 {font-size: " . ($h1_size-40) . "%}";
    if (get_theme_mod('heading_transform') == 'capitalize')
        $css .= "h1,h2,h3,h4,h5  {text-transform: capitalize;}";
    if (get_theme_mod('heading_transform') == 'uppercase')
        $css .= "h1,h2,h3,h4,h5  {text-transform: uppercase;}";
// top bar
    $top_bar_color = get_theme_mod('top_bar_text_color');
    //$top_bar_color_inversed = color_inverse($top_bar_color);

    $top_bar_button_color = get_theme_mod('top_bar_button_color', '#ffffff');
    //$top_bar_button_color_inversed = color_inverse($top_bar_button_color);
    
    if(!empty(get_theme_mod('topbar_bg_img'))) {
        $css.= ".top-bar {background:  url('" . get_theme_mod('topbar_bg_img') . "') bottom center no-repeat; border-bottom:0;}";
    }else {
        $css .= ".top-bar {background: " . $top_bar_bg . "; border-bottom: 1px solid " . get_theme_mod('top_bar_bottom') . ";}";
    }
    $css .= "#top-headline {color: " . $top_bar_color . "; font-size:130%}"
            . "ul.social-share li a {color: " . $top_bar_color . "; background:" . $top_bar_button_color . ";}"
            . "input.search-form {color: " . $top_bar_color . "; }"
            . ".search i {color: " . $top_bar_color . ";}"
            . ".search button {background:" . $top_bar_button_color . ";}";
    // header
    $css .= "#header{ background: " . get_theme_mod('header_bg_color');
    if(!empty(get_theme_mod('header_bg_img'))) $css.= " url('" . get_theme_mod('header_bg_img') . "') bottom center no-repeat;}";
    else $css.= " ;}";
    $css .= ".navbar-nav>li>a {font-family: '" . get_theme_mod('font_main_menu') . "'}";
    $css .= ".navbar-nav>li>a {color: " . get_theme_mod('font_main_menu_color') . "}";
    $css .= ".navbar-nav>li>a:hover {color: " . get_theme_mod('font_main_menu_color_hover') . "}";
    if (get_theme_mod('font_main_menu_bold'))
        $css .= ".navbar-nav>li>a {font-weight: bold}";
    $css .= ".navbar-nav>li>a {font-size: " . get_theme_mod('font_main_menu_size') . "%}";
    if (get_theme_mod('font_main_menu_transform') == 'capitalize')
        $css .= ".navbar-nav>li>a {text-transform: capitalize;}";
    if (get_theme_mod('font_main_menu_transform') == 'uppercase')
        $css .= ".navbar-nav>li>a {text-transform: uppercase;}";
    // footer
    $css .= "#bottom { background: ". get_theme_mod('footer_widget_bg') . "; border-bottom: ".  get_theme_mod('footer_sep_thick')."px solid " . get_theme_mod('footer_widget_border') . "}";
    $css .= "#footer { background: ". get_theme_mod('footer_copy_bg') . "; }";
    $css .= "#copyright-text { float: ". get_theme_mod('footer_copy_float') . "; }";
    if(get_theme_mod('footer_copy_float') == 'right'){
        $css .= "#copyright-float { float: right; }";
    }else{
        $css .= "#footer .menu { float: right; }";
    }

    return $css;
}

function color_inverse($color) {
    $color = str_replace('#', '', $color);
    if (strlen($color) != 6) {
        return '000000';
    }
    $rgb = '';
    for ($x = 0; $x < 3; $x++) {
        $c = 255 - hexdec(substr($color, (2 * $x), 2));
        $c = ($c < 0) ? 0 : dechex($c);
        $rgb .= (strlen($c) < 2) ? '0' . $c : $c;
    }
    return '#' . $rgb;
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Custom dropdown menu and navbar in walker class
 */
require get_template_directory() . '/inc/navwalker.php';
//require get_template_directory() . '/inc/BootstrapBasicMyWalkerNavMenu.php';
/**
 * Template functions
 */
require get_template_directory() . '/inc/template-functions.php';
/**
 * Admin option page
 */
/**
 * Include our Customizer settings.

 */
require get_template_directory() . '/inc/customizer/google-fonts.php';
require get_template_directory() . '/inc/customizer/class-customizer.php';

new Empowerer_Customizer();
if (is_admin()) {
    require get_template_directory() . '/inc/admin-function.php';
}