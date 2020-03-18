<?php
// SET TIMEZONE
date_default_timezone_set("Europe/London");


// CONNECT TO DATABASE
include "../includes/connect.php";


// SET TEST SESSION DATA
$_SESSION["title"] = "Mr";
$_SESSION["first_name"] = "Jason";
$_SESSION["last_name"] = "Test";
$_SESSION["county"] = "Hampshire";
$_SESSION["email_address"] = "developer@themoneyhub.co.uk";
$_SESSION["contact_number"] = "01268686868";
$_SESSION["source"] = "PPCLeads";


// FETCH DETAILS FROM URL STRING
$venue_ref = $_REQUEST["v"];
$package_id = $_REQUEST["p"];


// CHECK FOR VENUE REF AND PACKAGE ID
if (isset($venue_ref) and !empty($venue_ref) and isset($package_id) and !empty($package_id)) {
    
    
    // FETCH VENUE DETAILS FROM DATABASE
    $query = "SELECT * FROM cms_venue_details, cms_venue_packages WHERE cms_venue_details.venue_ref = '". $venue_ref ."' AND cms_venue_packages.id = '". $package_id ."'";
    $get_package = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($get_package)) {
        $venue_ref = $row['venue_ref'];
        $venue_name = $row['venue_name'];
        $venue_email = $row['venue_email'];
        $venue_description = $row['venue_description'];
        $address_line_1 = $row['address_line_1'];
        $address_line_2 = $row['address_line_2'];
        $address_line_3 = $row['address_line_3'];
        $town_city = $row['town_city'];
        $county = $row['county'];
        $postcode = $row['postcode'];
        $preview = $row['preview'];
        $video = $row['video'];
        $venue_package = $row['venue_package'];
        $venue_package_subtitle = $row['venue_package_subtitle'];
        $venue_package_price = $row['venue_package_price'];
        $daytime_extra_guest_price = $row['daytime_extra_guest_price'];
        $evening_extra_guest_price = $row['evening_extra_guest_price'];
        $available_from = $row['available_from'];
        $available_to = $row['available_to'];
        $venue_min_daytime = $row['venue_min_daytime'];
        $venue_max_daytime = $row['venue_max_daytime'];
        $venue_min_evening = $row['venue_min_evening'];
        $venue_max_evening = $row['venue_max_evening'];
        $venue_hotel_rooms = $row['venue_hotel_rooms'];
        $venue_hotel_rooms_price = $row['venue_hotel_rooms_price'];
        $dj_included = $row['dj_included'];
        $dj_price = $row['dj_price'];
        
        
        // FETCH VENUE MAIN IMAGE NAMES FROM DATABASE
        $img_number = 0;
        $images_main = "";
        $query = "SELECT * FROM cms_venue_images WHERE venue_ref = '". $venue_ref ."'";
        $get_images = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($get_images)) {
            $img_number++;
            $image_path = $row['image_path'];
            if ($img_number == 1) {$first = 'active';} else {$first = '';}
            $images_main .= '<div class="carousel-item '. $first .'"><img src="/images/venues/large/'. $image_path .'" class="d-block w-100" alt="'. $venue_name .' Image '. $img_number .'"></div>';
        }
        
        
        // FETCH VENUE THUMBNAIL IMAGE NAMES FROM DATABASE
        $row_number = 0;
        $img_number = 0;
        $images_thumbnails = "";
        $get_image_thumbs = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($get_image_thumbs)) {
            $row_number++;
            $img_number++;
            $slide_number = $img_number - 1;
            $image_path = $row['image_path'];
            if ($img_number == 1) {$first = 'active';} else {$first = '';}
            if ($row_number == 1) {$images_thumbnails .= '<div class="carousel-item '. $first .'"><div class="row">';}
            $images_thumbnails .= '<div class="col-3"><a href="#" data-target="#venueImages" data-slide-to="'. $slide_number .'"><img src="/images/venues/small/'. $image_path .'" class="d-block w-100" alt="'. $venue_name .' Image '. $img_number .'"></a></div>';
            if ($row_number == 4) {$images_thumbnails .= '</div></div>'; $row_number = 0;}
        }
        
        
        // FETCH VENUE POSTCODE AND CALCULATE LAT / LONG FOR GOOGLE MAPS
        function getLnt($zip) {
            $url = "https://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($zip)."&key=AIzaSyDUb6sUYDFGheeMWV8Wl-lN9wDz6hi858A";
            $result_string = file_get_contents($url);
            $result = json_decode($result_string, true);
            $result1[] = $result['results'][0];
            $result2[] = $result1[0]['geometry'];
            $result3[] = $result2[0]['location'];
            return $result3[0];
        }
        $val = getLnt($postcode);
        $venue_lat = $val['lat'];
        $venue_lng = $val['lng'];
        
        
        // FETCH VENUE FACILITIES FROM DATABASE
        $query = "SELECT DISTINCT category FROM cms_venue_facilities";
        $get_facility_categories = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($get_facility_categories)) {$categories[] = $row['category'];}
        foreach ($categories as $key => $category_type) {
            ${'facility_list_'. $category_type} = '<p><b>'. ucwords($category_type) .'</b></p><ul class="fa-ul">';
            $query = "SELECT * FROM cms_venue_facilities WHERE venue_ref = '". $venue_ref ."'";
            $get_facility_details = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($get_facility_details)) {
                if ($row['category'] == $category_type) {
                    ${'facility_list_'. $category_type} .= '<li><span class="fa-li"><i class="fas fa-heart"></i></span>'. $row["description"] .'</li>';
                }
            }
            ${'facility_list_'. $category_type} .= '</ul><br />';
            $facility_list .= ${'facility_list_'. $category_type};
        }
        
        
        // FETCH PACKAGE DETAILS FROM DATABASE
        $query = "SELECT * FROM cms_additional_package_details WHERE package_id = '". $package_id ."'";
        $get_package_details = mysqli_query($connection, $query);
        $package_list = '<ul class="fa-ul">';
        while($row = mysqli_fetch_assoc($get_package_details)) {$package_list .= '<li><span class="fa-li"><i class="fas fa-heart"></i></span> '. $row["detail"] .'</li>';}
        $package_list .= '</ul>';
        
        
    }
    
    
    // CONSTRUCT ADDRESS LINE
    $address = '';
    if ($address_line_2 != "") {$address .= $address_line_2 .', ';}
    if ($address_line_3 != "") {$address .= $address_line_3 .', ';}
    if ($town_city != "") {$address .= $town_city .', ';}
    if ($county != "") {$address .= $county .', ';}
    if ($postcode != "") {$address .= $postcode .'.';}
    
    
}


