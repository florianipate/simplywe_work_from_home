<div class="list-group">
    <div class="list-group-item list-group-item-dark">
        <span>Use the form below to add venue facilities</span>
    </div>
    <div class="list-group-item p-0">
        <form action="" method="post">
            
            
            <div class="form-group col-12 pt-3">
                <h5>Capacity</h5>
                <?php 
                    $capacity_info = DB::getInstance()->get('cms_venue_facilities', array('venue_ref', '=', $venue_ref));
                    if(!$capacity_info->count()){
                             echo   '<div class="col cms-bg-danger p3">
                                        <h6 class="text-danger">You haven\'t enter the venue capacity</h6>
                                    </div>';
                        } else {
                    foreach($capacity_info->results() as $capacity){
                            $category = $capacity->category;
                            if($category !== 'capacity'){
                                echo '<div class="col cms-bg-danger p3"><h6 class="text-danger">You haven\'t enter the venue capacity</h6></div>';
                            } else{

                                echo $capacity->description;
                            }
                        }
                    }
                ?>
                <div class="d-none">
                    <label for="capacity">Enter the venue copacity</label><span class="required">*</span>
                    <input type="text" class="form-control" name="capacity" id="capacity" aria-describedBy="capacityHelp" value="<?php echo Input::get('capacity')?>" />
                    <small id="capacityHelp" class="form-text text-muted">Enter the venue capacity</small>
                    <button type="submit" class="btn btn-info text-white">Add</button>
                </div>
            </div>
            
            
            
            <div class="form-group col-12 pt-3">
                <h5>Venue Type</h5>
                <?php 
                    $capacity_info = DB::getInstance()->get('cms_venue_facilities', array('venue_ref', '=', $venue_ref));
                        if(!$capacity_info->count()){
                             echo   '<div class="col cms-bg-danger p3">
                                        <h6 class="text-danger">You haven\'t described the venue type</h6>
                                    </div>';
                        } else {
                            foreach($capacity_info->results() as $capacity){
                                $category = $capacity->category;
                                if($category !== 'venue type'){
                                    echo '<div class="col cms-bg-danger p3"><h6 class="text-danger">You haven\'t described the venue type</h6></div>';
                                }
                            }
                        }
                ?>
                <div class="d-none">
                <label for="venue_type">Describe the Type of the venue</label><span class="required">*</span>
                    <input type="text" class="form-control" name="venue_type" id="venue_type" aria-describedBy="venue_typeHelp" value="<?php echo Input::get('venue_type')?>" />
                    <small id="venue_typeHelp" class="form-text text-muted">Enter the venue capacity</small>
                    <button type="submit" class="btn btn-info text-white">Add</button>
                </div>
            </div>
            <div class="form-group col-12 pt-3">
                <h5>Evening Entertainment</h5>
                <div class="d-none">
                <label for="evening_entertainment">Evening Entertainment</label><span class="required">*</span>
                    <input type="text" class="form-control" name="evening_entertainment" id="evening_entertainment" aria-describedBy="evening_entertainmentHelp" value="<?php echo Input::get('evening_entertainment')?>" />
                    <small id="evening_entertainmentHelp" class="form-text text-muted">Enter the venue capacity</small>
                    <button type="submit" class="btn btn-info text-white">Add</button>
                </div>
            </div>
            <div class="form-group col-12 pt-3">
                <h5>Overnight Accommodation</h5>
                <div class="d-none">
                <label for="accommodation">Overnight Accommodation</label><span class="required">*</span>
                    <input type="text" class="form-control" name="accommodation" id="accommodation" aria-describedBy="accommodationHelp" value="<?php echo Input::get('accommodation')?>" />
                    <small id="accommodationHelp" class="form-text text-muted">Enter the venue capacity</small>
                    <button type="submit" class="btn btn-info text-white">Add</button>
                </div>
            </div>
            <div class="form-group col-12 pt-3">
                <h5>Venue Staff Assistance</h5>
                <div class="d-none">
                <label for="venue_type">Venue Staff Assistance</label><span class="required">*</span>
                    <input type="text" class="form-control" name="venue_type" id="venue_type" aria-describedBy="venue_typeHelp" value="<?php echo Input::get('venue_type')?>" />
                    <small id="venue_typeHelp" class="form-text text-muted">Enter the venue capacity</small>
                    <button type="submit" class="btn btn-info text-white">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>