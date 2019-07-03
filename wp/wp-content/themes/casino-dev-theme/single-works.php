<?php 
/*
 Casino Theme - Version: 1.3
*/
get_header("2"); ?>


<?php while (have_posts()) : the_post(); ?>

<?php 
  $img01 = types_render_field( "img01", array( "size" => "thumbnail"));
  $img02 = get_post_meta( $post->ID , 'wpcf-img02' , true );
  $text01 = get_post_meta( $post->ID , 'wpcf-text01' , true ); 
  $url01 = get_post_meta( $post->ID , 'wpcf-url01' , true ); 
?>

<div id="main">
  
  <article id="works">
    <section id="sec01" class="animation">
      <h3 class="icoTtl"><span><i class="ion-folder"></i></span>WORKS</h3>
      <div class="row">
        <div class="col-sm-6 imgThum">
          <img src="<?php echo $img02; ?>" alt="img" class="img-responsive">
        </div>
        <div class="col-sm-6 worksBody">
          <dl>
            <dt><?php the_title(); ?></dt>
            <dd><strong><?php echo $text01; ?></strong></dd>
            <dd><?php the_content(); ?></dd>
          </dl>
          <p class="tC"><a class="button" href="<?php echo $url01; ?>" target="_blank"><span data-hover="Go">ViewSite</span></a></p>
        </div>
      <!-- /.row --></div>
    <!-- /#sec01 --></section>
    
  <!-- #works --></article>

<!-- / #main --></div>
<?php endwhile;?>
