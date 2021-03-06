<?php
// SET TIMEZONE
date_default_timezone_set("Europe/London");


// CONNECT TO DATABASE
include "../includes/connect.php";


// START SESSION
session_start();


// TEST SESSION DATA
$_SESSION["title"] = "Mr";
$_SESSION["first_name"] = "Jason";
$_SESSION["last_name"] = "Test";
$_SESSION["county"] = "Essex";
$_SESSION["email_address"] = "developer@themoneyhub.co.uk";
$_SESSION["contact_number"] = "01268686868";
$_SESSION["source"] = "PPCLeads";


// FETCH VENUE NAME
$venue_ref = base64_decode($_REQUEST["r"]);


// CHECK FOR VENUE NAME
if (isset($venue_ref) && !empty($venue_ref)) {
    
    
    // FETCH VENUE DETAILS FROM DATABASE
    $query = "SELECT cms_venue_details.venue_name, cms_venue_details.venue_description, cms_venue_details.address_line_2, cms_venue_details.address_line_3, cms_venue_details.town_city, cms_venue_details.county, cms_venue_details.postcode, cms_venue_details.google_maps, cms_venue_details.preview, cms_venue_details.video, cms_venue_packages.id, cms_venue_packages.venue_min_daytime, cms_venue_packages.venue_max_daytime, cms_venue_packages.venue_min_evening, cms_venue_packages.venue_max_evening, cms_venue_packages.venue_hotel_rooms, cms_venue_packages.venue_hotel_rooms_price FROM cms_venue_details, cms_venue_packages WHERE cms_venue_details.venue_ref= '". $venue_ref ."' AND cms_venue_packages.venue_ref= '". $venue_ref ."' LIMIT 1";
    $get_wedding_package = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($get_wedding_package)) {
        $venue_name = $row['venue_name'];
        $venue_description = $row['venue_description'];
        $address_line_2 = $row['address_line_2'];
        $address_line_3 = $row['address_line_3'];
        $town_city = $row['town_city'];
        $county = $row['county'];
        $postcode = $row['postcode'];
        $google_maps = $row['google_maps'];
        $preview = $row['preview'];
        $video = $row['video'];
        $package_id = $row['id'];
        $venue_min_daytime = $row['venue_min_daytime'];
        $venue_max_daytime = $row['venue_max_daytime'];
        $venue_min_evening = $row['venue_min_evening'];
        $venue_max_evening = $row['venue_max_evening'];
        $venue_hotel_rooms = $row['venue_hotel_rooms_price'];
        $venue_hotel_rooms_price = $row['venue_package_guests'];
        
        
        // FETCH PACKAGE DETAILS FROM DATABASE
        $query = "SELECT * FROM cms_additional_package_details WHERE package_id = '". $package_id ."'";
        $get_package_details = mysqli_query($connection, $query);
        $package_list = '<ul class="fa-ul">';
        while($row = mysqli_fetch_assoc($get_package_details)) {
            $package_item = $row['detail'];
            $package_list .= '<li><span class="fa-li"><i class="fas fa-heart"></i></span> '. $package_item .'</li>';
        }
        $package_list .= '</ul>';
        
        
        // FETCH VENUE FACILITIES FROM DATABASE
        //$query = "SELECT * FROM cms_venue_facilities WHERE venue_ref = '". $venue_ref ."'";
        //$get_venue_facilities = mysqli_query($connection, $query);
        //$capacity_list = '<ul class="fa-ul">';
        //$venue_type_list = '<ul class="fa-ul">';
        //$entertaiment_list = '<ul class="fa-ul">';
        //$accommodation_list = '<ul class="fa-ul">';
        //$staff_assistance_list = '<ul class="fa-ul">';
        //while($row = mysqli_fetch_assoc($get_venue_facilities)) {
            //$category = $row['category'];
            //$description = $row['description'];
            //if ($category == "capacity") {$capacity_list.= '<li><span class="fa-li"><i class="fas fa-heart"></i></span> '. $description .'</li>';}
            //if ($category == "venue type") {$venue_type_list.= '<li><span class="fa-li"><i class="fas fa-heart"></i></span> '. $description .'</li>';}
            //if ($category == "entertaiment") {$entertaiment_list.= '<li><span class="fa-li"><i class="fas fa-heart"></i></span> '. $description .'</li>';}
            //if ($category == "accommodation") {$accommodation_list.= '<li><span class="fa-li"><i class="fas fa-heart"></i></span> '. $description .'</li>';}
            //if ($category == "staff assistance") {$staff_assistance_list.= '<li><span class="fa-li"><i class="fas fa-heart"></i></span> '. $description .'</li>';}
        //}
        //$capacity_list.= '</ul>';
        //$venue_type_list.= '</ul>';
        //$entertaiment_list.= '</ul>';
        //$accommodation_list.= '</ul>';
        //$staff_assistance_list.= '</ul>';
        
        
        //
        $query = "SELECT DISTINCT category FROM cms_venue_facilities";
        $get_categories = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($get_categories)) {
            $category = $row['category'];
            echo $category;
        }
        
        
        //
        //$query = "SELECT * FROM cms_venue_facilities WHERE venue_ref = '". $venue_ref ."'";
        //$get_venue_facilities = mysqli_query($connection, $query);
        //$list_names = array('capacity','venue_type','entertaiment','accommodation','staff_assistance');
        //while($row = mysqli_fetch_assoc($get_venue_facilities)) {
            //$category = $row['category'];
            //$description = $row['description'];
            //foreach ($list_names as $name) {
                //$category_name = str_replace('_', ' ', $name);
                //${strtolower($name) .'_list'} = '<ul class="fa-ul">';
                //${strtolower($name) .'_list'}.= '<li>'. $category .'</li>';
                //${strtolower($name) .'_list'}.= '<li>'. $category_name .'</li>';
                //${strtolower($name) .'_list'}.= '</ul>';
            //}
        //}
        
        
        // FETCH VENUE BOOKED DATES FROM DATABASE
        $booked_dates_query = "SELECT * FROM cms_venue_booking WHERE venue_ref = '". $venue_ref ."'";
        $count_dates_query = "SELECT COUNT(venue_ref) FROM cms_venue_booking WHERE venue_ref = '". $venue_ref ."'";
        $get_booking_details = mysqli_query($connection, $booked_dates_query);
        $count_rows = mysqli_num_rows($get_booking_details);
        $the_comma = ''; $y = 1;
        while($row = mysqli_fetch_assoc($get_booking_details)) {
            if ($y < $count_rows) {$the_comma = ',';} else {$the_comma = '';}
            $dates = $row['event_date'];
            $bookedDates1 .= '"'. $bookedDates = date("j-n-Y", strtotime($dates)) .'"'. $the_comma;
            $y++;
        }
        
        
    }
    
    
}


