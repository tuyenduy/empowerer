<?php
/*
Template Name: Post left Sidebar
Template Post Type: post
 */
?>
<?= get_header(); ?>
<div class="container">
    <aside class="col-md-4">
        <?php dynamic_sidebar('sidebar-1'); ?>
    </aside>
    <div class="col-md-8">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                ?>
                <h2 class="text-center" style="margin:30px 0 20px"><?php the_title() ?></h2>
                <hr/>
                <?php
                the_content();
            }
        }
        ?>
    </div>
</div>
<?= get_footer(); ?>