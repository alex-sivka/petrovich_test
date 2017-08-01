<?php

class TemplateLayuots {

	public function render(){
		$res = array();
		$id = Request::post('value');

		$item = Db::fetchById('templates', $id);

		if(!$item) die( json_encode($res) );

		$path = DROOT . 'templates/' . $item->directory . '/layouts/';

		$files = scandir($path);

		foreach($files as $file){
			if(!is_file($path . $file)) continue;
			$name = basename($file, '.php');
			$res[] = array('text'=> $name, 'value'=>$name);
		}

		echo json_encode($res);
	}

	public function screenshot(){
		$layout = Request::post('value');
		$id = Request::post('template_id');

		$item = Db::fetchById('templates', $id);

		if(!$item) die;

		$path = DROOT . 'templates/' . $item->directory . '/screenshots/';

		$file = $path . $layout . '.jpg';

		if(!file_exists($file)) $file = $path  . 'template.jpg';

		if(!file_exists($file)) die;
		echo '<img src="'. Img::get($file, 50, 50, true) . '" />';
	}

}