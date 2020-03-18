<?php
$page='venue-list';
require_once '../cms/overall/header.php';
if(!isset($_GET['id'])){
    $venue_id = 1;
} else{
    $check = DB::getInstance()->get('cms_venue_details', array('id', '=',$_GET['id']));
    if(!$check ->count()){
        Redirect::to('../admin');
        
    }  else{ 
        $venue_id = $_GET['id'];
        $venue_ref= $check->first()->venue_ref;
    }
}
 $venue_info = DB::getInstance()->get('cms_venue_details', array('id', '=', $venue_id ));
?>


<div class="container">
    
    
    <div class="row border-bottom">
        <div class="col-6">
            <h1><?php echo $venue_info->first()->venue_name; ?></h1>
        </div>
        <div class="col-6">
            <?php echo '<h1>#'. $venue_info->first()->id .'</h1>'; ?>
        </div>
    </div>
    
    
<!--    VENUE ADDRESS DETAILS-->
    
    <div class="row justify-content-between border-bottom">
        <div class="col-sm-12 col-md-3 clo-lg-2 font-weight-bold text-uppercase">Address:</div>
        <div class="col-sm-12 col-md-9 col-lg-8 text-secondary">
            <?php echo $venue_info->first()->address_line_1 .'<br>'.
                    $venue_info->first()->address_line_2 .'<br>'.
                    $venue_info->first()->address_line_3 .'<br>'.
                    $venue_info->first()->town_city. '<br>'.
                    $venue_info->first()->county .'<br>'.
                    $venue_info->first()->postcode;
            ?>
        </div>
    </div>
    
    <div class="row justify-content-between border-bottom">
        <div class="col-sm-12 col-md-3 clo-lg-2 font-weight-bold text-uppercase">Email:</div>
        <div class="col-sm-12 col-md-9 col-lg-8 text-secondary">
            <?php echo $venue_info->first()->venue_email; ?>
        </div>
    </div>
    
    
    <div class="row justify-content-between border-bottom">
        <div class="col-sm-12 col-md-3 clo-lg-2 font-weight-bold text-uppercase">Contact No:</div>
        <div class="col-sm-12 col-md-9 col-lg-8 text-secondary">
            <?php // echo $venue_info->first()->contact_no; ?>
            <span>12312345</span>
        </div>
    </div>
    
<!--    VENUE HOMEPAGE DESCRIPTION-->
    <div class="row justify-content-between border-bottom">
        <div class="col-sm-12 col-md-3 clo-lg-2 font-weight-bold text-uppercase">Description:</div>
        <div class="col-sm-12 col-md-9 col-lg-8 text-secondary">
            <?php echo decode_string($venue_info->first()->venue_description); ?>
        </div>
    </div>
    
<!--    VENUE IMAGES-->
    <div class="row justify-content-between border-bottom py-4">
        <div class="col-sm-12 col-md-3 clo-lg-2 font-weight-bold text-uppercase">Venue Images:</div>
        <div class="col-sm-12 col-md-9 col-lg-8 text-secondary">
            <div class="row py-2">
                
            <?php  require_once '../cms/inc/add_venue_images.inc.php'; ?>
                
            </div>
            <form method="post" action='' enctype="multipart/form-data">
                <input type="file" name="image" id="file" multiple="">
                <input type="submit" name="add_image" value='Upload New Image'>
            </form>
            <?php ?>
        </div>
    </div>
    
    <!--    VENUE MOVIE-CLIP-->
    <div class="row justify-content-between border-bottom py-4">
        <div class="col-sm-12 col-md-3 clo-lg-2 font-weight-bold text-uppercase">Venue Video:</div>
        <div class="col-sm-12 col-md-9 col-lg-8 text-secondary">
            <div class="row py-2">
                
             <?php  require_once '../cms/inc/add_venue_video.inc.php'?>
                
            </div>
            <form method="post" action='' enctype="multipart/form-data">
                <input type="file" name="videoes" id="videoes" multiple="">
                <input type="submit" name="add_video" value='Upload New video'>
            </form>
            <?php ?>
        </div>
    </div>
    
