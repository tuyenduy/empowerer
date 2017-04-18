<?php
/*
Template Name: Homepage by Teo
 */
?>
<?=get_header();?>

<?php
if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();
        the_content();
    }
}

?>
<?=get_footer();?>