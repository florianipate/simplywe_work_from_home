<?php
$page='test';
require_once '../cms/overall/header.php';
echo 'test Page';

echo session_id(),'<br>';
Session::put('test', 'SESSION_TEST from test page');
// $temp_file = tempnam(sys_get_temp_dir());
echo session_save_path().'<br>';
echo sys_get_temp_dir() . PHP_EOL;
phpinfo();