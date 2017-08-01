<?php  //print_r($_FILES);print_r($_POST);die;
error_reporting(E_ALL | E_STRICT);
require_once 'components/Admin.php';

Admin::init();

$post = Request::post();

$urlMap = array(
	'components/data/data.php' => ROOT . 'components/data/data.php',
	'components/filemanager' => ROOT . 'components/filemanager/filemanager.php',
);



if(!$post->_url) Admin::page404('url not defined');



$url = trim($post->_url, '/');

if(strpos( $url, ADM_DIR . '/') === 0) $url = substr($url, strlen(ADM_DIR)+1, strlen($url));

$url = explode('#', $url);

$url = explode('?', $url[0]);

$uri = trim($url[0], '/');

if(isset($url[1])){
	$get = explode('&', $url[1]);

	foreach($get as $k => $v){
		$v = explode('=', $v);
		Request::query()->set($v[0], isset($v[1]) ? $v[1] : '');
	}
}

foreach($urlMap as $dfu => $dff){
	if($dfu == $uri){
		include $dff;
		die;
	}
}




//Request::getRequest();

$uriArr = $uriArrOriginal = explode('/',$uri);
$lastLink = end($uriArr);

if(preg_match('~^([0-9]+)$~', $lastLink, $m)){ 
	$postId = array_pop($uriArr);
	//if(!isset($_REQUEST['id'])) $_REQUEST['id'] = $postId;
	if(!$post->id) $post->set('id', $postId);
	if(!Request::query()->id) Request::query()->set('id', $postId);
}

////////// path1 //////////
$file1 = $method2 = array_pop($uriArr);
$lastLink = end($uriArr);
$file1 = ucfirst($file1);

$ext = substr(strrchr($uri, '.'), 1);

if($ext == 'php'){
	
	$path1 = ROOT . implode('/', $uriArr) . '/' . $method2;
	$file2 = ucfirst( array_pop($uriArr) );
	$path2 = DROOT . 'protected/' . implode('/', $uriArr) . '/' . $file2 . '/admin/' . $method2;	
	
	$paths = array(
		array('path' => $path1 , 'class'=>'', 'method' => '' ),
		array('path' => $path2 , 'class'=>'', 'method' => '' ),
	);
	
}else{
	
	$path1 = DROOT . 'protected/' . implode('/', $uriArr) . '/' . $file1 . '/admin/' . $file1 . 'Admin.php';
	
	$path3 = ROOT . implode('/', $uriArr) . '/' . $file1 . '.php';
	$path4 = ROOT . implode('/', $uriArr) . '/' . ucfirst($lastLink) . '.php';
	
	////// path2 //////////////
	$file2 = ucfirst( array_pop($uriArr) );
	$path2 = DROOT . 'protected/' . implode('/', $uriArr) . '/' . $file2 . '/admin/' . $file2 . 'Admin.php';

	$paths = array(
		array('path' => $path1 , 'class'=>$file1 . 'Admin', 'method' => '' ),
		array('path' => $path2 , 'class'=>$file2 . 'Admin', 'method' => $method2 ),
		array('path' => $path3 , 'class'=>$file1, 'method' => '' ),
		array('path' => $path4 , 'class'=>$file2, 'method' => $method2 ),
	);
}

$fullPath = $className = $startObject = '';
$method = 'init';

foreach($paths as $item){
	if($item['path'] && file_exists($item['path'])){
		$fullPath = $item['path'];
		if($item['method']) $method = $item['method'];
		$className = $item['class'];
		break;
	}
}

//if($post->_url == 'admin/modules/page/menu.tpl.php') _sx_load_404($paths);;

if(!$fullPath) _sx_load_404($paths);

try{
	require_once $fullPath;
	if($className && class_exists($className)) $startObject = new $className();
	
	if($startObject && method_exists($startObject, $method)) $startObject->$method();

}catch(sxException $e){}






function _sx_load_404($paths){

	//Admin::page404();
	
	$str = '';
	foreach($paths as $path) if($path['path']) $str .= $path['path'] . ' | class: ' .$path['class'] .
																 ' | method: '. $path['method'] .'<br>';
	Admin::page404($str);
}





