<?php
$page='delete_venue';
require_once '../cms/overall/header.php';
if(!isset($_GET['id'])){
    Redirect::to('index.php');
} else {
    $detail_id = $_GET['id'];
    $detail_info = DB::getInstance()->get('cms_additional_package_details', array('id', '=', $detail_id));
    $package_id = $detail_info->first()->package_id;
    DB::getInstance()->delete('cms_additional_package_details', array('id', '=' , $detail_id));
}
    Redirect::to('additional-package-details.php?id='.$package_id);  
?>
<?php
require_once '../cms/overall/footer.php';
?>