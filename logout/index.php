<?php
$page='logout';
require_once '../cms/overall/header.php';
$user = new User();
$user->logout();
Redirect::to('../index.php');
require_once '../cms/overall/footer.php';
?>