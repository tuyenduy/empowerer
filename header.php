<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title><?php
    /*
     * Print the <title> tag based on what is being viewed.
     */
    global $page, $paged;

    wp_title( '|', true, 'right' );

    // Add the blog name.
    bloginfo( 'name' );

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        echo " | $site_description";

    // Add a page number if necessary:
    if ( $paged >= 2 || $page >= 2 )
        echo ' | ' . sprintf( __( 'Page %s', 'venedor' ), max( $paged, $page ) );

    ?></title>
        <meta name="description" content="<?php bloginfo('description'); ?>">
        <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
        <link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php wp_head(); ?>
    </head>
    <body <?php body_class() ?>>
        <header id="header">
            <?php if (get_theme_mod('top_bar_enable', true)) { ?>
                <div class="top-bar">
                    <div class="container">
                        <div class="row">
                            <?php if (get_theme_mod('top_bar_social_enable', true)) { ?> 
                                <div class="col-sm-6 col-xs-4">
                                    <div class="top-number"><p><?php echo get_theme_mod('top_bar_text', 'Top text'); ?></p></div>
                                </div>
                                <div class="col-sm-6 col-xs-8">
                                    <div class="social">
                                        <ul class="social-share">
                                            
                                            <?php
                                            if (!empty(get_theme_mod('url_facebook'))) {
                                                ?>
                                                <li><a href="<?php echo get_theme_mod('url_facebook'); ?>"><i class="fa fa-facebook"></i></a></li>
                                                <?php
                                            }

                                            if (!empty(get_theme_mod('url_linkedin'))) {
                                                ?>
                                                <li><a href="<?php echo get_theme_mod('url_linkedin'); ?>"><i class="fa fa-linkedin"></i></a></li>
                                                <?php
                                            }

                                            if (!empty(get_theme_mod('url_twitter'))) {
                                                ?>
                                                <li><a href="<?php echo get_theme_mod('url_twitter'); ?>"><i class="fa fa-twitter"></i></a></li>
                                                <?php
                                            }

                                            if (!empty(get_theme_mod('url_youtube'))) {
                                                ?>
                                                <li><a href="<?php echo get_theme_mod('url_youtube'); ?>"><i class="fa fa-youtube"></i></a></li>
                                                <?php
                                            }

                                            if (!empty(get_theme_mod('url_pinterest'))) {
                                                ?>
                                                <li><a href="<?php echo get_theme_mod('url_pinterest'); ?>"><i class="fa fa-pinterest"></i></a></li>
                                                <?php
                                            }

                                            if (!empty(get_theme_mod('url_googleplus'))) {
                                                ?>
                                                <li><a href="<?php echo get_theme_mod('url_googleplus'); ?>"><i class="fa fa-google-plus"></i></a></li>
                                                <?php
                                            }

                                            if (!empty(get_theme_mod('url_skype'))) {
                                                ?>
                                                <li><a href="<?php echo get_theme_mod('url_skype'); ?>"><i class="fa fa-skype"></i></a></li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                        <div class="search">
                                            <form role="search" method="get" class="search-form form" action="<?php echo home_url("/search/") ?>">
                                                <input type="text" class="search-form" name="s" autocomplete="off" placeholder="Search keywords">
                                                <button type="submit" class="btn btn-xs"><i class="fa fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="col-sm-12 col-xs-12 text-right" id="top-headline">
                                    
                                    <?php echo get_theme_mod('top_bar_text', 'Top text'); ?>
                                    
                                </div>
                            <?php } ?>
                        </div>

                    </div><!--/.container-->
                </div><!--/.top-bar-->
            <?php } ?>
            <nav class="navbar " role="banner">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <?php
//                        $settings = json_decode(get_option('empowerer_settings'));
//                        $logo = $settings->logo_image;                      
                        ?>
                        <a class="navbar-brand" href="<?php echo site_url(); ?>"><img id="logo" src="<?php echo wp_get_attachment_url(get_theme_mod('header_logo')); ?>" alt="logo"></a>
                    </div>

                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class' => 'nav navbar-nav',
                        'container_class' => 'navbar-collapse navbar-right',
                        'walker' => new navwalker() // not neccessary
                            //'walker' => new BootstrapBasicMyWalkerNavMenu() 
                    ));
                    ?>

                </div><!--/.container-->
            </nav><!--/nav-->
        </header><!--/header-->
        <div class="clearfix"></div>
