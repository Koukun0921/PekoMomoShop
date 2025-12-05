<?php

/**
 * Functions
 */

function my_script_init()
{
  // CSS読み込み
  wp_enqueue_style('my-style', get_template_directory_uri() . '/assets/css/style.css', array(), filemtime(get_theme_file_path('assets/css/style.css')),  'all');

  // Google Fonts 読み込み
  wp_enqueue_style(
    'my-google-fonts',
    'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Poppins:wght@400;500;700&display=swap',
    array(),
    null
  );

  // JavaScript読み込み
  wp_enqueue_script(
    'my-script',
    get_template_directory_uri() . '/assets/js/script.js',
    array('jquery'),
    filemtime(get_theme_file_path('assets/js/script.js')),
    true
  );
}
add_action('wp_enqueue_scripts', 'my_script_init');

/**
 * Google Fonts 用の preconnect を出力
 */
function my_google_fonts_preconnect()
{
?>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<?php
}
add_action('wp_head', 'my_google_fonts_preconnect', 1);

/**
 * wordpressバージョン情報の削除
 * @see　https://qiita.com/Taka96/items/b541b1fef0fa20add47d
 */
remove_action('wp_head', 'wp_generator');

/**
 * 投稿者一覧ページを自動で生成されないようにする
 * @see　https://qiita.com/Taka96/items/b541b1fef0fa20add47d
 */
add_filter('author_rewrite_rules', '__return_empty_array');
function disable_author_archive()
{
  if (preg_match('#/author/.+#', $_SERVER['REQUEST_URI'])) {
    wp_redirect(esc_url(home_url('/404.php')));
    exit;
  }
}
add_action('init', 'disable_author_archive');

/**
 * /?author=1 などでアクセスしたらリダイレクトさせる
 * @see https://www.webdesignleaves.com/pr/wp/wp_user_enumeration.html
 */
if (!is_admin()) {
  if (preg_match('/author=([0-9]*)/i', $_SERVER['QUERY_STRING'])) die();
  add_filter('redirect_canonical', 'my_shapespace_check_enum', 10, 2);
}
function my_shapespace_check_enum($redirect, $request)
{
  if (preg_match('/\?author=([0-9]*)(\/*)/i', $request)) die();
  else return $redirect;
}

/**
 * pタグとbrタグの自動挿入を解除
 */
add_action('init', 'disable_output');

function disable_output()
{
  remove_filter('the_content', 'wpautop');
}

/*
 * テンプレートパスを返す
 */
function temp_path()
{
  echo esc_url(get_template_directory_uri());
}
/* assetsパスを返す */
function assets_path()
{
  echo esc_url(get_template_directory_uri() . '/assets');
}
/* 画像パスを返す */
function img_path()
{
  echo esc_url(get_template_directory_uri() . '/assets/img');
}
/* mediaフォルダへのURL */
function uploads_path()
{
  echo esc_url(wp_upload_dir()['baseurl']);
}

/* ホームURLのパスを返す
 *
 * $page = worksの場合、https://xxxx.co.jp/works/ を返す
 * 呼び出しは、<?php page_path('works'); ?> で実施する
 *
*/
function page_path($page = "")
{
  $page = $page . '/';
  echo esc_url(home_url($page));
}

/**
 * テーマ機能（アイキャッチ画像など）の設定
 */
function peco_theme_setup()
{
  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'peco_theme_setup');

?>