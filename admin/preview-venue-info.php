<?php
    $page='preview';
    require_once '../cms/overall/header.php';

    if(!isset($_GET['id'])){
    $venue_id = '';
    } else{
    $venue_id = $_GET['id'];
    }
if(Session::exists('venue_name')){
    $venue_name = Session::get('venue_name');
} 
if(Session::exists('venue_ref')){
    $venue_ref = Session::get('venue_ref');
} 
if(Session::exists('address_line_1')){
    $address1 = Session::get('address_line_1');
}
if(Session::exists('address_line_2')){
    $address2 = Session::get('address_line_2');
} 
if(Session::exists('address_line_3')){
    $address3 = Session::get('address_line_3');
}
if(Session::exists('town_city')){
    $town_city = Session::get('town_city');
}
if(Session::exists('county')){
 $county = Session::get('county');   
}
if(Session::exists('postcode')){
    $postcode = Session::get('postcode');
}
if(Session::exists('venue_email')){
    $venue_email = Session::get('venue_email');
}
if(Session::exists('venue_description')){
    $description = decode_string(Session::get('venue_description'));
}
     Session::put('venue_id', $venue_id);
?>
<div class="container">
    
<!--    === PREVIEW PAGE HEADING SECTION =========-->
    <div class="row border-bottom">
        <div class="col-10 m-auto cms-bg-yellow">
            <h4 class=text-danger>If all the details below are corect, click Save button</h4>
        </div>

    </div>
<!--    ======= VENUE INFO ========================-->
    <div class="row justify-content-between border-bottom">
        <div class="col-sm-12 col-md-3 clo-lg-2 font-weight-bold text-uppercase">Venue Name:</div>
        <div class="col-sm-12 col-md-9 col-lg-8 text-secondary">
            <?php echo $venue_name;?>
        </div>
    </div>
    <div class="row justify-content-between border-bottom">
        <div class="col-sm-12 col-md-3 clo-lg-2 font-weight-bold text-uppercase">Venue Ref:</div>
        <div class="col-sm-12 col-md-9 col-lg-8 text-secondary">
            <?php echo '<h4>'.$venue_ref.'</h4>';?>
        </div>
    </div>
    <div class="row justify-content-between border-bottom">
        <div class="col-sm-12 col-md-3 clo-lg-2 font-weight-bold text-uppercase">Address:</div>
        <div class="col-sm-12 col-md-9 col-lg-8 text-secondary">
            <?php echo $address1 .'<br>'; 
                if($address2 !==''){ echo  $address2 .'<br>';}
                if($address3 !==''){ echo  $address3 .'<br>';}
                echo  $town_city. '<br>'.
                    $county .'<br>'.
                    $postcode;
            ?>
        </div>
    </div>
    
    <div class="row justify-content-between border-bottom">
        <div class="col-sm-12 col-md-3 clo-lg-2 font-weight-bold text-uppercase">Email:</div>
        <div class="col-sm-12 col-md-9 col-lg-8 text-secondary">
            <?php echo $venue_email; ?>
        </div>
    </div>
    
    
    <div class="row justify-content-between border-bottom">
        <div class="col-sm-12 col-md-3 clo-lg-2 font-weight-bold text-uppercase">Contact No:</div>
        <div class="col-sm-12 col-md-9 col-lg-8 text-secondary">
            <?php // echo $venue_info->first()->contact_no; ?>
            <span>12312345</span>
        </div>
    </div>
    
    <div class="row justify-content-between border-bottom">
        <div class="col-sm-12 col-md-3 clo-lg-2 font-weight-bold text-uppercase">Description:</div>
        <div class="col-sm-12 col-md-9 col-lg-8 text-secondary">
            <?php echo $description; ?>
        </div>
    </div>
    <div class="row justify-content-between mt-3">
        <a href="javascript:history.go(-1)" class="btn btn-info m-auto text-white">Edit Venue Details</a>
        <a href="../admin" class="btn btn-info m-auto text-white">Save Venue Details</a>
    </div>

<?php
    require_once '../cms/overall/footer.php';
?>