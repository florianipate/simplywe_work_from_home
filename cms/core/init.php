<?php
// error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/home/cluster-sites/33206/s/simplywed.co.uk/tmp/'));
ini_set('session.gc_probability', 1);
session_start();
$GLOBALS['config'] = array(
    
	'mysql' => array(
		'host' => '10.16.16.8',
		'username' =>'SWuse-em1-u-255646',
		'password' => 'Us/m6g6q2',
		'db' => 'SWuse-em1-u-255646'
		// 'host' => '127.0.0.1',
		// 'username' =>'root',
		// 'password' => '',
		// 'db' => 'simplywed_v2'
	),

	'remember' => array(
		'cookie_name'=> 'hash',
		'cookie_expiry' => 6044800
	),
	'session' => array(
		'session_name' => 'user',
		'token_name' => 'token'
	)
);

//Classes autoloader

spl_autoload_register(function($class){
    require_once '../cms/classes/' . $class . '.php';
});
require_once '../cms/functions/sanitize.php';
//require_once("classes/Redirect.php");

if (Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))){
	$hash = Cookie::get(Config::get('remember/cookie_name'));
	$hashCheck = DB::getInstance()->get('user_session', array('hash', '=', $hash));
    $user=new User();// 
	
	if($hashCheck->count()){
		$user = new User($hashCheck->first()->user_id);
		$user->login();
	}
}
