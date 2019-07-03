<?php 
  $img01 = types_render_field( "img01", array( "size" => "thumbnail"));
?>
<li class="col-sm-4 col-xs-6 animationElm" data-delay="400">
  <a href="<?php the_permalink(); ?>" class="modal--inline">
    <?php echo $img01; ?> 
    <span><?php the_title(); ?></span>
  </a>
</li>

