<?php
// SET TIMEZONE
date_default_timezone_set("Europe/London");


// CONNECT TO DATABASE
include "../includes/connect.php";


// FETCH DETAILS FROM AJAX REQUEST
$venue_ref = $_REQUEST["venue_ref"];
$venue_name = $_REQUEST["venue_name"];


// FETCH VENUES FROM DATABASE
$i = 0;
$query = "SELECT * FROM cms_venue_packages WHERE venue_ref = '". $venue_ref ."'";
$get_packages = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($get_packages)) {
    $venue_ref = $row['venue_ref'];
    $disabled = $row['disabled'];
    $venue_package = $row['venue_package'];
    $venue_package_subtitle_line_1 = $row['venue_package_subtitle_line_1'];
    $venue_package_subtitle_line_2 = $row['venue_package_subtitle_line_2'];
    $venue_package_price = $row['venue_package_price'];
    $available_from = $row['available_from'];
    $available_to = $row['available_to'];
    $package_id = $row['id'];
    
    
    // FETCH FIRST VENUE IMAGE FROM DATABASE
    $image_path = "";
    $query = "SELECT * FROM cms_venue_images WHERE venue_ref = '". $venue_ref ."'";
    $get_images = mysqli_query($connection, $query);
    if ($row = mysqli_fetch_assoc($get_images)) {
        $image_path = $row['image_path'];
    }
    
    
    // CHECK IF VENUE IS SET TO ACTIVE
    if ($disabled == 0) {
                                
            
        // CREATE INDIVIDUAL ARRAY FOR VENUE
        ${'package'. $i} = array(
            "venue_ref" => $venue_ref, 
            "venue_name" => $venue_name, 
            "venue_package" => $venue_package, 
            "venue_package_subtitle_line_1" => $venue_package_subtitle_line_1, 
            "venue_package_subtitle_line_2" => $venue_package_subtitle_line_2, 
            "venue_package_price" => $venue_package_price, 
            "available_from" => $available_from, 
            "available_to" => $available_to, 
            "package_id" => $package_id, 
            "image_path" => $image_path
        );


        // ADD INDIVIDUAL PRICING TO MASTER ARRAY
        $all_packages[] = ${'package'. $i}; $i++;
        
        
    }
    
    
}


// RETURN PRICING ARRAY
echo json_encode($all_packages);


?>