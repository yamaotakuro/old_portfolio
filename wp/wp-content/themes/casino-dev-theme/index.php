<?php 
/*
 Casino Theme - Version: 1.3
*/
get_header(); ?>

<article id="index">
  <section id="sec01" class="animation">
    <h3 class="icoTtl"><span><i class="ion-android-person"></i></span>ABOUT</h3>
    <div class="row">
      <div class="col-sm-6 animationElm tbl">
        <table>
          <tr>
            <th>Name</th>
            <td>Takuro Yamao</td>
          </tr>
          <tr>
            <th>Age</th>
            <td>28</td>
          </tr>
          <tr>
            <th>Job</th>
            <td>Mark Up Enginner</td>
          </tr>
          <tr>
            <th>Address</th>
            <td>Osaka Japan</td>
          </tr>
          <tr>
            <th>Like</th>
            <td>Horse racing ,Coffee</td>
          </tr>
        </table>
      </div>
      <div class="col-sm-6 aboutImg animationElm"><img src="img/index/top_img01.jpg" alt="img"></div>
    <!-- /.row --></div>
  <!-- /#sec01 --></section>

  <section id="sec02" class="animation">
    <h3 class="icoTtl"><span><i class="devicons devicons-code"></i></span>SKILS</h3>
    <ul class="row skilList">
      <li class="col-md-3 col-xs-6 animationElm" data-delay="400"><span><i class="devicons devicons-html5"></i></span></li>
      <li class="col-md-3 col-xs-6 animationElm" data-delay="600"><span><i class="devicons devicons-css3"></i></span></li>
      <li class="col-md-3 col-xs-6 animationElm" data-delay="800"><span><i class="devicons devicons-jquery"></i></span></li>
      <li class="col-md-3 col-xs-6 animationElm" data-delay="1000"><span><i class="devicons devicons-wordpress"></i></span></li>
      <li class="col-md-3 col-xs-6 animationElm" data-delay="1200"><span><i class="devicons devicons-sass"></i></span></li>
      <li class="col-md-3 col-xs-6 animationElm" data-delay="1400"><span><i class="devicons devicons-angular"></i></span></li>
      <li class="col-md-3 col-xs-6 animationElm" data-delay="1600"><span><i class="devicons devicons-bootstrap"></i></span></li>
      <li class="col-md-3 col-xs-6 animationElm" data-delay="1800"><span><i class="devicons devicons-laravel"></i></span></li>
      <li class="col-md-3 col-xs-6 animationElm" data-delay="2000"><span><i class="devicons devicons-git"></i></span></li>
      <li class="col-md-3 col-xs-6 animationElm" data-delay="2200"><span><i class="devicons devicons-sublime"></i></span></li>
      <li class="col-md-3 col-xs-6 animationElm" data-delay="2400"><span><i class="devicons devicons-chrome"></i></span></li>
      <li class="col-md-3 col-xs-6 animationElm" data-delay="2600"><span><i class="devicons devicons-linux"></i></span></li>
    <!-- /.row --></ul>
  <!-- /#sec02 --></section>

  <section id="sec03" class="animation">
    <div class="row">
      <h3 class="icoTtl"><span><i class="ion-folder"></i></span>WORKS</h3>
      <ul class="worksArea">
	      <?php 
	      $works_posts = new WP_Query(
	      	array(
			        'posts_per_page' => '6', //表示件数。-1なら全件表示
			        'post_type' => 'works', //カスタム投稿タイプの名称を入れる
			    )
			  );
	      if ( $works_posts->have_posts() ) :
	      	$cnt = 4;
	      	while ( $works_posts->have_posts() ) : $works_posts->the_post();
					
						// locate_template( array( 'list-post-with-thumbnail.php' ), true, false ); //リストループ用テンプレートを読み込む
					  $img01 = types_render_field( "img01", array( "size" => "thumbnail"));
					 ?>
					<li class="col-sm-3 col-xs-6 animationElm" data-delay="<?php echo $cnt; ?>00">
					  <a href="<?php the_permalink(); ?>" class="modal--inline">
					    <?php echo $img01; ?> 
					    <span><?php the_title(); ?></span>
					  </a>
					</li>
					<?php
					$cnt +=1;
					$cnt ++;	
					endwhile; ?>
				<?php wp_reset_postdata(); else : echo '<li>まだ記事はありません。</li>'; endif; ?>
        
      <!-- /.worksArea --></ul>
    <!-- /.row --></div>
  <!-- /#sec03 --></section>

  <section id="sec04">
    <div class="row">
      <h3 class="icoTtl"><span><i class="ion-android-mail"></i></span>CONTACT</h3>

      <?php echo do_shortcode('[contact-form-7 id="25" title="コンタクトフォーム 1"]'); ?>
    <!-- /.row --></div>
  <!-- /#sec04 --></section>
  
<!-- #index --></article>

<?php get_footer(); ?>