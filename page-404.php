<?=get_header();?>
<?php
if(have_posts()){
  while(have_posts()){
      the_post();
      //var_dump(the_post());
      echo "is this it?";
      the_title();
      the_time();
      the_category();
      the_content();
  }  
}
?>
<?=get_footer();?>