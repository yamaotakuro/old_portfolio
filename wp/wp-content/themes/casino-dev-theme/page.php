<?php 
/*
 Casino Theme - Version: 1.3
*/
get_header(3); ?>

<div class="bgWhite">

<?php
$first = true;
if(have_posts()):
  while(have_posts()):
    the_post();

  if($first){
    $first = false;
remove_filter('the_content','wpautop');
the_content();
add_filter('the_content','wpautop');
  }
  else
    the_excerpt();
  endwhile;
endif;
?>

<!-- /.bgWhite --></div>

<?php get_footer(2); ?>