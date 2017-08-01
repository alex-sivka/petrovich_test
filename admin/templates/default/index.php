<?php  defined('ROOT') || die('Guten tag');  ?>
<!doctype html>
<html class="no-js">
  <head>
    <meta charset="UTF-8">
    <title>Sivka</title>

    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <? require_once ROOT . 'templates/scripts.php' ?>
      <? require_once ROOT . 'templates/default/head.php' ?>
  </head>
  <body class="  ">
    <div class="bg-dark dk" id="wrap">
      <div>
		<div id="top">
            <? include ROOT.'templates/default/blocks/top.php'; ?>
		</div>

	      <div id="breadcrumbs"></div>

        <header class="head" id="header">
	        <? include ROOT.'templates/default/blocks/header.php'; ?>
        </header>
      </div>
      <div id="left">
	      <? include ROOT.'templates/default/blocks/left.php'; ?>
      </div><!-- /#left -->
      <div id="content">
        <div class="outer">
          <div class="inner bg-light lter sx-main" id="main">
            <img src="/<?=ADM_DIR?>/assets/images/cursor_loader.gif">
          </div><!-- /.inner -->
        </div><!-- /.outer -->
      </div><!-- /#content -->
      <div id="right" class="bg-light lter">
			<? include ROOT.'templates/default/blocks/right.php'; ?>
      </div><!-- /#right -->
    </div><!-- /#wrap -->
    <footer class="Footer bg-dark dker">
      <p><?=date('Y')?> &copy; <a href="http://sivka-systems.ru">Sivka.Systems</a></p>
    </footer><!-- /#footer -->

    <script src="/<?=ADM_DIR?>/templates/default/js/core.js"></script>
    <script src="/<?=ADM_DIR?>/templates/default/js/app.js"></script>

  </body>
</html>