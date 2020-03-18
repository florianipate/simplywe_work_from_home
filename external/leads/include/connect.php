<?php
// CONNECT TO DATABASE
$db['db_host'] = "10.16.16.6";
$db['db_user'] = "UKWSD-0vv-u-046504";
$db['db_pass'] = "K!ymj^b2K";
$db['db_name'] = "UKWSD-0vv-u-046504";
foreach($db as $key => $value) {define (strtoupper($key), $value);}
$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);



// CHECK DATABASE CONNECTION
//if ($connection) {echo "Connected to Database";} else {echo "NOT Connected to Database";}
?>