<?php
/*
 Casino Theme - Version: 1.3
*/

//テーマセットアップ
function uniontheme_setup() {
	
	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );

}
add_action( 'after_setup_theme', 'uniontheme_setup' );

//プラグインの更新を非表示/
add_action('admin_menu', 'remove_counts');
function remove_counts(){
  global $menu,$submenu;
  $menu[65][0] = 'プラグイン';
  $submenu['index.php'][10][0] = '更新';
}
 
//wp_head非表示項目
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'feed_links_extra',3,0);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'rel_canonical');
 
//カテゴリーの階層を保持
function lig_wp_category_terms_checklist_no_top( $args, $post_id = null ) {
    $args['checked_ontop'] = false;
    return $args;
}
add_action( 'wp_terms_checklist_args', 'lig_wp_category_terms_checklist_no_top' );
 
//wordpressのjqueryを使わない
function no_wp_jquery() {
  if(!is_admin()){  
    wp_deregister_script( 'jquery' ); 
  }
}
add_action('wp_enqueue_scripts','no_wp_jquery');

//jsを読込む
function common_scripts() {
  if(!is_admin()){
    wp_enqueue_script('jquery','http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
    wp_enqueue_script('bootstrap','https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js');
    wp_enqueue_script('fancy',esc_url(home_url('/')).'common/js/fancybox/jquery.fancybox.pack.js');
    wp_enqueue_script('scripts',esc_url(home_url('/')).'common/js/min/scripts.js');
  }
}
add_action('wp_footer','common_scripts');

//csssを読込む
function common_styles() {
  if(!is_admin()){
    wp_enqueue_style('bootstrap','https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css');
    wp_enqueue_style('ico','http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');
    wp_enqueue_style('devicon',esc_url(home_url('/')).'common/css/devicons.min.css');
    wp_enqueue_style('fancy',esc_url(home_url('/')).'common/js/fancybox/jquery.fancybox.css');
    wp_enqueue_style('style',esc_url(home_url('/')).'common/css/style.css');
  }
}
add_action('wp_print_styles','common_styles');
 
 
//年月日アーカイブのタイトル日本語表記を整える
function ja_date_wp_title($title, $sep, $seplocation) {
    $year = get_query_var('year');
    $monthnum = get_query_var('monthnum');
    $day = get_query_var('day');
 
    // from wp-includes/general-template.php:wp_title()
    if ( is_archive() && !empty($year) ) {
      $title = $year . "年";
      if ( !empty($monthnum) )
        $title .= zeroise($monthnum, 2) . "月";
      if ( !empty($day) )
        $title .= zeroise($day, 2) . "日";
 
      if ($seplocation == 'right') {
        $title = $title . ' ' . $sep . ' ';
      } else {
        $title = $sep . ' ' . $title . ' ';
      }
    }
 
    return $title;
}
add_filter('wp_title', 'ja_date_wp_title', 10, 3);
 
// フィルタの登録
add_filter('content_save_pre','tag_save_pre');
 
function tag_save_pre($content){
    global $allowedposttags;
 
    // iframeとiframeで使える属性を指定する
    $allowedposttags['iframe'] = array('class' => array () , 'src'=>array() , 'width'=>array(),
    'height'=>array() , 'frameborder' => array() , 'scrolling'=>array(),'marginheight'=>array(),
    'marginwidth'=>array());
 
    return $content;
}
 
// 「コメント」と「ツール」を非表示にする
function remove_menus () {
if (!current_user_can('level_10')) { //管理者以外のユーザーの場合メニューをunsetする
global $menu;
unset($menu[25]); // コメント
unset($menu[75]); // ツール
}
}
add_action('admin_menu', 'remove_menus');

//改行なし、タグ削除、文字数制限
function strim($str,$size=100,$end="...") {
return mb_strimwidth(esc_html(strip_tags(strip_shortcodes($str))),0,$size,$end,'utf-8');
}
 
//コピーライト年号取得
function get_year($start){
  $year = date('Y');
  if($start != $year){
    return $start.' - '.$year;
}else{
   return $start;
}
}

//カスタム分類のラベルをwp_titleから削除
add_filter( 'wp_title', 'fix_wp_title', 10, 3 );
function fix_wp_title($title, $sep, $seplocation){
    global $wp_query;
    if ( is_tax() ) {
        $term = $wp_query->get_queried_object();
        $term = $term->name;
        $title =$term;
        $t_sep = '%WP_TITILE_SEP%'; // Temporary separator, for accurate flipping, if necessary
   
        $prefix = '';
        if ( !empty($title) )
            $prefix = " $sep ";
        if ( 'right' == $seplocation ) {
            $title_array = explode( $t_sep, $title );
            $title_array = array_reverse( $title_array );
            $title = implode( " $sep ", $title_array ) . $prefix;
        } else {
            $title_array = explode( $t_sep, $title );
            $title = $prefix . implode( " $sep ", $title_array );
        }
    }
    return $title;
}

// wp_list_pages からtitle属性を削除
function delete_list_page_title_attribute( $output ) {
     $output = preg_replace( '/ title="[^"]*"/', '', $output );
     return $output;
}
add_filter( 'wp_list_pages', 'delete_list_page_title_attribute' );

// wp_list_categories からtitle属性を削除
function delete_list_categories_title_attribute( $output ) {
     $output = preg_replace( '/ title="[^"]*"/', '', $output );
     return $output;
}
add_filter( 'wp_list_categories', 'delete_list_categories_title_attribute' );

/***************************************
カスタムショートコード設定
***************************************/
//ユーザーフィールド「名称」を出力するショートコード
function user_fields_shortcode_general_name() {
 return esc_html(get_user_meta( '1', 'wpcf-general-name' , true ));
}
add_shortcode( 'uf_general_name', 'user_fields_shortcode_general_name' );

//ユーザーフィールド「TEL」を出力するショートコード
function user_fields_shortcode_general_tel() {
 return esc_html(get_user_meta( '1', 'wpcf-general-tel' , true ));
}
add_shortcode( 'uf_general_tel', 'user_fields_shortcode_general_tel' );

//ユーザーフィールド「FAX」を出力するショートコード
function user_fields_shortcode_general_fax() {
 return esc_html(get_user_meta( '1', 'wpcf-general-fax' , true ));
}
add_shortcode( 'uf_general_fax', 'user_fields_shortcode_general_fax' );

//ユーザーフィールド「フリーダイアル」を出力するショートコード
function user_fields_shortcode_general_freedial() {
 return esc_html(get_user_meta( '1', 'wpcf-general-freedial' , true ));
}
add_shortcode( 'uf_general_freedial', 'user_fields_shortcode_general_freedial' );

//ユーザーフィールド「所在地」を出力するショートコード
function user_fields_shortcode_general_address( $atts ) {
 extract(shortcode_atts(array(
  'html' => false,
  'br' => false
 ), $atts));
 $address = get_user_meta( '1', 'wpcf-general-address' , true );
 if ( $atts ) {
  if( $html && $br ) {
   return apply_filters( 'the_content', nl2br( $address ) );
  } elseif( $html ) {
   return apply_filters( 'the_content', $address );
  } elseif( $br ) {
   return nl2br( esc_html( $address ) );
  }
 }
 else{
  return esc_html( $address );
 }
}
add_shortcode( 'uf_general_address', 'user_fields_shortcode_general_address' );

//ユーザーフィールド「営業時間／診療時間」を出力するショートコード
function user_fields_shortcode_general_opentime( $atts ) {
 extract(shortcode_atts(array(
  'html' => false,
  'br' => false
 ), $atts));
 $opentime = get_user_meta( '1', 'wpcf-general-opentime' , true );
 if ( $atts ) {
  if( $html && $br ) {
   return apply_filters( 'the_content', nl2br( $opentime ) );
  } elseif( $html ) {
   return apply_filters( 'the_content', $opentime );
  } elseif( $br ) {
   return nl2br( esc_html( $opentime ) );
  }
 }
 else{
  return esc_html( $opentime );
 }
}
add_shortcode( 'uf_general_opentime', 'user_fields_shortcode_general_opentime' );

//ユーザーフィールド「定休日」を出力するショートコード
function user_fields_shortcode_general_dayoff( $atts ) {
 extract(shortcode_atts(array(
  'html' => false,
  'br' => false
 ), $atts));
 $dayoff = get_user_meta( '1', 'wpcf-general-dayoff' , true );
 if ( $atts ) {
  if( $html && $br ) {
   return apply_filters( 'the_content', nl2br( $dayoff ) );
  } elseif( $html ) {
   return apply_filters( 'the_content', $dayoff );
  } elseif( $br ) {
   return nl2br( esc_html( $dayoff ) );
  }
 }
 else{
  return esc_html( $dayoff );
 }
}
add_shortcode( 'uf_general_dayoff', 'user_fields_shortcode_general_dayoff' );

//ユーザーフィールド「名称の謙譲表現」を出力するショートコード
function user_fields_shortcode_general_self() { 
	$self_name01 = get_user_meta( '1', 'wpcf-general-self' , true ); //ユーザーフィールド「名称の謙譲表現」
	$self_name02 = get_user_meta( '1', 'wpcf-general-self-other' , true ); //ユーザーフィールド「名称の謙譲表現（その他）」
	if( !empty($self_name01) ) { return esc_html($self_name01); }
	elseif( !empty($self_name02) ) { return esc_html($self_name02); }
}
add_shortcode( 'uf_general_self', 'user_fields_shortcode_general_self' );

//ユーザーフィールド「代表者」を出力するショートコード
function user_fields_shortcode_general_officer() { 
 return esc_html(get_user_meta( '1', 'wpcf-chief-privacy-officer' , true ));
}
add_shortcode( 'uf_general_officer', 'user_fields_shortcode_general_officer' );

//ユーザーフィールド「代表メールアドレス」を出力するショートコード
function user_fields_shortcode_general_mail() { 
 return antispambot(get_user_meta( '1', 'wpcf-general-mail-address' , true ));
}
add_shortcode( 'uf_general_mail', 'user_fields_shortcode_general_mail' );

//ユーザーフィールド「メールドメイン」を出力するショートコード
function user_fields_shortcode_general_mail_domain() { 
 return antispambot(get_user_meta( '1', 'wpcf-general-mail-domain' , true ));
}
add_shortcode( 'uf_general_mail_domain', 'user_fields_shortcode_general_mail_domain' );

//ユーザーフィールド「トップページのタイトル」を出力するショートコード
function user_fields_shortcode_top_title() { 
 return esc_html(get_user_meta( '1', 'wpcf-top-title' , true ));
}
add_shortcode( 'uf_top_title', 'user_fields_shortcode_top_title' );

//ユーザーフィールド「下層ページのタイトル」を出力するショートコード
function user_fields_shortcode_additional_title() { 
 return esc_html(get_user_meta( '1', 'wpcf-additional-title' , true ));
}
add_shortcode( 'uf_additional_title', 'user_fields_shortcode_additional_title' );

//ユーザーフィールド「META KEYWORDS」を出力するショートコード
function user_fields_shortcode_meta_keywords() { 
 return esc_html(get_user_meta( '1', 'wpcf-meta-keywords' , true ));
}
add_shortcode( 'uf_meta_keywords', 'user_fields_shortcode_meta_keywords' );

//ユーザーフィールド「Google Analytics UA」を出力するショートコード
function user_fields_shortcode_googleua() { 
 return esc_html(get_user_meta( '1', 'wpcf-google-analytics-ua' , true ));
}
add_shortcode( 'uf_google_ua', 'user_fields_shortcode_googleua' );

//ホームURLを出力するショートコード
function user_fields_shortcode_home_url() { 
 return esc_url( home_url( '/' ) );
}
add_shortcode( 'home_url', 'user_fields_shortcode_home_url' );

/***************************************
カスタムショートコード設定終わり
***************************************/

//ホームURLを定数化
define('HOME',esc_url( home_url( '/' ))); //サイトURL＝HOME
define('THEMEDIR',esc_url(get_template_directory_uri()).'/'); //テーマディレクトリURL＝THEMEDIR

//管理画面のWP更新メッセージを非表示に
add_action('admin_print_styles', 'admin_css_custom');
function admin_css_custom() {
echo '<style>#update-nag, .update-nag{display: none !important;}</style>';
}

//言語ファイルの自動アップデートを停止
add_filter( 'auto_update_translation', '__return_false' );
