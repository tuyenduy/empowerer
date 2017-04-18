<?= get_header(); ?>
<div class="container">
    <aside class="col-md-3">
        <?php dynamic_sidebar('sidebar-1'); ?>
    </aside>
    <div class="col-md-9">
        <?php woocommerce_content(); ?>
    </div>
</div>
<?= get_footer(); ?>