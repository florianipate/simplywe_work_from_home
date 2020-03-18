<?php

$page='delete_video';
require_once '../cms/overall/header.php';
if(!isset($_GET['id'])){
    Redirect::to('index.php');
} else {
    $video_id = $_GET['id'];
    
    $video_info = DB::getInstance()->get('cms_venue_video',array('id', '=', $video_id));
    $venue_ref = $video_info->first()->venue_ref;
    
    DB::getInstance()->delete('cms_venue_video', array('id', '=', $video_id));
}

    $venue_info = DB::getInstance()->get('cms_venue_details', array('venue_ref', '=', $venue_ref));
    $venue_id = $venue_info->first()->id;
    
    Redirect::to('venue-info-page.php?id='.$venue_id.'#videoes');

require_once '../cms/overall/footer.php';

?>