<?php

class Admin {

	public static $mode;

	public static function init(){
		
		require_once $_SERVER['DOCUMENT_ROOT'] . '/protected/core/App.php';
		
		$inst = App::init();
		
		$dir = $inst->Config->get('admin_directory');

		$inst->Lang->init($dir);
		
		define('ADM_DIR', $dir);
		
		define('ROOT', DROOT . $dir . '/');
		
		return $inst;
		
	}

	public static function error($arr = array(), $data = array()){
		die( json_encode ( array('error' => $arr, 'data' => $data) ) );
	}

	public static function accessError($arr = array()){
		die( json_encode(  $arr ) );
	}

	public static function success($data = array()){
		die( json_encode ( array('success' => 1, 'data' => $data) ) );
	}

	public static function page404($msg = ''){
		die('<a href="/admin/modules/page/">Страницы</a>');
		//die('<h3>404 page not found</h3>' . $msg);
	}



	public static function navigate($url){
		die('<script>App.navigate("'.$url.'");</script>');
	}

	public static function translate($val, $escape = '-'){
		$lang = App::get('Lang');
		if(!$lang->translate) return $val;
		
		$val = mb_strtolower($val, 'UTF-8');
		$val = mb_str_split($val);
		$res = [];
		foreach($val as $letter){
			if(isset($lang->translate->$letter)) $res[] = $lang->translate->$letter;
			else $res[] = preg_match('~[a-z0-9_]~', $letter) ? $letter : $escape;
		}
		$str = implode('', $res);
		$str = trim($str, $escape);
		return preg_replace('~(['.$escape.']+)~', $escape, $str);
	}
	

	public static function getCurrentUrlPath(){
		$url = App::Request()->post()->_url;
		if(!$url) return;
		$url = parse_url($url);
		$url = trim($url['path'], '/') . '/';
		return (strpos( $url, ADM_DIR . '/') !== 0) ? $url = '/' . ADM_DIR . '/' . $url : '/' . $url;

	}

	public static function setUserPerPage(){
		$url = str_replace('/', '_', self::getCurrentUrlPath());
		$perPage = App::User()->get('adminOptions.table_per_page.' . $url);
		if($perPage) App::Request()->query()->set('per_page', $perPage);
		return $perPage;
	}

	public static function getItemOptionsTree($items, $delimiter = ' / ', $textKey = 'name', $valueKey = 'id', $parent_id = 0, $text = ''){
		$opts = array();
		foreach($items as $item){
			if($parent_id != $item->parent_id) continue;
			$opts[] = array('text' => $text . $item->$textKey, 'value' => $item->$valueKey);
			if($item->id) {
				$childOpts = self::getItemOptionsTree($items, $delimiter, $textKey, $valueKey, $item->id, $text . $item->$textKey . $delimiter);
				if ($childOpts) $opts = array_merge($opts, $childOpts);
			}
		}
		return $opts;
	}

	private static function _getItemOptionsTree($items, $delimiter = ' / ', $textKey = 'name', $valueKey = 'id'){

	}
}