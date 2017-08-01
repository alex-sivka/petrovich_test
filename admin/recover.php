<?php

defined('ROOT') || die('boo boo');

$email = Db::escape($_POST['email']);

if(!$email) exit('error');

if(!strpos($email,'.') || !strpos($email,'@')) exit('error');

$res = Db::sql("SELECT `id` FROM `".PRX."users` WHERE `email`='$email' LIMIT 1");

if(!Db::num($res)) exit('error');

$row = Db::row($res);

$pass = uniqid();

$pass2 = Db::hashPass($pass);

Db::sql("UPDATE `".PRX."users` SET `pass`='$pass2' WHERE `id`='".$row['id']."' ");

require_once ROOT.'components/libs/phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->From = Main::$config['support_email'];

$mail->addAddress($email);

$mail->isHTML(true);

$mail->Subject = 'Password recover';
$mail->Body    = 'New password: '.$pass."\n";

$mail->send();