<?php 
$page='test';
require_once '../cms/overall/header.php';
    echo 'this is the test sessin <br>';
    if(Session::exists('test')){
        echo Session::get('test');

    } else {
        echo 'SESSION issues persist';
    }

?>