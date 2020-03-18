<div class="list-group">
    <div class="list-group-item list-group-item-dark">
        <span>Use the form below to add a new venue</span>
    </div>
    <div class="list-group-item p-0">
        <form action="" method="post">
            
            <div class="form-group col-xs-12 col-sm-8 col-md-8 col-lg-6 pt-3">
                <?php require_once '../cms/inc/add-new-venue.inc.php'?>
            </div>
                
<!--            VENUE NAME FIELD-->
            <div class="form-group col-xs-12 col-sm-8 col-md-8 col-lg-6 pt-3">
                <label for="venue_name">Venue Name</label><span class="required">*</span>
                <input type="text" class="form-control" name="venue_name" id="venue_name" aria-describedBy="venue_nameHelp" value="<?php echo Input::get('venue_name')?>" />
                <small id="venue_nameHelp" class="form-text text-muted">Enter the venue name.</small>
            </div>
            
<!--            FIRST LINE OF ADDRESS-->
            <div class="form-group col-xs-12 col-sm-8 col-md-8 col-lg-6">
                <label for="address_line_1">Address line one</label><span class="required">*</span>
                <input type="text" class="form-control" name="address_line_1" id="address_line_1" aria-describedBy="address_line_1Help" value="<?php echo Input::get('address_line_1')?>" />
                <small id="address_line_1Help" class="form-text text-muted">Enter the first line of the address.</small>
            </div>
            
<!--            SECOND LINE OF ADDRESS-->
            <div class="form-group col-xs-12 col-sm-8 col-md-8 col-lg-6">
                <label for="address_line_2">Address line two</label><span class="text-muted"> (Optional)</span>
                <input type="text" class="form-control" name="address_line_2" id="address_line_2" aria-describedBy="address_line_2Help" value="<?php echo Input::get('address_line_2')?>" />
                <small id="address_line_2Help" class="form-text text-muted">Enter the second line of the address.</small>
            </div>
            
<!--            THIRD LINE OF ADDRESS-->
            <div class="form-group col-xs-12 col-sm-8 col-md-8 col-lg-6">
                <label for="address_line_3">Address line three</label><span class="text-muted"> (Optional)</span>
                <input type="text" class="form-control" name="address_line_3" id="address_line_3" aria-describedBy="address_line_3Help" value="<?php echo Input::get('address_line_3')?>" />
                <small id="address_line_3Help" class="form-text text-muted">Enter the third line of the address.</small>
            </div>
            
<!--            TOWN OR CITY FIELD-->
             <div class="form-group col-xs-12 col-sm-8 col-md-8 col-lg-6">
                <label for="town_city">Town City</label><span class="required">*</span>
                <input type="text" class="form-control" name="town_city" id="town_city" aria-describedBy="town_cityHelp" value="<?php echo Input::get('town_city')?>" />
                <small id="town_cityHelp" class="form-text text-muted">Enter the town or city.</small>
            </div>
            
<!--            COUNTY FIELD-->
            <div class="form-group col-xs-12 col-sm-8 col-md-8 col-lg-6">
                <label for="county">County</label><span class="required">*</span>
                <input type="text" class="form-control" name="county" id="county" aria-describedBy="countyHelp" value="<?php echo Input::get('county')?>" />
                <small id="countyHelp" class="form-text text-muted">Enter the second line of the address.</small>
            </div>
            
<!--            POSTCODE FIELD-->
            <div class="form-group col-xs-12 col-sm-8 col-md-8 col-lg-6">
                <label for="postcode">Postcode</label><span class="required">*</span>
                <input type="text" class="form-control w-50" name="postcode" id="postcode" aria-describedBy="postcode" value="<?php echo Input::get('postcode')?>" />
                <small id="postcode" class="form-text text-muted">Enter the postcode.</small>
            </div>
            
<!--            VENUE BUSINESS EMAIL-->
            <div class="form-group col-xs-12 col-sm-8 col-md-8 col-lg-6">
                <label for="venue_email">Email</label><span class="required">*</span>
                <input type="text" class="form-control" name="venue_email" id="venue_email" aria-describedBy="venue_emailHelp" value="<?php echo Input::get('venue_email')?>" />
                <small id="venue_emailHelp" class="form-text text-muted">Enter Email Address.</small>
            </div>
            
            
<!--            VENUE CAPACITY-->
            <div class="form-group col-12">
                <label>Venue Capacity</label><span class="required">*</span>
                <div class="col d-flex">
                    <div class="form-group col-3">
                        <label for="venue_max_daytime">Max Daytime</label>
                        <input type="text" class="form-control" name="venue_max_daytime" id="venue_max_daytime" aria-describedBy="venue_max_daytimeHelp" value="<?php echo Input::get('venue_max_daytime')?>" />
                        <small id="venue_max_daytimeHelp" class="form-text text-muted">Enter Email Address.</small>
                    </div>
                    <div class="form-group col-3">
                        <label for="venue_max_evening">Max Evening</label>
                        <input type="text" class="form-control" name="venue_max_evening" id="venue_max_evening" aria-describedBy="venue_max_eveningHelp" value="<?php echo Input::get('venue_max_evening')?>" />
                        <small id="venue_max_eveningHelp" class="form-text text-muted">Enter Email Address.</small>
                    </div>

                </div>
            </div>
            
<!--            VENUE DESCRIPTION-->
            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-10">
                <label for="venue_description">Venue Description</label><span class="required">*</span>
                <textarea class="form-control" name="venue_description" id="venue_description" aria-describedBy="venue_descriptionHelp" rows="6"><?php echo Input::get('venue_description');?></textarea>
                <small id="venue_descriptionHelp" class="form-text text-muted">Enter the venue description.</small>
            </div>
            
<!--            SHOW QOUTE PRICE-->
            <div class="form-group col-xs-12 col-sm-8 col-md-8 col-lg-6">
                
                <input type="checkbox" name="quote_price_visibility" id="quote_price_visibility" checked = "checked"/> 
                <label for="quote_price_visibility"> Display Qoute price</label>
                <small id="quote_price_visibility" class="form-text text-muted">Uncheck if you dont want to display the quote price to customers.</small>
            </div>
            
            <div class="form-groupcol-xs-8 col-md-12 col-lg-10 pb-3">
            <button type="submit" class="btn btn-info m-auto text-white">Preview</button>
            </div>
        </form>
    </div>
</div>

