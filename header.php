<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<meta content="width=device-width,initial-scale=1" name="viewport">
<meta name="format-detection" content="telephone=no,address=no,email=no">

<!--404ページ-->
<!--<meta http-equiv="refresh" content="10 ; URL=/">-->

<!--ファビコン-->
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/common/images/favicon.png">
<!--スタイルシート-->
 <link href="<?php echo get_template_directory_uri(); ?>/common/css/magnific-popup.css" rel="stylesheet">
<link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet">
<?php if (is_front_page()) : ?>
    <link href="<?php echo get_template_directory_uri(); ?>/css/front-page.css" rel="stylesheet">
<?php elseif (is_home()) : ?>

<?php elseif (is_page()) : ?>
    <?php if (is_page(array('job01','job02','job03','job04','job05'))) : ?>
			    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ourwork.css">
    <?php elseif (is_page(array('error','confirm','completion'))) : ?>
			    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/contact.css">
		<?php endif; ?>
        <?php
        // slug名のcssがあれば読み込む
        global $post;
        $slugName = $post->post_name;
        if (isset($slugName)) :
        if (is_file(get_theme_file_path('css/' . $slugName . '.css')) && file_exists(get_theme_file_path('css/' . $slugName . '.css'))) :
        ?>
            <link rel="stylesheet" href="<?php echo get_theme_file_uri('css/' . $slugName . '.css'); ?>" />
        <?php
        endif;
        endif;
        ?>
<?php endif; ?>

<!--jquery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!--googlefontcode Roboto -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=BIZ+UDGothic&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

<!--googlefontcode Roboto Condensed -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=BIZ+UDGothic&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', '');
	</script>
<?php wp_head(); ?>
</head>

<?php if (is_front_page()) : ?>
<body>
<div class="wrapper recruit__index">
<?php elseif (is_page(array('ourwork','job01','job02','job03','job04','job05'))) : ?>
<body class="pagewrap ourworks">
<div class="wrapper">
<?php elseif (is_page()) : ?>
<body class="pagewrap <?php echo $post->post_name; ?>">
<div class="wrapper">
<?php endif; ?>
<header class="l-header">
    <a class="l-header__logowrap" href="/recruit/">
      <h1 class="l-header__logowrap__title">RECRUIT</h1>
      <p class="l-header__logowrap__caption">
        下村特殊精工<br>
        採用サイト
      </p>
    </a>
  <!-- l-header__logowrap -->
  <div class="headmenuwrap">
    <ul class="headmenuwrap__menu">
      <li class="l-header__menu__list"><a href="/recruit/aboutus/">会社を知る</a></li>
      <li class="l-header__menu__list"><a href="/recruit/environment/">働く環境を知る</a></li>
      <li class="l-header__menu__list"><a href="/recruit/ourwork/">仕事を知る</a></li>
      <li class="l-header__menu__list"><a href="/recruit/internship/">インターンシップ制度</a></li>
      <li class="l-header__menu__list"><a href="/recruit/outline/">募集要項</a></li>
      <li class="l-header__menu__list"><a href="/recruit/qa/">よくあるご質問</a></li>
    </ul>
    <!-- l-header__menu -->
    <div class="headmenuwrap__entrybox">
      <a href="/recruit/contact/" class="headmenuwrap__entrybox__link">
        エントリー
      </a>
    </div>
    <!-- l-header__entrybox -->
  </div>
  <!-- headmenuwrap -->
</header>
<!-- header / end -->
 <div class="headerflex">
  <a class="page-header__logowrap" href="/recruit/">
    <h1 class="page-header__logowrap__title">RECRUIT</h1>
    <p class="page-header__logowrap__caption">
      下村特殊精工<br>
      採用サイト
    </p>
  </a>
<!-- l-header-logowrap -->

<div class="page-header__menuwrap">
  <ul class="page-header__menuwrap__menu">
    <li class="page-header__menuwrap__menu-list"><a href="/recruit/aboutus/">会社を知る</a></li>
    <li class="page-header__menuwrap__menu-list"><a href="/recruit/environment/">働く環境を知る</a></li>
    <li class="page-header__menuwrap__menu-list"><a href="/recruit/ourwork/">仕事を知る</a></li>
    <li class="page-header__menuwrap__menu-list"><a href="/recruit/internshi/">インターンシップ制度</a></li>
    <li class="page-header__menuwrap__menu-list"><a href="/recruit/outline/">募集要項</a></li>
    <li class="page-header__menuwrap__menu-list"><a href="/recruit/qa/">よくあるご質問</a></li>
  </ul>
  <!-- l-header-menu -->

  <div class="page-header__menuwrap__entrybox">
    <a href="/recruit/contact/" class="page-header__menuwrap__entrybox__link">
      エントリー
    </a>
  </div>
  <!-- l-header-entrybox -->
</div>
<!-- page-header__menuwrap -->
</div>
<!-- header / end -->

<!-- ハンバーガーメニューに関わる記述 -->
<div class="spnavi">
  <div class="Btn-navi__first">
      <a href="#" class="menuBtn"><span class="menu-icon"></span></a>
  </div>
<div class="Btn-navi">
      <a href="" class="menuBtn"><span class="menu-icon"></span></a>
  </div>

  <div class="navi-content">
    <div class="navi-content__logowrap">
      <h1 class="navi-content__logowrap__title">RECRUIT</h1>
      <p class="navi-content__logowrap__caption">
        下村特殊精工<br>
        採用サイト
      </p>
    </div>

      <navi class="navi-content__menuwrap__spmenu">
        <ul class="navi-content__menuwrap__spmenu__list">
          <li class="navi-content__menu__list"><a href="/recruit/aboutus/">会社を知る</a></li>
          <li class="navi-content__menu__list"><a href="/recruit/environment/">働く環境を知る</a></li>
          <li class="navi-content__menu__list"><a href="/recruit/ourwork/">仕事を知る</a></li>
          <li class="navi-content__menu__list"><a href="/recruit/internship/">インターンシップ制度</a></li>
          <li class="navi-content__menu__list"><a href="/recruit/outline/">募集要項</a></li>
          <li class="navi-content__menu__list"><a href="/recruit/qa/">よくあるご質問</a></li>
        </ul>
        <!-- l-header__menu -->
        <div class="navi-content__menuwrap__entrybox">
          <a href="/recruit/contact/" class="navi-content__menuwrap__entrybox__link">
            エントリー
          </a>
        </div>
        <!-- l-header__entrybox -->
      </navi>
  </div>
</div>

<!-- ハンバーガーメニュー背景画像 -->
<div class="navi-background"></div>