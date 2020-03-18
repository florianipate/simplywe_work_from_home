<?php 
$page='request_quote';
require_once '../cms/overall/header.php';
?>

<div class="container">
    <h1>Request Quotation Form</h1>
    <div class="col-6">
        <form action="" method="post">
            <div class="form-group">
                <?php require_once '../cms/inc/request_quote.inc.php'?>
            </div>
            <div class="form-group">
                <label for="f_name">First Name:</label><span class="required">*</span>
                <input type="text" class="form-control" name="f_name" id="venue_ref" aria-describedBy="f_nameHelp" value="<?php Input::get('f_name')?>"> 
                <small id="f_nameHelp" class="form-text text-muted">Enter Firat Name</small>
            </div>
            
            <div class="form-group">
                <label for="l_name">Last Name:</label><span class="required">*</span>
                <input type="text" class="form-control" name="l_name" id="venue_ref" aria-describedBy="l_nameHelp" value="<?php Input::get('l_name')?>"> 
                <small id="l_nameHelp" class="form-text text-muted">Enter Last Name</small>
            </div>
            
            <div class="form-group">
                <label for="user_emai">Email:</label><span class="required">*</span>
                <input type="text" class="form-control" name="user_email" id="venue_ref" aria-describedBy="user_emailHelp" value="<?php Input::get('user_email')?>">
                <small id="user_emailHelp" class="form-text text-muted">Enter your email</small>
            </div>
            
            <div class="form-group">
                <label for="preferred_date">Enter preferred date </label><span class="required">*</span>
                <input type="date" class="form-control" name="preferred_date" id="preferred_date" aria-describedBy="preferred_dateHelp" value="<?php Input::get('preferred_date')?>">
                <small id="preferred_dateHelp" class="form-text text-muted">Enter your preferred date</small>
            </div>
            
            <div class="form-group">
                <label for="daytime_guests">How many guests daytime? </label><span class="required">*</span>
                <input type="text" class="form-control w-50" name="daytime_guests" id="daytime_guests">
                <small id="preferred_dateHelp" class="form-text text-muted">Number of guests are attending daytime</small>
            </div>
            <div class="form-group">
                <label for="evening_guests">How many guests evening? </label><span class="required">*</span>
                <input type="text" class="form-control w-50" name="evening_guests" id="evening_guests">
                <small id="preferred_dateHelp" class="form-text text-muted">Number of guests are attending in the evening</small>
            </div>
            <button type="submit" class="btn btn-info m-auto text-white">Submit</button>
        </form>
    
    
    </div>

</div>

<?php
require_once '../cms/overall/footer.php';
?>