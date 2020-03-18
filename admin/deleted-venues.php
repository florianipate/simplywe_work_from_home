<?php
$page='venue-list';

//LOADING CONFIG AND THE HEADER FILE
require_once '../cms/overall/header.php';
$venues = DB::getInstance()->get('cms_venue_details', array('id', '>', 0));
if($venues->count()){
    $x = 0;
    $y = 0;
    foreach($venues->results() as $venue){
        $deleted = $venue->deleted;
        if($deleted == 1){
            $y++;
        } else{
            $x++;
        }
    }
}

?>
<div class="container ">
    <div class="col-12">
        <h1 class="text-center">Admin Dashboard</h1>
    </div>
    <div class="row">
<!--        lEFT SIDE MENU-->
        <div class="col-sm-12 col-xs-12 col-md-4 col-lg-3">
            <div class="row pr-md-1">
                <div class="col-12 p-sm-0">
                    <ul class="list-group" >
                        <li class="list-group-item list-group-item-dark">Menu</li>
                        <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <a href="../admin">All Venue list</a>
                            <span class="badge badge-primary badge-pill"><?php echo $x; ?></span>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <a href="add-new-venue.php">Add new Venue</a>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <a href="add-new-package.php">Add new Package</a>
                        </li>
                        <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <a href="../admin">Deleted Venues</a>
                            <span class="badge badge-danger badge-pill"><?php echo $y; ?></span>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <a href="">Settings</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
<!--        RIGHT SIDE PAGE CONTENT-->
        <div class="col-sm-12 col-xs-12 col-md-8 col-lg-9 p-sm-0">
            <?php require_once '../cms/venue/deleted-venues-list.php';?>
        </div>
    </div>
</div>
<?php require '../cms/overall/footer.php';?>