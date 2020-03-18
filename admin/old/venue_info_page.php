<?php require_once '../cms/overall/header.php';
$results = DB::getInstance()->get('demo_venue_details', array('id', '=', 1));
?>
<style>
    .field-inner{
        display: flex;
        width: 350px;
        justify-content:space-between;
        align-items: center;
    }
    .data_text{
        max-width: 50%;
    }
    .inner{
        width: 300px;
        display: flex;
        justify-content:space-between;
    }
    .label{
        font-weight: 600;
        width: 50%;
    }
    .field_data{
        width: 50%;
    }
    .inner-edit{
        cursor: pointer;
        color: #54a2eb;
    }
    .hidden{
        display: none;
    }
    .visiblel{
        display: block;
    }
    
</style>

<div class="field-inner"><h1>Venue info page</h1> <div class="inner_edit"><a href="edit_venue_info.php">Edit</a></div></div>
<div class="field">
    <div class="field-inner">
        <div class="inner">
            <div class="label">Venue Name:</div>
            <div class="field_data">
                <div id="venue_name_label" ><?php echo $results->first()->venue_name;?></div>
                <input type="text" name="venue_name" class="hidden" id="venue_name" placeholder="Enter the new Venue name" >
            </div>
        </div>
    </div>

    <div class="field-inner">
        <div class="inner">
            <div class="label">Venue Email:</div>
            <div class="field_data">
                <div id="venue_name_label" ><?php echo $results->first()->venue_email;?></div>
                <input type="text" name="venue_name" class="hidden" id="venue_name" placeholder="Enter the new Venue name" >
            </div>
        </div>
    </div>

    <div class="field-inner">
        <div class="inner">
            <div class="label">Address Line One:</div>
            <div class="field_data">
                <div id="venue_name_label" ><?php echo $results->first()->address_line_1;?></div>
                <input type="text" name="venue_name" class="hidden" id="venue_name" placeholder="Enter the new Venue name" >
            </div>
        </div>
    </div>

    <div class="field-inner">
        <div class="inner">
            <div class="label">Address Line Two:</div>
            <div class="field_data">
                <div id="venue_name_label" ><?php echo $results->first()->address_line_2;?></div>
                <input type="text" name="venue_name" class="hidden" id="venue_name" placeholder="Enter the new Venue name" >
            </div>
        </div>
    </div>

    <div class="field-inner">
        <div class="inner">
            <div class="label">Address Line Three:</div>
            <div class="field_data">
                <div id="venue_name_label" ><?php echo $results->first()->address_line_3;?></div>
                <input type="text" name="venue_name" class="hidden" id="venue_name" placeholder="Enter the new Venue name" >
            </div>
        </div>
    </div>

    <div class="field-inner">
        <div class="inner">
            <div class="label">Town/City:</div>
            <div class="field_data">
                <div id="venue_name_label" ><?php echo $results->first()->town_city;?></div>
                <input type="text" name="venue_name" class="hidden" id="venue_name" placeholder="Enter the new Venue name" >
            </div>
        </div>
    </div>
    
    <div class="field-inner">
        <div class="inner">
            <div class="label">County:</div>
            <div class="field_data">
                <div id="venue_name_label" ><?php echo $results->first()->county;?></div>
                <input type="text" name="venue_name" class="hidden" id="venue_name" placeholder="Enter the new Venue name" >
            </div>
        </div>
    </div>
    
    <div class="field-inner">
        <div class="inner">
            <div class="label">Postcode:</div>
            <div class="field_data">
                <div id="venue_name_label" ><?php echo $results->first()->postcode;?></div>
                <input type="text" name="venue_name" class="hidden" id="venue_name" placeholder="Enter the new Venue name" >
            </div>
        </div>
    </div>
</div>
<div class="field">
    <div class="label">Description:</div>
    <div class="data_text"><?php echo $results->first()->venue_description;?></div>
</div>



<!--
<style>
    .field-inner{
        display: flex;
        width: 350px;
        justify-content:space-between;
    }
    .inner{
        width: 300px;
        display: flex;
        justify-content:space-between;
    }
    .label{
        font-weight: 600;
    }
    .inner-edit{
        cursor: pointer;
        color: #54a2eb;
    }
    .hidden{
        display: none;
    }
    .visiblel{
        display: block;
    }
    
</style>
<script>
    function venueName(){
        var venue_name = document.getElementById("venue_name");
        var edit = document.getElementById("edit");
          if (venue_name.style.display === "none"){
            venue_name.style.display = "block";
              edit.style.display= "none";
              venue_name.focus();
          } else {
              edit.style.display= "block";
            venue_name.style.display = "none";
          } 
    }
    function venueEmail(){
        var venue_email = document.getElementById("venue_email");
        var edit_email = document.getElementById("edit_email");
          if (venue_email.style.display === "none"){
            venue_email.style.display = "block";
              edit_email.style.display= "none";
              venue_email.focus();
          } else {
              edit_email.style.display= "block";
            venue_email.style.display = "none";
          } 
    }
</script>

<h1>Venue Info Page</h1>

<div class="field">
    <div class="field-inner">
        <div class="inner">
            <div class="label">Venue Name:</div>
            <div>
                <div id="venue_name_label" >Venue 1</div>
                <input type="text" name="venue_name" class="hidden" id="venue_name" placeholder="Enter the new Venue name" >
            </div>
        </div>
        <div class="inner-edit" onclick="venueName()" id="edit">
            Edit
        </div>
    </div>
    <div class="field-inner">
        <div class="inner">
        <div class="label">Email:</div>  
            <div> 
                <div id="venue_email_label" >venueone@email.com</div>
                <input type="text" name="venue_email" class="hidden" id="venue_email" placeholder="Ente the new email adderess" >
            </div>
        </div>
        <div class="inner-edit" onclick="venueEmail()" id="edit_email">
            Edit
        </div>
    </div>
    <div class="field-inner">
        <div class="inner">
            <div class="label">Address Line One:</div>
            <div>
                <div id="address_line_1_label" >100 Street</div>
                <input type="text" name="address_line_1" class="hidden" id="address_line_1" placeholder="Enter new address">
            </div>
        </div>
        <div class="inner-edit">
            Edit
        </div>
    </div>
    <div class="field-inner">
        <div class="inner">
            <div class="label">Address Line Two:</div>
            <div>
                <div id="address_line_1_label" >Southend</div>
                <input type="text" name="address_line_1" class="hidden" id="address_line_1" placeholder="Enter new address">
            </div>
        </div>
        <div class="inner-edit">
            Edit
        </div>
    </div>
    <div class="field-inner">
        <div class="inner">
            <div class="label">Address Line Three:</div>
            <div>
                <div id="address_line_1_label" >Essex</div>
                <input type="text" name="address_line_1" class="hidden" id="address_line_1" placeholder="Enter new address">
            </div>
        </div>
        <div class="inner-edit">
            Edit
        </div>
    </div>
    <div class="field-inner">
        <div class="inner">
            <div class="label">Postcode:</div>
            <div>
                <div id="address_line_1_label" >SS1 1AA</div>
                <input type="text" name="address_line_1" class="hidden" id="address_line_1" placeholder="Enter new postcode">
            </div>
        </div>
        <div class="inner-edit">
            Edit
        </div>
    </div>
</div>-->
