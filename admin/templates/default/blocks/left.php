<?php defined('ROOT') || die('Guten tag'); ?>
<div class="media user-media bg-dark dker" id="user_block">
	<div class="user-media-toggleHover">
		<span class="fa fa-user"></span>
	</div>
	<div class="user-wrapper bg-dark">
		<!--<a class="user-link" href="/<?=ADM_DIR?>/components/users/edit/?id=<?=$app->User->id?>">
			<img class="media-object img-thumbnail user-img" alt="User Picture" src="<?//=User::getUserImg(User::get('img'))?>">
			<!--<span class="label label-danger user-label">16</span>--><!--
		</a>-->
		<div class="media-body" style="width: 100%;">
			<h5 class="media-heading">
				<a style="color: #fff" href="/<?=ADM_DIR?>/components/users/edit/?id=<?=$app->User->id?>"><?=$app->User->name?></a>
			</h5>
			<ul class="list-unstyled user-info">
				<li><?=Lang::get('last_visit')?> :
					<small><?=$app->User->last_visit?></small>
				</li>
			</ul>
		</div>
	</div>
</div>

<!-- #menu -->
<ul id="menu" class="bg-dark dker">
	<li class="nav-header">Menu</li>
	<li class="nav-divider"></li>
	<li>
		<a href="/<?=ADM_DIR?>/modules/page/">
			<i class="fa fa-laptop"></i><span class="link-title">&nbsp;<?=Lang::get('pages')?></span>
		</a>
	</li>

	
</ul><!-- /#menu -->