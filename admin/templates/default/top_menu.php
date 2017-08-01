<?php defined('ROOT') || die('Guten tag'); ?>
<nav class="navbar navbar-inverse navbar-static-top" id="top_menu">
<div class="container-fluid">

	<header class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span> 
			<span class="icon-bar"></span> 
			<span class="icon-bar"></span> 
			<span class="icon-bar"></span> 
		</button>
		<a href="/" target="_blank" class="navbar-brand"><img src="/<?=ADM_DIR?>/img/logo_ss.png" alt=""></a> 
	</header>

	<div class="topnav">
		<div class="btn-group">
			<a class="btn btn-default btn-sm" id="toggleFullScreen"><i class="glyphicon glyphicon-fullscreen"></i></a> 
		</div>
		<div class="btn-group">
			<button class="btn btn-metis-1 btn-sm" id="sa_exit_btn"><i class="fa fa-power-off"></i></button> 
		</div>
		<div class="btn-group">
			<a class="btn btn-primary btn-sm toggle-left" id="menu-toggle"><i class="fa fa-bars"></i></a> 
		</div>
		<div class="btn-group"> 
			<a class="btn btn-default btn-sm toggle-right"> <span class="fa fa-arrow-right"></span>  </a> 
		</div>
	</div>

	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
			<?=$dashboardModel->getTopMenuItems('dropdown')?>
			
			<? /* dropdown example
			<li class='dropdown '>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<?=Lang::get('widgets')?>
			<b class="caret"></b>
			</a> 
			<ul class="dropdown-menu">
			<?php
			$rows = Db::select('name,class_name')->where('read','<=',User::$status)->where('editable',1)->fetch('widget');
			foreach($rows as $row) echo '<li> <a href="/'.ADM_DIR.'/widgets/'.$row['class_name'].'">'.$row['name'].'</a>  </li>';
			?>
			</ul>
			</li> */ ?>
		</ul>
	</div>
</div>
</nav>
<script>
$(function(){
	$('#top_menu .navbar-nav li.dropdown a').addClass('dropdown-toggle').attr('data-toggle','dropdown');
	$('#top_menu .navbar-nav li.dropdown ul').addClass('dropdown-menu');
})
</script>