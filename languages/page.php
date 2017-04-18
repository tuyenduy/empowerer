<?php
/*
Template Name: Default Page
 */
?>
<?=get_header();?>
<?php
if(have_posts()){
  while(have_posts()){
      the_post();
      ?>
        <h2 class="text-center"><?php the_title()?></h2>
        <hr/>
        <?php
      //var_dump(the_post());
//      the_title();
//      the_time();
//      the_category();
//      the_content();
  }  
}
?>
<?=get_footer();?>