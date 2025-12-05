<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- fontawesomを使用する -->
  <!-- <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet"> -->
  <!-- favicon -->
  <!-- <link rel="icon" type="image/x-icon" href="img/common/favicon.ico">
  <link rel="apple-touch-icon" href="img/common/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" type="image/png" href="img/common/android-touch-icon.png" sizes="192x192">
  -->

  <!-- スライダー -->
  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/> -->

  <?php //if ( is_singular() ) wp_enqueue_script( "comment-reply" );
  ?>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div id="page" class="l-site">
    <header class="p-header l-header">
      <div class="p-header__inner">
        <h1 class="p-header__logo">
          <a href="<?php page_path('/'); ?>">
            ぺこももSHOP
          </a>
        </h1>
        <nav class="p-header__nav">
          <ul class="p-header__nav-list">
            <li class="p-header__nav-item">
              <a href="<?php page_path('/'); ?>">ホーム</a>
            </li>
            <li class="p-header__nav-item">
              <a href="#buy">購入方法</a>
            </li>
            <li class="p-header__nav-item">
              <a href="#game">ゲーム一覧</a>
            </li>
            <li class="p-header__nav-item">
              <a href="#contact">お問い合わせ</a>
            </li>
          </ul>
        </nav>
        <button class="p-header__hamburger js-hamburger">
          <span></span>
          <span></span>
          <span></span>
        </button>
        <div class="p-header__drawer js-drawer">
          <nav class="p-header__drawer-nav">
            <ul class="p-header__drawer-list">
              <li class="p-header__drawer-item">
                <a href="#">ホーム</a>
              </li>
              <li class="p-header__drawer-item">
                <a href="#buy">購入方法</a>
              </li>
              <li class="p-header__drawer-item">
                <a href="#game">ゲーム一覧</a>
              </li>
              <li class="p-header__drawer-item">
                <a href="#contact">お問い合わせ</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </header>