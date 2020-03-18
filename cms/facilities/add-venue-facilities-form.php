
<div class="list-group">
    <div class="list-group-item list-group-item-dark">
        <span>Use the form below to add venue facilities</span>
    </div>
    <div class="list-group-item p-0">
        <form action="" method="post">
            
            <div class="form-group col-12 pt-3">
                <div class="col-10 pt-4">
                    <h5>Capacity</h5>
                    <div>
                    <?php require_once '../cms/inc/add_venue_capacity.inc.php'?>
                    </div>
                    <label for="capacity">Enter the venue copacity details</label><span class="required">*</span>
                    <input type="text" class="form-control" name="capacity" id="capacity" aria-describedBy="capacityHelp" autocomplete="off" />
                    <small id="capacityHelp" class="form-text text-muted">Enter the venue capacity</small>
                    <button type="submit" name="add_capacity" class="btn btn-info text-white">Add Venue Capacity Details</button>
                </div>
            </div>
            
            <div class="form-group col-12 pt-3">
                <div class="col-10 pt-4">
                    <h5>Venue Type</h5>
                    <div>
                    <?php require_once '../cms/inc/add_venue_type.inc.php'?>
                    </div>
                    <label for="venue_type">Enter the venue type details</label><span class="required">*</span>
                    <input type="text" class="form-control" name="venue_type" id="venue_type" aria-describedBy="venue_typeHelp" autocomplete="off" />
                    <small id="venue_typeHelp" class="form-text text-muted">Enter the venue type details</small>
                    <button type="submit" name="add_venue_type" class="btn btn-info text-white">Add Venue Type Details</button>
                </div>
            </div>
            
            <div class="form-group col-12 pt-3">
                <div class="col-10 pt-4">
                    <h5>Evening Entertainment</h5>
                    <div>
                    <?php require_once '../cms/inc/add_venue_entertaiment.inc.php'?>
                    </div>
                    <label for="entertaiment">Enter the venue evening entertaiment details</label><span class="required">*</span>
                    <input type="text" class="form-control" name="entertaiment" id="entertaiment" aria-describedBy="entertaimentHelp" autocomplete="off" />
                    <small id="entertaimentHelp" class="form-text text-muted">Enter the venue evening enteertaiment details</small>
                    <button type="submit" name="add_entertaiment" class="btn btn-info text-white">Add Venue Evening Entertaiment</button>
                </div>
            </div>
            
            <div class="form-group col-12 pt-3">
                <div class="col-10 pt-4">
                    <h5>Overnight Accommodation</h5>
                    <div>
                    <?php require_once '../cms/inc/add_venue_accommodation.inc.php'?>
                    </div>
                    <label for="accommodation">Enter the venue overnight accommodation details</label><span class="required">*</span>
                    <input type="text" class="form-control" name="accommodation" id="accommodation" aria-describedBy="accommodationHelp" autocomplete="off" />
                    <small id="accommodationHelp" class="form-text text-muted">Enter the venue overnight accommodation details</small>
                    <button type="submit" name="add_accommodation" class="btn btn-info text-white">Add Venue Overnight Accommodation</button>
                </div>
            </div>
            
            
            <div class="form-group col-12 pt-3">
                <div class="col-10 pt-4">
                    <h5>Venue Staff Assistance</h5>
                    <div>
                    <?php require_once '../cms/inc/add_venue_staff_assistance.inc.php'?>
                    </div>
                    <label for="staff_assistance">Enter the venue staff assistance details</label><span class="required">*</span>
                    <input type="text" class="form-control" name="staff_assistance" id="staff_assistance" aria-describedBy="staff_assistanceHelp" autocomplete="off" />
                    <small id="staff_assistanceHelp" class="form-text text-muted">Enter the venue staff assistance details</small>
                    <button type="submit" name="add_staff_assistance" class="btn btn-info text-white">Add Venue Staff Assistance</button>
                </div>
            </div>
            
            <div class="form-group col-12 pt-3">
                <div class="col-10 pt-4">
                    <h5>Other Facilities</h5>
                    <div>
                    <?php require_once '../cms/inc/add_venue_other_facilities.inc.php'?>
                    </div>
                    <label for="other_facilities">Enter the venue other details details</label><span class="required">*</span>
                    <input type="text" class="form-control" name="other_facilities" id="other_facilities" aria-describedBy="other_facilitiesHelp" autocomplete="off" />
                    <small id="other_facilitiesHelp" class="form-text text-muted">Enter the venue other details</small>
                    <button type="submit" name="add_other_facilities" class="btn btn-info text-white">Add Venue Other Facilities</button>
                </div>
            </div>
        
        </form>
    </div>
    <div class="list-group-item p-0">
        <div class="form-group col-12 pt-3">
            <a href="venue-info-page.php?id=<?php echo $venue_id?>" class="btn btn-info text-white"> Go Back to Venue Info</a>
        </div>
    
    </div>
</div>