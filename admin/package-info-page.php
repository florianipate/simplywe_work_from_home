<?php 
$page='package-info';
require_once '../cms/overall/header.php';
if(!isset($_GET['id'])){
    $package_id = 1;
} else {
    $package_id = $_GET['id'];
}

//GET THE PACKAGE DETAILS
$package_info = DB::getInstance()->get('cms_venue_packages', array('id', '=', $package_id ));
$venue_ref          = $package_info->first()->venue_ref;
$package_title      = $package_info->first()->venue_package;
$package_subtitle   = $package_info->first()->venue_package_subtitle;
$package_price      = $package_info->first()->venue_package_price;
$daytime_min_guests = $package_info->first()->venue_min_daytime;
$daytime_max_guests = $package_info->first()->venue_max_daytime;
$evening_min_guests = $package_info->first()->venue_min_evening;
$evening_max_guests = $package_info->first()->venue_max_evening;
$available_from     = $package_info->first()->available_from;
$available_from_date = date('d-m-Y', strtotime($available_from));
$available_to = $package_info->first()->available_to;
$available_to_date = date('d-m-Y', strtotime($available_to));
$dj_included = $package_info->first()->dj_included;
$dj_price = $package_info->first()->dj_price;

$mo_percent = $package_info->first()->mo_percent;
$tu_percent = $package_info->first()->tu_percent;
$we_percent = $package_info->first()->we_percent;
$th_percent = $package_info->first()->th_percent;
$fr_percent = $package_info->first()->fr_percent;
$sa_percent = $package_info->first()->sa_percent;
$su_percent = $package_info->first()->su_percent;

$mo_variation = $package_price * $mo_percent /100;
$tu_variation = $package_price * $tu_percent /100;
$we_variation = $package_price * $we_percent /100;
$th_variation = $package_price * $th_percent /100;
$fr_variation = $package_price * $fr_percent /100;
$sa_variation = $package_price * $sa_percent /100;
$su_variation = $package_price * $su_percent /100;

$mo_price = $package_price + $mo_variation;
$tu_price = $package_price + $tu_variation;
$we_price = $package_price + $we_variation;
$th_price = $package_price + $th_variation;
$fr_price = $package_price + $fr_variation;
$sa_price = $package_price + $sa_variation;
$su_price = $package_price + $su_variation;

$mo =$package_info->first()->mo;
$tu = $package_info->first()->tu;
$we = $package_info->first()->we;
$th = $package_info->first()->th;
$fr = $package_info->first()->fr;
$sa = $package_info->first()->sa;
$su = $package_info->first()->su;

$mo_visible = ($mo != 1)? 'isvisible' : '';
$tu_visible = ($tu != 1)? 'isvisible' : '';
$we_visible = ($we != 1)? 'isvisible' : '';
$th_visible = ($th != 1)? 'isvisible' : '';
$fr_visible = ($fr != 1)? 'isvisible' : '';
$sa_visible = ($sa != 1)? 'isvisible' : '';
$su_visible = ($su != 1)? 'isvisible' : '';

$mo_br = ($mo != 1)? '' : '<br>';
$tu_br = ($tu != 1)? '' : '<br>';
$we_br = ($we != 1)? '' : '<br>';
$th_br = ($th != 1)? '' : '<br>';
$fr_br = ($fr != 1)? '' : '<br>';
$sa_br = ($sa != 1)? '' : '<br>';
$su_br = ($su != 1)? '' : '<br>';

