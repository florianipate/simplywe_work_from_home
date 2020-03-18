<?php 
$page='delete_capacity';
chdir('../../admin');
require_once '../cms/overall/header.php';
if(!isset($_GET['id'])){
    Redirect::to('index.php');
} else {
    $facility_id = $_GET['id'];
    $venue_info = DB::getInstance()->get('cms_venue_facilities', array('id', '=', $facility_id));
    $venue_ref = $venue_info->first()->venue_ref;
    DB::getInstance()->delete('cms_venue_facilities', array('id', '=', $facility_id));
}
    Redirect::to('../../admin/add-venue-facilities.php?id='.$venue_ref); 
    require_once '../cms/overall/footer.php';

?>