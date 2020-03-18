<?php

$page='delete_venue_permanently';
require_once '../cms/overall/header.php';
if(!isset($_GET['id'])){
    Redirect::to('index.php');
} else {
    $venue_id = $_GET['id'];
    DB::getInstance()->delete('cms_venue_details', array('id', '=', $venue_id));
}
    Redirect::to('deleted-venues.php');  
?>
<?php
require_once '../cms/overall/footer.php';

?>