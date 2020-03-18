<?php
// SET TIMEZONE
date_default_timezone_set("Europe/London");


// CONNECT TO DATABASE
include "../../../includes/connect.php";


// FETCH DETAILS FROM AJAX REQUEST
$venue_name = $_REQUEST["venue_name"];
$wedding_month = $_REQUEST["wedding_month"];
$wedding_day = $_REQUEST["wedding_day"];


// CONNECT TO VENUE PRICING DATABASE
$query = "SELECT * FROM demo_venue_pricing WHERE venue_name = '". $venue_name ."' AND package_month = '". $wedding_month ."' AND package_day = '". $wedding_day ."'";
$check_date = mysqli_query($connection, $query);


// FETCH ALL DATA ON VENUE AVAILABILITY
while($row = mysqli_fetch_assoc($check_date)) {
    $date_available = $row['date_available'];
}


// RETURN VENUE AVAILABILITY
echo $date_available;


?>