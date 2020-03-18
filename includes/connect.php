<?php
// DISPLAY ERRORS
ini_set("display_errors", 1);


// CONNECT TO DATABASE
$db['db_host'] = "10.16.16.8";
$db['db_user'] = "SWuse-em1-u-255646";
$db['db_pass'] = "Us/m6g6q2";
$db['db_name'] = "SWuse-em1-u-255646";
foreach($db as $key => $value) {define (strtoupper($key), $value);}
$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);


// START SESSION
//ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/home/cluster-sites/33206/s/simplywed.co.uk/tmp/'));
//ini_set('session.gc_probability', 1);
//session_start();


// CHECK DATABASE CONNECTION
//if ($connection) {echo "Connected to Database";} else {echo "NOT Connected to Database";}


?>