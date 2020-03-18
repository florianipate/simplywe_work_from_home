<div class="list-group">
    <div class="list-group-item list-group-item-dark mb-3">
        <span>Use the form below to change <?php echo $venue_info->first()->venue_name;?> Venue Details</span>
    </div>
    <div class="list-group-item p-0">
        <form action="" method="post" class="">
            <div class="form-group col-xs-12 col-sm-8 col-md-8 col-lg-6">
                <?php require_once '../cms/inc/edit-venue-info.inc.php'?>
            </div>
            
<!--            VENUE NAME-->
            
            <div class="form-group col-xs-12 col-sm-8 col-md-8 col-lg-6">
                <label for="venue_name">Venue Name</label><span class="required">*</span>
                <input type="text" class="form-control" name="venue_name" id="venue_name" aria-describedBy="venue_nameHelp" value="<?php 
                    if(Session::exists('venue_name')){
                        echo Session::get('venue_name');
                    } else{
                        echo $venue_info->first()->venue_name;
                    }
                ?>" />
                <small id="venue_nameHelp" class="form-text text-muted">Enter the venue name.</small>
            </div>
            
<!--            ADDRESS LINE ONE-->
            
            <div class="form-group col-xs-12 col-sm-8 col-md-8 col-lg-6">
                <label for="address_1">Address line one</label><span class="required">*</span>
                <input type="text" class="form-control" name="address_line_1" id="address_1" aria-describedBy="address_1Help" value="<?php 
                     if(Session::exists('address_line_1')){
                         echo Session::get('address_line_1');
                     } else{
                         echo $venue_info->first()->address_line_1;
                     }
                ?>" />
                <small id="address_1Help" class="form-text text-muted">Enter the first line of the address.</small>
            </div>
            
<!--            ADDRESS LINE TWO-->
            
            <div class="form-group col-xs-12 col-sm-8 col-md-8 col-lg-6">
                <label for="address_2">Address line two</label><span class="required">*</span>
                <input type="text" class="form-control" name="address_line_2" id="address_2" aria-describedBy="address_2Help" value="<?php 
                     if(Session::exists('address_line_2')){
                         echo Session::get('address_line_2');
                     } else{
                         echo $venue_info->first()->address_line_2;
                     }
                ?>" />
                <small id="address_2Help" class="form-text text-muted">Enter the second line of the address.</small>
            </div>
            
<!--            ADDRESS LINE THREE-->
            
            <div class="form-group col-xs-12 col-sm-8 col-md-8 col-lg-6">
                <label for="address_3">Address line three</label><span class="text-muted"> (Optional)</span>
                <input type="text" class="form-control" name="address_line_3" id="address_3" aria-describedBy="address_3Help" value="<?php 
                    if(Session::exists('address_line_3')){
                         echo Session::get('address_line_3');
                     } else{
                         echo $venue_info->first()->address_line_3;
                     }
                 ?>" />
                <small id="address_3Help" class="form-text text-muted">Enter the third line of the address.</small>
            </div>
            
<!--            TOWN/CITY-->
            
            <div class="form-group col-xs-12 col-sm-8 col-md-8 col-lg-6">
                <label for="town_city">Town/City</label><span class="required">*</span>
                <input type="text" class="form-control" name="town_city" id="town_city" aria-describedBy="town_cityHelp" value="<?php 
                    if(Session::exists('town_city')){
                         echo Session::get('town_city');
                     } else{
                         echo $venue_info->first()->town_city;
                     }
                ?>" />
                <small id="town-cityHelp" class="form-text text-muted">Enter the Town or City.</small>
            </div>
            
<!--            ADDRESS COUNTY-->
            
            <div class="form-group col-xs-12 col-sm-8 col-md-8 col-lg-6">
                <label for="county">County</label><span class="required">*</span>
                <input type="text" class="form-control" name="county" id="county" aria-describedBy="countyHelp" value="<?php
                    if(Session::exists('county')){
                         echo Session::get('county');
                     } else{
                         echo $venue_info->first()->county;
                     }
                ?>" />
                <small id="countyHelp" class="form-text text-muted">Enter County.</small>
            </div>
            
