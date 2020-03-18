
<div class="list-group">
    <div class="list-group-item d-flex justify-content-between list-group-item-dark">
        <span>All Venues</span>
        <div>
            <span> Uesr: <?php echo $user_name; ?></span>
            <a href="../logout">Log Out</a>
        </div>
    </div>
    <div class="list-group-item px-1 ">
        <?php
        if(Session::exists('update_venue_info')){
            echo '<div class="col cms-bg-success p3"><h4 class="text-success">'. Session::flash('update_venue_info'). '</h4></div></div>
            <div class="list-group-item px-1 ">
            <a href="../admin" class="btn btn-info m-auto text-white">Return to venues list</a>
            </div>';
        }
        elseif(Session::exists('added_venue')){
            echo '<div class="col cms-bg-success p3"><h4 class="text-success">'. Session::flash('added_venue'). '</h4></div>
            </div>
            <div class="list-group-item px-1 ">
                <div class = "col"><h5 class="text-danger">Important:</h5></div>
                <div class = "col">
                    <span>This venue will not be visible on the main vebsite untill the venue package will be added.</span>
                </div>
                <div class = "col">
                    Do you want to add the package now?
                    <a href="add-new-package.php?id='.Session::get('venue_ref').'" class="btn btn-info m-auto text-white">Yes</a>
                    <a href="../admin" class="btn btn-info m-auto text-white">No</a>
                </div>
            </div>';
            Session::flash('venue_ref');
        } else{
        ?>
        
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Venue Ref</th>
                <th scope="col">Venue Name</th>
                <th scope="col">Email</th>
                <th scope="col">Contact</th>
                <th scope="col">Status</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
            <?php
//            $venues = DB::getInstance()->get('cms_venue_details', array('id', '>', 0));
            
//            $packages= DB::getInstance()->get('cms_venue_packages', array('venue_ref', '=', $venue_ref ));
//            if (!$packages->count()){
//                $text_danger = 'text-danger';
//            }
            foreach($venues->results() as $venue){
                $deleted = $venue->deleted;
                if($deleted == 1){
                    continue;
                } else{
                $status = $venue->disabled;
                    if($status == 1){
                        $venue_status = 'Disable &#10005;';
                        $color_text = 'text-danger';
                        $enable_diasble = 'enable-venue.php';
                    } else {
                        $venue_status = 'Live &#10003;';
                        $color_text = 'text-success';
                        $enable_diasble = 'disable-venue.php';
                    }
                    
                $venue_id = $venue->id;
                $venue_ref = $venue->venue_ref;
                $venue_name = $venue->venue_name; 
                $venue_email = $venue->venue_email;
                $packages= DB::getInstance()->get('cms_venue_packages', array('venue_ref', '=', $venue_ref ));
                if (!$packages->count()){
                $text_danger = 'text-danger';
                } else{ $text_danger = ''; }
                echo '<tr>
                <td data-label="Venue Ref" class="align-middle">'. $venue_ref .'</td>
                <td data-label="Venue Name" class="align-middle"><a class="'. $text_danger .'" href="venue-info-page.php?id='. $venue_id .'">'. $venue_name .'</a></td>
                <td data-label="Email" class="align-middle">'. $venue_email .'</td>
                <td data-label="Contact" class="align-middle">12312345</td>
                <td data-label="Delete Venue" class="clickable align-middle text-center"><a class="'.$color_text.' text-center" href="'. $enable_diasble .'?id='.$venue_id.'">'.$venue_status.'</a></td>
                <td data-label="Delete Venue" class="clickable align-middle"><a href="delete_venue.php?id='.$venue_id.'">Delete</a></td>
                </tr>';
                }
            }
            ?>

            </tbody>
          </table>
        
    </div>
    <?php }?>
</div>