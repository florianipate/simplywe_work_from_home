<?php
$page='edit_package';
require_once '../cms/overall/header.php';
if(!isset($_GET['id'])){
    $package_id = 1;
} else{
    $package_id = $_GET['id'];
}

$package_info = DB::getInstance()->get('cms_venue_packages', array('id', '=', $package_id ));

$venue_ref                  = $package_info->first()->venue_ref;
$package_title              = $package_info->first()->venue_package;
$package_subtitle_line_1    = $package_info->first()->venue_package_subtitle_line_1;
$package_subtitle_line_2    = $package_info->first()->venue_package_subtitle_line_2;
$package_price              = $package_info->first()->venue_package_price;
$daytime_extra_guests_price = $package_info->first()->daytime_extra_guest_price;
$evening_extra_guests_price = $package_info->first()->evening_extra_guest_price;
$available_from             = $package_info->first()->available_from;
$available_to               = $package_info->first()->available_to;
$venue_min_daytime          = $package_info->first()->venue_min_daytime;
$venue_max_daytime          = $package_info->first()->venue_max_daytime;
$venue_min_evening          = $package_info->first()->venue_min_evening;
$venue_max_evening          = $package_info->first()->venue_max_evening;
$dj_included                = $package_info->first()->dj_included;
$dj_price                   = $package_info->first()->dj_price;

$mo_percent = $package_info->first()->mo_percent;
$tu_percent = $package_info->first()->tu_percent;
$we_percent = $package_info->first()->we_percent;
$th_percent = $package_info->first()->th_percent;
$fr_percent = $package_info->first()->fr_percent;
$sa_percent = $package_info->first()->sa_percent;
$su_percent = $package_info->first()->su_percent;

$mo = $package_info->first()->mo;
$tu = $package_info->first()->tu;
$we = $package_info->first()->we;
$th = $package_info->first()->th;
$fr = $package_info->first()->fr;
$sa = $package_info->first()->sa;
$su = $package_info->first()->su;

$mo_ischecked = ($mo == 1)?'checked' : '';
$tu_ischecked = ($tu == 1)?'checked' : '';
$we_ischecked = ($we == 1)?'checked' : '';
$th_ischecked = ($th == 1)?'checked' : '';
$fr_ischecked = ($fr == 1)?'checked' : '';
$sa_ischecked = ($sa == 1)?'checked' : '';
$su_ischecked = ($su == 1)?'checked' : '';

$venues = DB::getInstance()->get('cms_venue_details', array('id', '>', 0));
if($venues->count()){
    $x =0;
    foreach($venues->results() as $venue){
        $x++;
    }
}

$checked_no = ($dj_included === 1)? 'true' : 'false';
$visibility = ($dj_included === true)? 'hidden' : 'visible';
?>

<div class="container ">
    <div class="col-12">
        <h1 class="text-center">Admin Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-sm-12 col-xs-12 col-md-4 col-lg-3">
            <div class="row pr-md-1">
                <div class="col-12 p-sm-0">
                    <ul class="list-group" >
                        <li class="list-group-item list-group-item-dark">Menu</li>
                        <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <a href="../admin">All Venue list</a>
                            <span class="badge badge-primary badge-pill"><?php echo $x;?></span>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <a href="add-new-venue.php">Add new Venue</a>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <a href="">Settings</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-8 col-lg-9 p-sm-0">
            <?php require_once '../cms/packages/edit-package-form.php';?>
        </div>
    </div>
</div


<?php
    require_once '../cms/overall/footer.php';
?>