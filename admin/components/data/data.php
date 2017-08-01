<?php
defined('ROOT') || die('Guten tag');

$config = App::get('Config');

$data = array(
	'lang' => Lang::get()
);

$data['lang_name'] = App::Lang()->langName();
$data['SERVER_DROOT'] = DROOT;

$data['config'] = array(
	'editor' => $config->editor,
	'editor_active' => $config->editor_active,
	'directory' => $config->directory,
	'link_end' => $config->link_end,
	'product_end' => $config->product_end,
	'datetime_format' => $config->datetime_format,
	'date_format' => $config->date_format,
	'time_format' => $config->time_format,
	'lang_name' => $data['lang_name'],
	'admin_directory' => $config->admin_directory,
	'filemanager' => $config->filemanager,
	'filemanager_active' => $config->filemanager_active,
	'img_max_size' => $config->img_max_size,
);

$data['user'] = App::User()->get();

echo json_encode($data);