//GET THE VENUE DETAILS
$venue_info = DB::getInstance()->get('cms_venue_details', array('venue_ref', '=',  $venue_ref));
$venue_name = $venue_info->first()->venue_name;
$venue_id = $venue_info->first()->id;
if($dj_included == 0){
    $dj_included = 'DJ is included in the packege price';
} else {
    $dj_included = '£'.$dj_price; 
}
?>
<div class="container">
    <div class="row border-bottom">
        <div class="col-12">
            <h1><?php echo $venue_name; ?></h1>
        </div>
    </div>
    
    <div class="row justify-content-between border-bottom pt-4 pb-4">
        <div class="col-sm-12 col-md-9 clo-lg-10">
            <h4><?php echo $package_title ?></h4>
            <h6 class="text-muted"><?php echo $package_subtitle?></h6>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-2 text-danger">
            <h4><?php echo '£'. $package_price ; ?></h4>
        </div>
    </div>

    <!-- DISPLAY THE UPDATE SUCCESS MESSAGE -->
    <?php if(Session::exists('update_package_info')){ 
        echo 
    '<div class="row border-bottom py-2">
        <div class="col-6 cms-bg-success m-auto"><h4 class="text-success">'.Session::flash('update_package_info').'</h4></div>
    </div>';
     } ?>
    <!-- ======================================== -->

    <div class="row justify-content-between border-bottom pt-2 pb-2">
        <div class="col-sm-12 col-md-6 clo-lg-6 font-weight-bold text-capitalize">Available </div>
        <div class="col-sm-12 col-md-3 col-lg-2 text-secondary">
            <strong>Form:</strong> <?php echo $available_from_date;?>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-2 text-secondary">
            <strong>To</strong>: <?php echo $available_to_date; ?>
        </div>
    </div>
    <div class="row justify-content-between border-bottom pt-2 pb-2">
        <div class="col-sm-12 col-md-9 clo-lg-10 font-weight-bold text-capitalize">Week Days package price variation </div>
        <div class="col-sm-12 col-md-3 col-lg-2 text-secondary">
            <div class="row">
            <div class="col-3 <?php echo $mo_visible?>">Mo:</div>
            <div class="col-8 text-danger <?php echo $mo_visible?>">£<?php echo $mo_price; ?></div>
            </div>
                
            <div class="row">
            <div class="col-3 <?php echo $tu_visible?>">Tu:</div>
            <div class="col-8 text-danger <?php echo $tu_visible?>">£<?php echo $tu_price; ?></div>
            </div>
                
            <div class="row">
            <div class="col-3 <?php echo $we_visible?>">We:</div> 
            <div class="col-8 text-danger <?php echo $we_visible?>">£<?php echo $we_price; ?></div>
            </div>
            
            <div class="row">
            <div class="col-3 <?php echo $th_visible?>">Th:</div>
            <div class="col-8 text-danger <?php echo $th_visible?>">£<?php echo $th_price; ?></div>
            </div>
                
            <div class="row">
            <div class="col-3 <?php echo $fr_visible?>">Fr:</div>
            <div class="col-8 text-danger <?php echo $fr_visible?>">£<?php echo $fr_price; ?></div>
            </div>
            <div class="row">
            <div class="col-3 <?php echo $sa_visible?>">Sa:</div>
            <div class="col-8 text-danger <?php echo $sa_visible?>">£<?php echo $sa_price; ?></div>
            </div>
            <div class="row">
            <div class="col-3 <?php echo $su_visible?>">Su:</div>
            <div class="col-8 text-danger <?php echo $su_visible?>">£<?php echo $su_price; ?></div>
            </div>
        </div>
    </div>
    
    
    <div class="row justify-content-between border-bottom pt-2 pb-2">
        <div class="col-sm-12 col-md-9 clo-lg-10 font-weight-bold text-capitalize"><span>Daytime Guests:</span></div>
        <div class="col-sm-12 col-md-3 col-lg-2 text-secondary">
            <span>Min: </span><?php echo $daytime_min_guests; ?><br>
            <span>Max: </span><?php echo $daytime_max_guests; ?>
        </div>
    </div>
    
    <div class="row justify-content-between border-bottom pt-2 pb-2">
        <div class="col-sm-12 col-md-9 clo-lg-10 font-weight-bold text-capitalize">Evening Max Guests:</div>
        <div class="col-sm-12 col-md-3 col-lg-2 text-secondary">
            <span>Min: </span><?php echo $evening_min_guests; ?><br>
            <span>Max: </span><?php echo $evening_max_guests; ?>


        </div>
    </div>
    
    <div class="row justify-content-between border-bottom pt-2 pb-2">
        <div class="col-sm-12 col-md-9 clo-lg-10 font-weight-bold text-capitalize">DJ:</div>
        <div class="col-sm-12 col-md-3 col-lg-2 text-secondary">
           <span><?php echo $dj_included; ?></span>
        </div>
    </div>
    <div class="row justify-content-between mt-3">
        <a href="venue-info-page.php?id=<?php  echo $venue_id;?>" class="btn btn-info m-auto text-white">Go To Venue Info</a>
        <a href="additional-package-details.php?id=<?php  echo $package_id;?>" class="btn btn-info m-auto text-white">Additional package details</a>
        <a href="edit-package.php?id=<?php echo $package_id; ?>" class="btn btn-info m-auto text-white">Edit Package Details</a>
        <a href="duplicate_package.php?id=<?php echo $package_id; ?>" class="btn btn-info m-auto text-white">Duplicate package</a>
    </div>
</div>
<?php
require_once '../cms/overall/footer.php';
?>