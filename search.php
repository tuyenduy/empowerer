<?php
/**
 * The template for displaying search results.
 * 
 * @package bootstrap-basic
 */
get_header();

/**
 * determine main column size from actived sidebar
 */
?>
<div class="container">
    <aside class="col-md-4">
        <?php dynamic_sidebar('sidebar-1'); ?>
    </aside>
    <div class="col-md-8 content-area" id="main-column">
        <?php if (have_posts()) { ?> 
            <header class="page-header">
                <h1 class="page-title"><?php printf(__('Kết quả tìm kiếm: %s', 'bootstrap-basic'), '<span>' . get_search_query() . '</span>'); ?></h1>
            </header><!-- .page-header -->
            <?php
            // start the loop
            while (have_posts()) {
                the_post();

                /* Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part('content', 'search');
            }// end while

            bootstrapBasicPagination();
            ?> 
        <?php } else { ?> 
            <?php get_template_part('no-results', 'search'); ?>
        <?php } // endif; ?> 
        </main>
    </div>
</div>
<?php get_footer(); ?> 