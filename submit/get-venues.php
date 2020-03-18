<?php
// SET TIMEZONE
date_default_timezone_set("Europe/London");


// CONNECT TO DATABASE
include "../includes/connect.php";


// FETCH DETAILS FROM AJAX REQUEST
//$county_filter = $_REQUEST["county_filter"];
//$daytime_filter = $_REQUEST["daytime_filter"];
//$evening_filter = $_REQUEST["evening_filter"];
//$sort_filter = $_REQUEST["sort_filter"];


// CONSRUCT VENUE SEARCH MYSQL QUERY
//$query = "SELECT * FROM cms_venue_details";
//if (isset($county_filter) and !empty($county_filter)) {
    //$query.= " WHERE county = '". $county_filter ."'";
//}
//if (isset($county_filter) and !empty($county_filter) and isset($daytime_filter) and !empty($daytime_filter)) {
    //$query.= " AND max_daytime >= '". $daytime_filter ."'";
//}
//if (isset($daytime_filter) and !empty($daytime_filter)) {
    //$query.= " WHERE max_daytime >= '". $daytime_filter ."'";
//}
//if (isset($county_filter) and !empty($county_filter) and isset($evening_filter) and !empty($evening_filter)) {
    //$query.= " AND max_evening >= '". $evening_filter ."'";
//}
//if (isset($evening_filter) and !empty($evening_filter)) {
    //$query.= " WHERE max_evening >= '". $evening_filter ."'";
//}
//if (isset($sort_filter) and $sort_filter == "1") {
    //$query.= " ORDER BY venue_name ASC";
//}
//if (isset($sort_filter) and $sort_filter == "2") {
    //$query.= " ORDER BY venue_package_price ASC";
//}
//if (isset($sort_filter) and $sort_filter == "3") {
    //$query.= " ORDER BY venue_package_price DESC";
//}


// FETCH VENUES FROM DATABASE
$i = 0;
$query = "SELECT * FROM cms_venue_details";
$get_venues = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($get_venues)) {
    $venue_ref = $row['venue_ref'];
    $venue_name = $row['venue_name'];
    $town_city = $row['town_city'];
    $county = $row['county'];
    $postcode = $row['postcode'];
    $max_daytime = $row['max_daytime'];
    $max_evening = $row['max_evening'];
    $disabled = $row['disabled'];
        
        
    // FETCH FIRST PACKAGE FROM DATABASE
    $query = "SELECT * FROM cms_venue_packages WHERE venue_ref = '". $venue_ref ."'";
    $get_packages = mysqli_query($connection, $query);
    if ($row = mysqli_fetch_assoc($get_packages)) {
        $venue_package = $row['venue_package'];
        $venue_package_subtitle_line_1 = $row['venue_package_subtitle_line_1'];
        $venue_package_subtitle_line_2 = $row['venue_package_subtitle_line_2'];
        $venue_package_price = $row['venue_package_price'];
    }
    
    
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
        ${'venue'. $i} = array(
            "venue_ref" => $venue_ref, 
            "venue_name" => $venue_name, 
            "town_city" => $town_city, 
            "county" => $county, 
            "postcode" => $postcode, 
            "max_daytime" => $max_daytime, 
            "max_evening" => $max_evening, 
            "venue_package" => $venue_package, 
            "venue_package_subtitle_line_1" => $venue_package_subtitle_line_1, 
            "venue_package_subtitle_line_2" => $venue_package_subtitle_line_2, 
            "venue_package_price" => $venue_package_price, 
            "image_path" => $image_path
        );


        // ADD INDIVIDUAL PRICING TO MASTER ARRAY
        $all_venues[] = ${'venue'. $i}; $i++;


    }
    
    
}


// RETURN PRICING ARRAY
echo json_encode($all_venues);


?>