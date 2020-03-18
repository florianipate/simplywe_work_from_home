<?php require_once '../cms/overall/header.php';
$results = DB::getInstance()->get('demo_venue_details', array('id', '=', 1));
?>
<h2>Add New Venue</h2>
<form method="post">
    <div class="field">
        <label for="venue_name">Venue Name</label><br>
        <input type="text" name="veue_name" id="venue_name" autocomplete="off" value="<?php echo $results->first()->venue_name?>" placeholder="Enter venue name" />
    </div>
    <div>
        <label for="venue_email">Emai</label><br>
        <input type="text" name="venue_email" id="venue_email" autocomplete="off" value="<?php echo $results->first()->venue_email?>" placeholder="Enter Email" />
    </div>
    <div>
        <label for="address_line_1">Address Line One</label><br>
        <input type="text" name="address_line_1" id="address_line_1" autocomplete="off" value="<?php echo $results->first()->address_line_1?>" placeholder="Address Line One" />
    </div>
    <div>
        <label for="address_line_2">Address Line Two</label><br>
        <input type="text" name="address_line_2" id="address_line_2" autocomplete="off" value="<?php echo $results->first()->address_line_2?>" placeholder="Address Line Two" />
    </div>
    <div>
        <label for="address_line_3">Address Line Three</label><br>
        <input type="text" name="address_line_3" id="address_line_3" autocomplete="off" value="<?php echo $results->first()->address_line_3?>" placeholder="Address Line Three" />
    </div>
    <div>
        <label for="town_city">Town/City</label><br>
        <input type="text" name="town_city" id="town_city" autocomplete="off" value="<?php echo $results->first()->town_city?>" placeholder="Town/City" />
    </div>
    <div>
        <label for="county">County</label><br>
        <input type="text" name="county" id="county" autocomplete="off" value="<?php echo $results->first()->county?>" placeholder="County" />
    </div>
    <div>
        <label for="postcode">Postcode</label><br>
        <input type="text" name="postcode" id="postcode" autocomplete="off" value="<?php echo $results->first()->postcode?>" placeholder="Postcode" />
    </div>
    <div>
        <label for="venue_description">Description</label><br>
        <textarea rows="4" cols="50" name="venue_description" id="venue_description" autocomplete="off" value="<?php echo $results->first()->venue_description?>" placeholder="Enter Venue Description(max 500)"><?php echo $results->first()->venue_description?></textarea>
    </div>
     <button class="btn" type="submit">Add New Venu</button>
    
</form>