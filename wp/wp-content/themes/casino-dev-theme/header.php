<?php 
/*
 Casino Theme - Version: 1.3
*/
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title><?php if( is_home() && !is_paged() ) { echo do_shortcode('[uf_top_title]'); } else { wp_title('|',true,'right') ; echo do_shortcode('[uf_additional_title]'); } ?></title>
<?php if ( is_single() ) { // エントリーページ 
if ($post->post_excerpt){ // 抜粋あり
$summary = strip_tags($post->post_excerpt);
$summary = ereg_replace("(\r\n|\r|\n)", "", $summary); ?>
<meta name="description" content="<? echo $summary; ?>" />
<?php } else { // 抜粋なし
$content_summary = strip_tags($post->post_content);
$content_summary = ereg_replace("(\r\n|\r|\n)", "", $content_summary);
$content_summary = mb_substr($content_summary, 0, 60). "..."; ?>
<meta name="description" content="<?php echo $content_summary; ?>" />
<?php } 
} else { // エントリーページ以外 ?>
<meta name="description" content="<?php wp_title('のページ。',true,'right'); ?><?php bloginfo('description'); ?>" />
<?php } ?> 
<meta name="keywords" content="<?php echo do_shortcode('[uf_meta_keywords]'); ?>">
<meta name="robots" content="index,follow">
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="<?php echo HOME; ?>common/img/ico/favicon.ico">
<link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo HOME; ?>common/img/ico/favicon.ico">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo HOME; ?>common/img/ico/favicon.ico">
<?php wp_head(); ?>
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->


</head>

<div class="loading">
  <div class="loadingAnim">
    <div class="box1"></div>
    <div class="box2"></div>
    <div class="box3"></div>
    <div class="box4"></div>
  </div>
</div>

<body <?php body_class(); ?>>

<div id="page" class="hide">

<header id="header" class="mainImg">
  <canvas id="canvas"></canvas>
  <div class="container">
    <ul class="navi xs-center">
      <li><a href="#sec01">ABOUT</a></li>
      <li><a href="#sec02">SKILS</a></li>
      <li><a href="#sec03">WORKS</a></li>
      <li><a href="#sec04">CONTACT</a></li>
    <!-- /.navi --></ul>

    <div class="logo">
      <h1>CASINO-DEV.COM</h1>
      <h2>Takuro Yamao of Prtfolio</h2>
    </div>
  <!-- /.container --></div>
<!-- / #header --></header>

<!--    コンテンツ  -->  
<div class="container">
  <div id="main">
