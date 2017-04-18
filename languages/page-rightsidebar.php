<?php
/*
Template Name: Right Sidebar
 */
?>
<?=get_header();?>
<div class="container">
    <div class="col col-md-8">
        
<?php
if(have_posts()){
  while(have_posts()){
      the_post();
      ?>
        <h2 class="text-center" style="margin:30px 0 20px"><?php the_title()?></h2>
        <hr/>
        <?php
      the_content();
  }  
}
?>
        </div>
    <div class="col col-md-4" id="sidebar-right">
        <?php  dynamic_sidebar('sidebar-2'); ?>
    </div>
</div>
<?=get_footer();?>