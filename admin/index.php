<?php

error_reporting(E_ALL | E_STRICT);



require_once 'components/Admin.php';


$app = Admin::init();
$config = $app->Config;

/*
if(class_exists('Gallery')) echo('GUT');
$item = array('owner'=>'test2144', 'id'=>91);
$x = GalleryModel::where('id',91)->delete();
print_r($x);die;*/
//print_r($item);

//die;

//sd(App::User()->get('adminOptions.table_per_page._admin_modules_page_'));


if($app->User->id)
	require_once ROOT . 'templates/' . $app->Config->admin_template . '/index.php';
else
	require_once ROOT . 'templates/' . $app->Config->admin_template . '/login.php';