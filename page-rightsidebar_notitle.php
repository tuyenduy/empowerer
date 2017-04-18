<?php
/*
Template Name: Right Sidebar No Title
Template Type: post,page
 */
?>
<?=get_header();?>
<div class="container">
    <div class="col col-md-8">
        
<?php
if(have_posts()){
  while(have_posts()){
      the_post();
      the_content();
  }  
}
?>
        </div>
    <div class="col col-md-4" id="sidebar-right" style="background-color:#fff">
        <?php  dynamic_sidebar('sidebar-2'); ?>
    </div>
</div>
<?=get_footer();?>