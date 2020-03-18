<?php
$page='venue-list';
require_once '../cms/overall/header.php';
$user = new User ;
if(!$user->isLoggedIn()){
    Redirect::to('../login');
} else{
$user_name = $user->data()->f_name;
// EXTENDS TYPE OF USER
    
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
if( Session::exists('venue_id')&&
    Session::exists('venue_ref')&&
    Session::exists('venue_name')&&
    Session::exists('venue_email')&&
    Session::exists('address_line_1')&&
    Session::exists('address_line_2')&&
    Session::exists('address_line_3')&&
    Session::exists('town_city')&&
    Session::exists('county')&&
    Session::exists('postcode')&&
    Session::exists('venue_max_daytime')&&
    Session::exists('venue_max_evening')&&
    Session::exists('venue_description')&&
    Session::exists('quote_price_visibility')){
     
        $venue_id               = Session::get('venue_id');
        $venue_ref              = Session::get('venue_ref');
        $venue_name             = Session::get('venue_name');
        $venue_email            = Session::get('venue_email');
        $address_line_1         = Session::get('address_line_1');
        $address_line_2         = Session::get('address_line_2');
        $address_line_3         = Session::get('address_line_3');
        $town_city              = Session::get('town_city');
        $county                 = Session::get('county');
        $postcode               = Session::get('postcode');
        $max_daytime               = Session::get('venue_max_daytime');
        $max_evening               = Session::get('venue_max_evening');
        $description            = Session::get('venue_description');
        $quote_price_visibility = Session::get('quote_price_visibility');
        
        if($venue_id !== ''){
        DB::getInstance()->update('cms_venue_details', $venue_id, array(
            'venue_name'        => $venue_name,
            'address_line_1'    => $address_line_1,
            'address_line_2'    => $address_line_2,
            'address_line_3'    => $address_line_3,
            'town_city'         => $town_city,
            'county'            => $county,
            'postcode'          => $postcode,
            'venue_description' => $description,
            'preview'           =>$quote_price_visibility
        ));
        Session::put('update_venue_info', 'You have succesfully updated the venue details');
        }else{
        DB::getInstance()->insert('cms_venue_details', array(
            'venue_ref'                 => $venue_ref,
            'venue_name'                => $venue_name,
            'venue_email'               => $venue_email,
            'address_line_1'            => $address_line_1,
            'address_line_2'            => $address_line_2,
            'address_line_3'            => $address_line_3,
            'town_city'                 => $town_city,
            'county'                    => $county,
            'postcode'                  => $postcode,
            'max_daytime'               => $max_daytime,
            'max_evening'               => $max_evening,
            'venue_description'         => $description,
            'preview'                   => $quote_price_visibility,
            'deleted'                   => 0,
            'disabled'                  => 1,
            'date_added'                => date('Y-m-d H:i:s')
        ));
        Session::put('added_venue', 'You have succesfully added a new venue');
    }
//    Session::flash('venue_ref');
    Session::flash('venue_id');
    Session::flash('venue_name');
    Session::flash('venue_email');
    Session::flash('address_line_1');
    Session::flash('address_line_2');
    Session::flash('address_line_3');
    Session::flash('town_city');
    Session::flash('county');
    Session::flash('postcode');
    Session::flash('venue_max_daytime');
    Session::flash('venue_max_evening');
    Session::flash('venue_description');
    Session::flash('quote_price_visibility');
}

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
                            <span class="badge badge-primary badge-pill"><?php echo $x; ?></span>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <a href="add-new-venue.php">Add new Venue</a>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <a href="add-new-package.php">Add new Package</a>
                        </li>
                        <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <a href="deleted-venues.php">Deleted Venues</a>
                            <span class="badge badge-danger badge-pill"><?php echo $y; ?></span>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <a href="../login/changepassword.php?id=<?php echo $user->data()->id; ?>">Settings</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-8 col-lg-9 p-sm-0">
            <?php require_once '../cms/venue/venues-list.php';?>
        </div>
    </div>
</div>
<?php 
}
require '../cms/overall/footer.php';
?>