?>
<!DOCTYPE html>
<html lang="en"><head>
<meta charset="UTF-8" />
<title>Simplywed - Wedding Package</title>
<meta name="description" content="Simplywed - Wedding Package" />
<meta name="robots" content="noindex,nofollow,noodp,noydir" />
<meta name="author" content="Jason Cheeseborough" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
    
    
<!-- BOOTSTRAP / STYLE CSS -->
<link href="/css/core/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="/css/core/bootstrap.min.css" rel="stylesheet">
<link href="/css/style.css" rel="stylesheet">
<link href="/images/favicon.ico" rel="icon" type="image/ico" />
    
    
<!-- FONT AWESOME CSS -->
<script src="https://kit.fontawesome.com/0781172ae7.js" crossorigin="anonymous"></script>


</head><body>
<?php include "../includes/header.php"; ?>
<section id="content" class="content">
<div class="container-fluid">
    <div class="container py-5">
        
        
        <?php
        // CHECK FOR VENUE NAME
        if (isset($venue_ref) && !empty($venue_ref)) {
            
            
            // DISPLAY VENUE PACKAGE
            echo '<div class="row"><div class="col-md-9 pb-3"><h1 class="font-30">'. $venue_name .'</h1></div><div class="col-md-3 pb-3"><a href="https://www.simplywed.co.uk/tools/quotes-demo/?c='. $county .'" style="text-decoration:none;"><div class="button btn-orange"><i class="fas fa-angle-left" style="float:left;"></i>Back to Venues</div></a></div></div><div class="row"><div class="col pb-3"><a href="JavaScript:void(0);" data-toggle="modal" data-target="#venue-location" style="text-decoration:none;"><p class="font-16 txt-purple mb-2"><b>SHOW MAP</b> - '; if ($address_line_2 != "") {echo $address_line_2; echo ', ';} if ($address_line_3 != "") {echo $address_line_3; echo ', ';} if ($town_city != "") {echo $town_city; echo ', ';} if ($county != "") {echo $county; echo ', ';} if ($postcode != "") {echo $postcode; echo '.';} echo '</p></a></div></div><div class="row"><div class="col pb-4"><div id="venueImages" class="carousel slide" data-ride="carousel"><div class="carousel-inner">'; for ($x = 1; $x <= $venue_image_count; $x++) {if ($x == 1) {$first = 'active';} else {$first = '';} echo '<div class="carousel-item '. $first .'"><img src="https://www.simplywed.co.uk/images/venues/large/'. $venue_media_name .''. $x .'.jpg" class="d-block w-100" alt="'. $venue_name .' '. $x .'"></div>';} echo '</div><a class="carousel-control-prev" href="#venueImages" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#venueImages" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a></div></div></div><div class="row d-none d-sm-block"><div class="col pb-4"><div id="venueThumbnails" class="carousel slide" data-ride="carousel"><div class="carousel-inner">'; $row_count = 0; for ($x = 1; $x <= $venue_image_count; $x++) {$row_count++; $slide_count = $x - 1; if ($x == 1) {$first = 'active';} else {$first = '';} if ($row_count == "1") {echo '<div class="carousel-item '. $first .'"><div class="row">';} echo '<div class="col-3"><a href="#" data-target="#venueImages" data-slide-to="'. $slide_count .'"><img src="https://www.simplywed.co.uk/images/venues/small/'. $venue_media_name .''. $x .'.jpg"  class="d-block w-100" alt="'. $venue_name .' '. $x .'"></a></div>'; if ($row_count == "4") {echo '</div></div>'; $row_count = 0;}} echo'</div><a class="carousel-control-prev" href="#venueThumbnails" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#venueThumbnails" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a></div></div></div><div class="row"><div class="col-md-9 font-18">'. html_entity_decode($venue_description) .'</div><div class="col-md-3 px-4"><div class="row"><div class="col pt-4 px-4 bck-purple">'; if ($video == "1") {echo '<div class="row"><div class="col pb-4"><a href="JavaScript:void(0);" style="text-decoration:none;"><div class="button btn-orange" data-toggle="modal" data-target="#venue-video">View Venue Video</div></a></div></div>';} echo '<div class="row"><div class="col pb-4"><a href="JavaScript:void(0);" style="text-decoration:none;"><div class="button btn-orange" data-toggle="modal" data-target="#venue-facilities">View Venue Facilities</div></a></div></div><div class="row"><div class="col pb-4"><a href="JavaScript:void(0);" style="text-decoration:none;"><div class="button btn-orange" data-toggle="modal" data-target="#package-details">View Wedding Package</div></a></div></div><div class="row"><div class="col pb-4"><a href="JavaScript:void(0);" style="text-decoration:none;"><div class="button btn-orange font-30" data-toggle="modal" data-target="#get-quote">Get Your<br >Price Now</div></a></div></div></div></div></div></div>';
            
            
            // CREATE VENUE VIDEO MODAL
            echo '<div class="modal fade" id="venue-video" tabindex="-1" role="dialog" aria-hidden="true"><div class="modal-dialog modal-dialog-centered modal-lg" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">'. $venue_name .'</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><div class="col"><video width="100%" controls="controls"><source src="https://www.simplywed.co.uk/videos/venues/'. $venue_media_name .'.mp4" type="video/mp4">Your browser does not support HTML5 video.</video></div></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></div></div></div></div>';
            
            
            // CREATE VENUE LOCATION MODAL
            echo '<div class="modal fade" id="venue-location" tabindex="-1" role="dialog" aria-hidden="true"><div class="modal-dialog modal-dialog-centered modal-lg" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">'. $venue_name .'</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><div class="col text-left"><h3>Venue Location</h3><br /><p>'; if($address_line_1 != "") {echo $address_line_1; echo '<br />';} if($address_line_2 != "") {echo $address_line_2; echo '<br />';} if($address_line_3 != "") {echo $address_line_3; echo '<br />';} if($town_city != "") {echo $town_city; echo '<br />';} if($county != "") {echo $county; echo '<br />';} if($postcode != "") {echo $postcode; echo '<br />';} echo '</p>'; if($google_maps != "") {echo $google_maps;} echo '</div></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></div></div></div></div>';
            
            
            // CREATE VENUE FACILITIES MODAL
            echo '<div class="modal fade" id="venue-facilities" tabindex="-1" role="dialog" aria-hidden="true"><div class="modal-dialog modal-dialog-centered modal-lg" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">'. $venue_name .'</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><div class="col text-left"><h3>Venue Facilities</h3><br /><p><b>Capacity</b></p>'. $capacity_list .'<p><b>Venue Type</b></p>'. $venue_type_list .'<p><b>Evening Entertainment</b></p>'. $entertaiment_list .'<p><b>Overnight Accommodation</b></p>'. $accommodation_list .'<p><b>Venue Staff Assistance</b></p>'. $staff_assistance_list .'</div></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></div></div></div></div>';
            
            
            // CREATE PACKAGE DETAILS MODAL
            echo '<div class="modal fade" id="package-details" tabindex="-1" role="dialog" aria-hidden="true"><div class="modal-dialog modal-dialog-centered modal-lg" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">'. $venue_name .'</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><div class="col text-left"><h3>Package Details</h3><br />'. $package_list .'</div></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></div></div></div></div>';
            
            
            // CREATE PACKAGE QUOTE MODAL
            echo '<div class="modal fade" id="get-quote" tabindex="-1" role="dialog" aria-hidden="true"><div class="modal-dialog modal-dialog-centered modal-md" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">'. $venue_name .'</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body p-2 p-lg-5"><input type="hidden" id="venueName" value="'. $venue_name .'"><input type="hidden" id="venueMinDaytime" value="'. $venue_min_daytime .'"><input type="hidden" id="venueMinEvening" value="'. $venue_min_evening .'"><input type="hidden" id="venueMaxDaytime" value="'. $venue_max_daytime .'"><input type="hidden" id="venueMaxEvening" value="'. $venue_max_evening .'"><input type="hidden" id="venueMaxHotelRooms" value="'. $venue_hotel_rooms .'"><input type="hidden" id="venueHotelRoomPrice" value="'. $venue_hotel_rooms_price .'"><input type="hidden" id="source" value="'. $_SESSION["source"] .'"><div id="quote-slide-1" class="col"><div class="row"><div class="col form-group mb-4"><span>1 of 9 Questions</span><div class="progress"><div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div></div></div></div><div class="row"><div class="col form-group mb-4"><label>What Title do you use?</label><p class="txt-red" id="error-1"></p><select class="form-control" id="title"><option value="">Please Select</option><option value="Mr" '; if ($_SESSION["title"] == "Mr") {echo 'selected';} echo '>Mr</option><option value="Mrs" '; if ($_SESSION["title"] == "Mrs") {echo 'selected';} echo '>Mrs</option><option value="Ms" '; if ($_SESSION["title"] == "Ms") {echo 'selected';} echo '>Ms</option><option value="Miss" '; if ($_SESSION["title"] == "Miss") {echo 'selected';} echo '>Miss</option></select></div></div><div class="row"><div class="col form-group"><div class="row"><div class="col"><a href="JavaScript:void(0);" id="nextSlide-1"><button type="button" class="button btn-purple"><b>NEXT <i class="fas fa-angle-right" style="float: right;"></i></b></button></a></div></div></div></div></div><div id="quote-slide-2" class="col" style="display: none;"><div class="row"><div class="col form-group mb-4"><span>2 of 9 Questions</span><div class="progress"><div class="progress-bar" role="progressbar" style="width: 11.11%;" aria-valuenow="11.11" aria-valuemin="0" aria-valuemax="100"></div></div></div></div><div class="row"><div class="col form-group mb-4"><label>Could we have your First Name?</label><p class="txt-red" id="error-2"></p><input type="text" class="form-control" id="firstName" value="'. $_SESSION["first_name"] .'"></div></div><div class="row"><div class="col form-group"><div class="row"><div class="col-6"><a href="JavaScript:void(0);" id="backSlide-2"><button type="button" class="button btn-purple"><b><i class="fas fa-angle-left" style="float: left;"></i> BACK</b></button></a></div><div class="col-6"><a href="JavaScript:void(0);" id="nextSlide-2"><button type="button" class="button btn-purple"><b>NEXT <i class="fas fa-angle-right" style="float: right;"></i></b></button></a></div></div></div></div></div><div id="quote-slide-3" class="col" style="display: none;"><div class="row"><div class="col form-group mb-4"><span>3 of 9 Questions</span><div class="progress"><div class="progress-bar" role="progressbar" style="width: 22.22%;" aria-valuenow="22.22" aria-valuemin="0" aria-valuemax="100"></div></div></div></div><div class="row"><div class="col form-group mb-4"><label>and your Surname?</label><p class="txt-red" id="error-3"></p><input type="text" class="form-control" id="lastName" value="'. $_SESSION["last_name"] .'"></div></div><div class="row"><div class="col form-group"><div class="row"><div class="col-6"><a href="JavaScript:void(0);" id="backSlide-3"><button type="button" class="button btn-purple"><b><i class="fas fa-angle-left" style="float: left;"></i> BACK</b></button></a></div><div class="col-6"><a href="JavaScript:void(0);" id="nextSlide-3"><button type="button" class="button btn-purple"><b>NEXT <i class="fas fa-angle-right" style="float: right;"></i></b></button></a></div></div></div></div></div><div id="quote-slide-4" class="col" style="display: none;"><div class="row"><div class="col form-group mb-4"><span>4 of 9 Questions</span><div class="progress"><div class="progress-bar" role="progressbar" style="width: 33.33%;" aria-valuenow="33.33" aria-valuemin="0" aria-valuemax="100"></div></div></div></div><div class="row"><div class="col form-group mb-4"><label>Potential Wedding Date?</label><p class="txt-red" id="error-4"></p><div class="input-group date"><input type="text" name="date" class="form-control datepicker" id="weddingDate" placeholder="DD/MM/YYYY"><div class="input-group-append"><div class="input-group-text"><i class="fas fa-calendar-alt"></i></div></div></div><div class="row mx-1 mt-2"><div class="col-1 bck-orange"></div><div class="col-3">Available</div><div class="col-1"></div><div class="col-1 bck-purple"></div><div class="col-3">Booked</div><div class="col-3"></div></div></div></div><div class="row"><div class="col form-group"><div class="row"><div class="col-6"><a href="JavaScript:void(0);" id="backSlide-4"><button type="button" class="button btn-purple"><b><i class="fas fa-angle-left" style="float: left;"></i> BACK</b></button></a></div><div class="col-6"><a href="JavaScript:void(0);" id="nextSlide-4"><button type="button" class="button btn-purple"><b>NEXT <i class="fas fa-angle-right" style="float: right;"></i></b></button></a></div></div></div></div></div><div id="quote-slide-5" class="col" style="display: none;"><div class="row"><div class="col form-group mb-4"><span>5 of 9 Questions</span><div class="progress"><div class="progress-bar" role="progressbar" style="width: 44.44%;" aria-valuenow="44.44" aria-valuemin="0" aria-valuemax="100"></div></div></div></div><div class="row"><div class="col form-group mb-4"><label>How many daytime guests?</label><p class="txt-red" id="error-5"></p><input type="number" min="0" class="form-control" id="daytimeGuests"></div></div><div class="row"><div class="col form-group"><div class="row"><div class="col-6"><a href="JavaScript:void(0);" id="backSlide-5"><button type="button" class="button btn-purple"><b><i class="fas fa-angle-left" style="float: left;"></i> BACK</b></button></a></div><div class="col-6"><a href="JavaScript:void(0);" id="nextSlide-5"><button type="button" class="button btn-purple"><b>NEXT <i class="fas fa-angle-right" style="float: right;"></i></b></button></a></div></div></div></div></div><div id="quote-slide-6" class="col" style="display: none;"><div class="row"><div class="col form-group mb-4"><span>6 of 9 Questions</span><div class="progress"><div class="progress-bar" role="progressbar" style="width: 55.55%;" aria-valuenow="55.55" aria-valuemin="0" aria-valuemax="100"></div></div></div></div><div class="row"><div class="col form-group mb-4"><label>How many evening guests?</label><p class="txt-red" id="error-6"></p><input type="number" min="0" class="form-control" id="eveningGuests"></div></div><div class="row"><div class="col form-group"><div class="row"><div class="col-6"><a href="JavaScript:void(0);" id="backSlide-6"><button type="button" class="button btn-purple"><b><i class="fas fa-angle-left" style="float: left;"></i> BACK</b></button></a></div><div class="col-6"><a href="JavaScript:void(0);" id="nextSlide-6"><button type="button" class="button btn-purple"><b>NEXT <i class="fas fa-angle-right" style="float: right;"></i></b></button></a></div></div></div></div></div><div id="quote-slide-7" class="col" style="display: none;"><div class="row"><div class="col form-group mb-4"><span>7 of 9 Questions</span><div class="progress"><div class="progress-bar" role="progressbar" style="width: 66.66%;" aria-valuenow="66.66" aria-valuemin="0" aria-valuemax="100"></div></div></div></div><div class="row"><div class="col form-group mb-4"><label>Do you need a DJ?</label><p class="txt-red" id="error-7"></p><select class="form-control" id="eveningEntertain"><option value="">Please Select</option><option value="Yes">Yes</option><option value="No">No</option></select></div></div><div class="row"><div class="col form-group"><div class="row"><div class="col-6"><a href="JavaScript:void(0);" id="backSlide-7"><button type="button" class="button btn-purple"><b><i class="fas fa-angle-left" style="float: left;"></i> BACK</b></button></a></div><div class="col-6"><a href="JavaScript:void(0);" id="nextSlide-7"><button type="button" class="button btn-purple"><b>NEXT <i class="fas fa-angle-right" style="float: right;"></i></b></button></a></div></div></div></div></div><div id="quote-slide-8" class="col" style="display: none;"><div class="row"><div class="col form-group mb-4"><span>8 of 9 Questions</span><div class="progress"><div class="progress-bar" role="progressbar" style="width: 77.77%;" aria-valuenow="77.77" aria-valuemin="0" aria-valuemax="100"></div></div></div></div><div class="row"><div class="col form-group mb-4"><label>What email address can we reach you at?<br /><br />This is only required in relation to your wedding venue package details and an estimate of your wedding costs, not to send you spam or advertising.</label><p class="txt-red" id="error-8"></p><input type="email" class="form-control" id="emailAddress" value="'. $_SESSION["email_address"] .'"></div></div><div class="row"><div class="col form-group"><div class="row"><div class="col-6"><a href="JavaScript:void(0);" id="backSlide-8"><button type="button" class="button btn-purple"><b><i class="fas fa-angle-left" style="float: left;"></i> BACK</b></button></a></div><div class="col-6"><a href="JavaScript:void(0);" id="nextSlide-8"><button type="button" class="button btn-purple"><b>NEXT <i class="fas fa-angle-right" style="float: right;"></i></b></button></a></div></div></div></div></div><div id="quote-slide-9" class="col" style="display: none;"><div class="row"><div class="col form-group mb-4"><span>Final Question</span><div class="progress"><div class="progress-bar" role="progressbar" style="width: 88.88%;" aria-valuenow="88.88" aria-valuemin="0" aria-valuemax="100"></div></div></div></div><div class="row"><div class="col form-group mb-4"><label>We or the Wedding Venue may need to call for additional questions and to provide you with details of your wedding. What is the best number to reach you on?</label><p class="txt-red" id="error-9"></p><input type="number" min="0" class="form-control" id="contactNumber" value="'. $_SESSION["contact_number"] .'"></div></div><div class="row"><div class="col form-group"><div class="row"><div class="col-6"><a href="JavaScript:void(0);" id="backSlide-9"><button type="button" class="button btn-purple"><b><i class="fas fa-angle-left" style="float: left;"></i> BACK</b></button></a></div><div class="col-6"><a href="JavaScript:void(0);" id="nextSlide-9"><button type="button" class="button btn-purple"><b>NEXT <i class="fas fa-angle-right" style="float: right;"></i></b></button></a></div></div></div></div></div><div id="quote-slide-10" class="col" style="display: none;"><div class="row"><div class="col form-group mb-4 text-center"><label>By continuing you are accepting our <a href="/privacy-policy.php" target="_blank">Privacy Policy</a></label></div></div><div class="row"><div class="col form-group"><div class="row"><div class="col-6"><a href="JavaScript:void(0);" id="backSlide-10"><button type="button" class="button btn-purple"><b><i class="fas fa-angle-left" style="float: left;"></i> BACK</b></button></a></div><div class="col-6"><a href="JavaScript:void(0);" id="nextSlide-10"><button type="button" class="button btn-purple"><b>GET PRICING</b></button></a></div></div></div></div></div><div id="quote-slide-11" class="col" style="display: none;"><div class="row"><div class="col form-group mb-4">'; if ($preview == 1) {echo '<div class="row"><div class="col text-center"><h2>THANK YOU</h2><br /><h4>Your wedding might seem a long time away, but dates get booked fast. Do not be disappointed, book your viewing now.</h4><br /><h4>Please see your Estimate below.</h4></div></div><div class="row"><div class="col mt-3 text-center"><a href="https://www.simplywed.co.uk/?c='. $county .'"><button type="button" class="button btn-purple btn-lg"><b>Back to the Venues</b></button></a></div><div class="col mt-3 text-center" id="booking"></div></div><div class="row"><div class="col mt-5 mx-3 mx-lg-0 pt-3 bck-pink txt-white" id="preview"></div></div>';} else {echo '<div class="row"><div class="col text-center"><h2>THANK YOU</h2><br /><h4>An email is on its way to you now, this will show your personal estimated quotation and the wedding package details.</h4><br /><h4>We wish you all the best on your forthcoming wedding.</h4></div></div><div class="row"><div class="col mt-3 text-center"><a href="https://www.simplywed.co.uk/?c='. $county .'"><button type="button" class="button btn-purple btn-lg"><b>Back to Venues</b></button></a></div></div>';} echo '</div></div></div></div></div></div></div>';
            
            
        } else {
            
            
            // DISPLAY ERROR PAGE CONTENT
            echo '<div class="col text-center"><h2>SORRY, THERE WAS A PROBLEM</h2><h4>If you continue getting message please call us on <a href="tel:02038411045">0203 841 1045</h4></div>';
            
            
        }
        ?>
        
        
    </div>
</div>
</section>
<?php include "../includes/footer.php"; ?>


<!-- JAVASCRIPT FOR BOOTSTRAP ELEMENTS -->
<script src="/js/core/jquery-3.3.1.slim.min.js" type="text/javascript"></script>
<script src="/js/core/popper.min.js" type="text/javascript"></script>
<script src="/js/core/bootstrap.min.js" type="text/javascript"></script>
    
   
<!-- JAVASCRIPT FOR QUOTATION FORM HANDLING -->
<script src="/js/core/jquery.min.js" type="text/javascript"></script>
<script src="/js/quote-validation.js" type="text/javascript"></script>
<script src="/js/quote-processing.js" type="text/javascript"></script>


<!--JAVASCRIPT DATEPICKER DISABLE DATES-->
<script src="/js/core/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script type="text/javascript">var disableDates = [<?php echo $bookedDates1; ?>]; $('.input-group.date').datepicker({format: "dd/mm/yyyy", maxViewMode: 2, autoclose: true, beforeShowDay: function(date){dmy = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear(); if(disableDates.indexOf(dmy) != -1){return false;} else {return true;}}});</script>


</body></html>