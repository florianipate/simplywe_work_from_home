<?php
// SET TIMEZONE
date_default_timezone_set("Europe/London");


// CONNECT TO DATABASE
include "../../../includes/connect.php";


// FETCH DETAILS FROM AJAX REQUEST
$venue_name = $_REQUEST["venue_name"];
$venue_max_daytime = $_REQUEST["venue_max_daytime"];
$venue_max_evening = $_REQUEST["venue_max_evening"];
$venue_max_hotel_rooms = $_REQUEST["venue_max_hotel_rooms"];
$venue_hotel_room_price = $_REQUEST["venue_hotel_room_price"];
$wedding_date = $_REQUEST["wedding_date"];
$wedding_month = $_REQUEST["wedding_month"];
$wedding_day = $_REQUEST["wedding_day"];
$daytime_guests = $_REQUEST["daytime_guests"];
$evening_guests = $_REQUEST["evening_guests"];
$evening_entertain = $_REQUEST["evening_entertain"];
$title = $_REQUEST["title"];
$first_name = $_REQUEST["first_name"];
$last_name = $_REQUEST["last_name"];
$contact_number = $_REQUEST["contact_number"];
$email_address = $_REQUEST["email_address"];


// CREATE ARRAY STATIC VARAIBLES
$details = array(
    "venue_name" => $venue_name,
    "venue_max_daytime" => $venue_max_daytime,
    "venue_max_evening" => $venue_max_evening,
    "venue_max_hotel_rooms" => $venue_max_hotel_rooms,
    "venue_hotel_room_price" => $venue_hotel_room_price,
    "wedding_date" => $wedding_date,
    "wedding_month" => $wedding_month,
    "daytime_guests" => $daytime_guests,
    "evening_guests" => $evening_guests,
    "evening_entertain" => $evening_entertain,
    "title" => $title,
    "first_name" => $first_name,
    "last_name" => $last_name,
    "contact_number" => $contact_number,
    "email_address" => $email_address
);


// ADD STATIC VARAIBLES TO MASTER ARRAY
$all_prices[] = $details;


// DEFINE MAIN AND ALTERNATIVE DAYS
$main_day = $wedding_day;
if ($main_day == "Monday") {
    $days = ["Monday", "Friday", "Saturday", "Sunday"];
} else if ($main_day == "Tuesday") {
    $days = ["Tuesday", "Friday", "Saturday", "Sunday"];
} else if ($main_day == "Wednesday") {
    $days = ["Wednesday", "Friday", "Saturday", "Sunday"];
} else if ($main_day == "Thursday") {
    $days = ["Thursday", "Friday", "Saturday", "Sunday"];
} else if ($main_day == "Friday") {
    $days = ["Friday", "Thursday", "Saturday", "Sunday"];
} else if ($main_day == "Saturday") {
    $days = ["Saturday", "Thursday", "Friday", "Sunday"];
} else if ($main_day == "Sunday") {
    $days = ["Sunday", "Thursday", "Friday", "Saturday"];
}


// FETCH PRICING FOR MAIN AND ALTERNATIVE DAYS
$i = 0; while ($i < 4) {
    
    
    // CONNECT TO VENUE PRICING DATABASE
    $query = "SELECT * FROM demo_venue_pricing WHERE venue_name = '". $venue_name ."' AND package_month = '". $wedding_month ."' AND package_day = '". $days[$i] ."'";
    $get_pricing = mysqli_query($connection, $query);
    
    
    // FETCH PRICING DATA FOR THE SPECIFIED DAY
    while($row = mysqli_fetch_assoc($get_pricing)) {
        $package_price = $row['package_price'];
        $package_guests = $row['package_guests'];
        $daytime_price = $row['daytime_price'];
        $evening_price = $row['evening_price'];
        $ext_evening_entertain = $row['ext_evening_entertain'];
    }
    
    
    // CREATE INDIVIDUAL ARRAY FOR THE SPECIFIED DAY PRICING
    ${'price'. $i} = array(
        "wedding_day" => $days[$i],
        "package_price" => $package_price,
        "package_guests" => $package_guests,
        "daytime_price" => $daytime_price,
        "evening_price" => $evening_price,
        "ext_evening_entertain" => $ext_evening_entertain
    );
    
    
    // ADD INDIVIDUAL PRICING TO MASTER ARRAY
    $all_prices[] = ${'price'. $i}; $i++;
    
    
}


// RETURN PRICING ARRAY
echo json_encode($all_prices);


?>