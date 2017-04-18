<?php
/*
  Template Name: Full width
 */
?>
<?= get_header(); ?>
<div class="container">
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            ?>
            <div class="center" style="margin-top:50px">
                <h2><?php the_title() ?></h2>
                
            </div>
            <?php
            the_content();
        }
    }
    ?>

</div>
<?= get_footer(); ?>