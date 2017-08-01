<?php
defined('ROOT') || die('Guten tag');

$post = Request::post();
$session = Request::session();

$pass = User::hashPass($post->pass);// die($pass);

$row = UserModel::where('email', $post->email)->fetchRowPublic();



if(!$row || !User::verifyPass($post->pass, $row->pass)) exit('error');


//if($session->get('user.nohash')) $session->delete( 'user.nohash');

//if($post->nohash) $session->set( 'user.nohash', 1);

$user = App::get('User');



$user->setUser($row);


exit('_reload');