<!--            VENUE POSTCODE-->
            
            <div class="form-group col-xs-12 col-sm-8 col-md-8 col-lg-6">
                <label for="postcode">Postcode</label><span class="required">*</span>
                <input type="text" class="form-control w-50" name="postcode" id="postcode" aria-describedBy="postcode" value="<?php 
                    if(Session::exists('postcode')){
                         echo Session::get('postcode');
                     } else{
                         echo $venue_info->first()->postcode;
                     }
                ?>" />
                <small id="postcode" class="form-text text-muted">Enter the third line of the address.</small>
            </div>
            
<!--            VENUE EMAIL-->
            
            <div class="form-grou pcol-xs-12 col-sm-8 col-md-8 col-lg-6">
                <label for="venue_email">Email</label><span class="required">*</span>
                <input type="text" class="form-control" name="venue_email" id="venue_email" aria-describedBy="venue_emailHelp" value="<?php  
                    if(Session::exists('venue_email')){
                         echo Session::get('venue_email');
                     } else{
                         echo $venue_info->first()->venue_email;
                     }
                ?>" />
                <small id="venue_emailHelp" class="form-text text-muted">Enter Email Address.</small>
            </div>
            
<!--            VENUE CAPACITY-->
            <div class="form-group col-12">
                <label>Venue Capacity</label><span class="required">*</span>
                <div class="col d-flex">
                    <div class="form-group col-3">
                        <label for="venue_max_daytime">Max Daytime</label>
                        <input type="text" class="form-control" name="venue_max_daytime" id="venue_max_daytime" aria-describedBy="venue_max_daytimeHelp" value="<?php 
                                if(Session::exists('venue_max_daytime')){
                                     echo Session::get('venue_max_daytime');
                                 } else{
                                     echo $venue_info->first()->max_daytime;
                                 }
                            ?>" />
                        <small id="venue_max_daytimeHelp" class="form-text text-muted">Enter Email Address.</small>
                    </div>
                    <div class="form-group col-3">
                        <label for="venue_max_evening">Max Evening</label>
                        <input type="text" class="form-control" name="venue_max_evening" id="venue_max_evening" aria-describedBy="venue_max_eveningHelp" value="<?php 
                                if(Session::exists('venue_max_daytime')){
                                     echo Session::get('venue_max_daytime');
                                 } else{
                                     echo $venue_info->first()->max_daytime;
                                 }
                            ?>" />
                        <small id="venue_max_eveningHelp" class="form-text text-muted">Enter Email Address.</small>
                    </div>
                </div>
            </div>
            
<!--            VENUE DESCRIPTION-->
            
            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-10">
                <label for="venue_description">Venue Description</label><span class="required">*</span>
                <textarea class="form-control" name="venue_description" id="venue-description" aria-describedBy="venue_descriptionHelp" rows="6">
                    <?php 
                        if(Session::exists('venue_description')){
                            echo Session::get('venue_description');
                        } else {
                            echo $venue_info->first()->venue_description;
                        }
                    ?>
                </textarea>
                <small id="venue_emailHelp" class="form-text text-muted">Enter venue description.</small>
            </div>
            
<!--            SHOW QOUTE PRICE-->
           <?php
            $quote_price_visibility = ($quote_price_visibility == 1)? 'checked' : '';
            ?>   
            <div class="form-group col-xs-12 col-sm-8 col-md-8 col-lg-6">
                
                <input type="checkbox" name="quote_price_visibility" id="quote_price_visibility" <?php echo $quote_price_visibility; ?>/> 
                <label for="quote_price_visibility"> Display Qoute price</label>
                <small id="quote_price_visibility" class="form-text text-muted">Uncheck if you dont want to display the quote price to customers.</small>
            </div>
            
            <div class="form-groupcol-xs-8 col-md-12 col-lg-10 pb-3">
            <button type="submit" class="btn btn-info m-auto text-white">Preview</button>
            </div>
        </form>
    </div>
</div>

