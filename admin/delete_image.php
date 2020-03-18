<?php

$page='delete_image';
require_once '../cms/overall/header.php';
if(!isset($_GET['id'])){
    Redirect::to('index.php');
} else {
    $image_id = $_GET['id'];
    
    $img_info = DB::getInstance()->get('cms_venue_images',array('id', '=', $image_id));
    $venue_ref = $img_info->first()->venue_ref;
    
    DB::getInstance()->delete('cms_venue_images', array('id', '=', $image_id));
}

    $venue_info = DB::getInstance()->get('cms_venue_details', array('venue_ref', '=', $venue_ref));
    $venue_id = $venue_info->first()->id;
    
    Redirect::to('venue-info-page.php?id='.$venue_id);

require_once '../cms/overall/footer.php';

?>