<!--    VENUE BOOKINGS-->
    <div class="row justify-content-between border-bottom">
        <div class="col-sm-12 col-md-3 clo-lg-2 font-weight-bold text-uppercase">Venue Bookings:</div>
        <div class="col-sm-12 col-md-9 col-lg-8 text-secondary">
            <form method="post">
                
                <?php 
                require_once '../cms/inc/add_venue_booking.inc.php'?>
                
                <div class="row justify-content-between py-3">
                     <div class="col-7 input-group date">
                        <input type="text" name="date1" class="form-control datepicker" id="weddingDate" placeholder="DD/MM/YYYY" autocomplete="off" />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                            </div>
                        </div>
                    <div class="mt-auto col-4 align-bottom">
                        <button type="submit" name="booking" class="btn btn-info text-white">Add Venue booking</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
<!--    VENUE PACKAGE SECTION-->
    <div class="row justify-content-between border-bottom" id="packages">
        <div class="col-sm-12 col-md-3 clo-lg-2 font-weight-bold text-uppercase">Packages:</div>
        <div class="col-sm-12 col-md-9 col-lg-8 text-secondary">
            <?php 
            $packages = DB::getInstance()->get('cms_venue_packages', array('venue_ref', '=', $venue_ref));
            $index = 0;
            if(!$packages->count()){
                echo '
                <div class="row ">
                    <div class="col-9 text-danger">No package find</div>
                </div>';
            } else {
                
                
                foreach($packages->results() as $package){
                    $index++;
                    if($package->disabled == 0){
                        $disabled = 'Live';
                        $visible = 'text-success';
                        $the_link = 'disable';
                    } else {
                        $disabled = 'Disable';
                        $visible = 'text-danger';
                        $the_link = 'enable';
                    }
                    echo '
                    <div class="row align-items-center justify-content_between">
                        <div class="col-1 "><span class="align-self-center">'.$index.')</span></div>
                        <div class="col-8">
                            <a class="align-self-center" href="package-info-page.php?id='. $package->id .'">' . $package->venue_package . ' ('.date('Y', strtotime($package->available_from)) .')</a>
                        </div>
                        <div class="col-1 mr-3">
                            <button class = "btn"><a class="' .$visible. '" href="'.$the_link.'_package.php?package='.$package->id.'">'.$disabled.'</a></button>
                        </div>
                        <div class="col-1">
                            <button class="btn "><a href="delete_package.php?package=' .$package->id. '">Delete</a></button>
                        </div>
                    </div>';
                }
            }
            ?>
        </div>
    </div>
    <div class="row justify-content-between mt-3">
        <a href="edit-venue-info.php?id=<?php echo $venue_id; ?>" class="btn btn-info m-auto text-white">Edit venue info</a>
        <a href="add-new-package.php?id=<?php echo $venue_ref; ?>" class="btn btn-info m-auto text-white">Add New package</a>
        <a href="add-venue-facilities.php?id=<?php echo $venue_ref; ?>" class="btn btn-info m-auto text-white">Add Venue Facilities</a>
        <a href="../admin" class="btn btn-info m-auto text-white">Go to venues list</a>
    </div>
</div>
<?php

require_once '../cms/overall/footer.php';
?>
<script type="text/javascript">
var disableDates = [<?php echo $bookedDates; ?>];
$('.input-group.date').datepicker({
    format: "dd/mm/yyyy",
    maxViewMode: 2,
    autoclose: true,
    beforeShow: function(event, ui) { 
        setTimeout(function() {
            document.getElementsByClassName("datepicker-days").innerHTML = 'This is my legend';
        }, 150);
    },
    beforeShowDay: function(date){
        dmy = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();
        if(disableDates.indexOf(dmy) != -1){
            return false;
        } else {
            return true;
        }
    }
});
</script>