?>
<!DOCTYPE html>
<html lang="en"><head>
<meta charset="UTF-8" />
<title>Simplywed - View Package</title>
<meta name="description" content="Simplywed - Wedding Packages" />
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
        if (isset($venue_ref) and !empty($venue_ref) and isset($package_id) and !empty($package_id)) {
            
            
            // DISPLAY VENUE PACKAGE
            echo '<div class="row">
                <div class="col-md-9 pb-3">
                    <h1 class="font-32">'. $venue_name .'</h1>
                </div>
                <div class="col-md-3 pb-3">
                    <a href="https://www.simplywed.co.uk/wedding-venues/packages.php?r='. $venue_ref .'&v='. $venue_name .'" style="text-decoration:none;">
                        <div class="button btn-orange"><i class="fas fa-angle-left" style="float:left;"></i>Back to Packages</div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col pb-3">
                    <a href="JavaScript:void(0);" data-toggle="modal" data-target="#venue-location" style="text-decoration:none;">
                        <p class="font-16 txt-purple mb-2"><b>SHOW MAP</b> - '. $address .'</p>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col pb-4">
                    <div id="venueImages" class="carousel slide carousel-fade" data-ride="carousel">
                        <div class="carousel-inner">';
                        
                        
                        if ($images_main != "") {
                            echo $images_main;
                        } else {
                            echo '<div class="carousel-item active"><img src="/images/venues/large/placeholder.jpg" class="d-block w-100" alt=""></div><div class="carousel-item"><img src="/images/venues/large/placeholder.jpg" class="d-block w-100" alt=""></div><div class="carousel-item"><img src="/images/venues/large/placeholder.jpg" class="d-block w-100" alt=""></div><div class="carousel-item"><img src="/images/venues/large/placeholder.jpg" class="d-block w-100" alt=""></div><div class="carousel-item"><img src="/images/venues/large/placeholder.jpg" class="d-block w-100" alt=""></div><div class="carousel-item"><img src="/images/venues/large/placeholder.jpg" class="d-block w-100" alt=""></div><div class="carousel-item"><img src="/images/venues/large/placeholder.jpg" class="d-block w-100" alt=""></div><div class="carousel-item"><img src="/images/venues/large/placeholder.jpg" class="d-block w-100" alt=""></div>';
                        }
                        
                        
                        echo '</div>
                        <a class="carousel-control-prev" href="#venueImages" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#venueImages" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row d-none d-sm-block">
                <div class="col pb-4">
                    <div id="venueThumbnails" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">';
                        
                        
                        if ($images_thumbnails != "") {
                            echo $images_thumbnails;
                        } else {
                            echo '<div class="carousel-item active"><div class="row"><div class="col-3"><a href="#" data-target="#venueImages" data-slide-to="1"><img src="/images/venues/small/placeholder.jpg" class="d-block w-100" alt=""></a></div><div class="col-3"><a href="#" data-target="#venueImages" data-slide-to="2"><img src="/images/venues/small/placeholder.jpg" class="d-block w-100" alt=""></a></div><div class="col-3"><a href="#" data-target="#venueImages" data-slide-to="3"><img src="/images/venues/small/placeholder.jpg" class="d-block w-100" alt=""></a></div><div class="col-3"><a href="#" data-target="#venueImages" data-slide-to="4"><img src="/images/venues/small/placeholder.jpg" class="d-block w-100" alt=""></a></div></div></div><div class="carousel-item"><div class="row"><div class="col-3"><a href="#" data-target="#venueImages" data-slide-to="1"><img src="/images/venues/small/placeholder.jpg" class="d-block w-100" alt=""></a></div><div class="col-3"><a href="#" data-target="#venueImages" data-slide-to="2"><img src="/images/venues/small/placeholder.jpg" class="d-block w-100" alt=""></a></div><div class="col-3"><a href="#" data-target="#venueImages" data-slide-to="3"><img src="/images/venues/small/placeholder.jpg" class="d-block w-100" alt=""></a></div><div class="col-3"><a href="#" data-target="#venueImages" data-slide-to="4"><img src="/images/venues/small/placeholder.jpg" class="d-block w-100" alt=""></a></div></div></div>';
                        }
                        
                        
                        echo '</div>
                        <a class="carousel-control-prev" href="#venueThumbnails" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#venueThumbnails" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9 font-18 text-justify">'. html_entity_decode($venue_description, ENT_QUOTES, 'UTF-8') .'</div>
                <div class="col-md-3 px-4">
                    <div class="row">
                        <div class="col pt-4 px-4 bck-purple">'; 
                            
                            
                            if ($video == "0") {
                                echo '<div class="row">
                                    <div class="col pb-4">
                                        <a href="JavaScript:void(0);" style="text-decoration:none;">
                                            <div class="button btn-orange" data-toggle="modal" data-target="#venue-video">View Venue Video</div>
                                        </a>
                                    </div>
                                </div>';
                            } 
                            
                            
                            echo '<div class="row">
                                <div class="col pb-4">
                                    <a href="JavaScript:void(0);" style="text-decoration:none;">
                                        <div class="button btn-orange" data-toggle="modal" data-target="#venue-facilities">View Venue Facilities</div>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pb-4">
                                    <a href="JavaScript:void(0);" style="text-decoration:none;">
                                        <div class="button btn-orange" data-toggle="modal" data-target="#package-details">View Wedding Package</div>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pb-4">
                                    <a href="JavaScript:void(0);" style="text-decoration:none;">
                                        <div class="button btn-orange font-30" data-toggle="modal" data-target="#get-quote">Get Your<br >Price Now</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
            
            
            // CREATE VENUE VIDEO MODAL
            echo '<div class="modal fade" id="venue-video" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">'. $venue_name .'</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="col">
                                <video width="100%" controls="controls"><source src="https://www.simplywed.co.uk/videos/venues/'. $venue_name .'.mp4" type="video/mp4">Your browser does not support HTML5 video.</video>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>';
            
            
            // CREATE VENUE LOCATION MODAL
            echo '<html><div class="modal fade" id="venue-location" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">'. $venue_name .'</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="col text-left">
                                <h3>Venue Location</h3><br />
                                <p>'. $address .'</p><br />
                                <div id="map" style="width: 100%; height: 400px;"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div></html>';
            
            
            // CREATE VENUE FACILITIES MODAL
            echo '<div class="modal fade" id="venue-facilities" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">'. $venue_name .'</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="col text-left">
                                <h3>Venue Facilities</h3><br />
                                '. $facility_list .'
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>';
            
            
            // CREATE PACKAGE DETAILS MODAL
            echo '<div class="modal fade" id="package-details" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">'. $venue_name .'</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="col text-left">
                                <h3>Package Details</h3><br />
                                '. $package_list .'
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>';
            
            
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
    
    
<!-- JAVASCRIPT FOR GOOGLE MAPS -->
<script>function initMap() {var adovys = {lat: <?php echo  $val['lat']; ?>, lng: <?php echo $val['lng']?>}; var map = new google.maps.Map(document.getElementById('map'), {center: adovys, zoom: 17}); var marker = new google.maps.Marker({position: adovys, map: map});}</script><script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUb6sUYDFGheeMWV8Wl-lN9wDz6hi858A&amp;callback=initMap" type="text/javascript"></script>
    
   
<!-- JAVASCRIPT FOR QUOTATION FORM HANDLING -->
<script src="/js/core/jquery.min.js" type="text/javascript"></script>
<!--<script src="js/quote-form.js" type="text/javascript"></script>-->
<!--<script src="js/quote-validation.js" type="text/javascript"></script>-->
<!--<script src="/js/core/bootstrap-datepicker.min.js" type="text/javascript"></script>-->


<!-- JAVASCRIPT DATEPICKER DISABLE DATES 
<script type="text/javascript">var disableDates = [<?php echo $bookedDates1; ?>]; $('.input-group.date').datepicker({format: "dd/mm/yyyy", maxViewMode: 2, autoclose: true, beforeShowDay: function(date){dmy = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear(); if(disableDates.indexOf(dmy) != -1){return false;} else {return true;}}});</script>-->


</body></html>