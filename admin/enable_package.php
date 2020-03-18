<?php
$page='disable_package';
require_once '../cms/overall/header.php';
if(!isset($_GET['package'])){
    Redirect::to('index.php');
} else {
    $package_id = $_GET['package'];
    DB::getInstance()->update('cms_venue_packages', $package_id, array(
        'disabled'  => 0
    ));
}
$package_info = DB::getInstance()->get('cms_venue_packages', array('id', '=', $package_id));
$venue_ref = $package_info->first()->venue_ref;
$venue_info = DB::getInstance()->get('cms_venue_details', array('venue_ref', '=', $venue_ref));
$venue_id = $venue_info->first()->id;
    Redirect::to('venue-info-page.php?id='.$venue_id.'#packages');  
?>
<?php
require_once '../cms/overall/footer.php';
?>