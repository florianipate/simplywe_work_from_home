<?php
$page='enable_venue';
require_once '../cms/overall/header.php';
if(!isset($_GET['id'])){
    Redirect::to('index.php');
} else {
    $venue_id = $_GET['id'];
    DB::getInstance()->update('cms_venue_details', $venue_id, array(
        'disabled'  => 0
    
    ));
}
    Redirect::to('index.php');  
?>
<?php
require_once '../cms/overall/footer.php';
?>