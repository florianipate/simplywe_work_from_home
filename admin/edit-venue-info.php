<?php
$page='edit_venu';
require_once '../cms/overall/header.php';
if(!isset($_GET['id'])){
    $venue_id = 1;
} else{
    $venue_id = $_GET['id'];
}
$venues = DB::getInstance()->get('cms_venue_details', array('id', '>', 0));
if($venues->count()){
    $x =0;
    foreach($venues->results() as $venue){
        $x++;
    }
}
$venue_info = DB::getInstance()->get('cms_venue_details', array('id', '=', $venue_id ));
$venue_ref = $venue_info->first()->venue_ref;
$quote_price_visibility = $venue_info->first()->preview;
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
            <?php require_once '../cms/venue/edit-venue-form.php';?>
            <script>
                $('#venue-description').jqte();
            </script>
        </div>
    </div>
</div
<?php
require_once '../cms/overall/footer.php';
?>