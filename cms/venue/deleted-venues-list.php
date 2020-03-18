<div class="list-group">
    <div class="list-group-item list-group-item-dark">
        <span>All Deleted Venues</span>
    </div>
    <div class="list-group-item px-1 ">
        <?php
        if($y===0){
            echo '<div class="col cms-bg-success p3"><h4 class="text-success">You don\'t have any deleted venus </h4></div>';
        } else{
        ?>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Venue Ref</th>
                <th scope="col">Venue Name</th>
                <th scope="col">Email</th>
                <th scope="col">Contact</th>
                <th scope="col">Restore</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
            <?php
            foreach($venues->results() as $venue){
                $deleted = $venue->deleted;
                if($deleted == 0){
                    continue;
                } else{
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
                <td data-label="Venue Name" class="align-middle"><a class=" '. $text_danger .' align-middle " href="venue-info-page.php?id='. $venue_id .'">'. $venue_name .'</a></td>
                <td data-label="Email" class="align-middle">'. $venue_email .'</td>
                <td data-label="Contact" class="align-middle">12312345</td>
                <td data-label="Restore Venue" class="align-middle clickable"><a class="text-success" href="restore-venue.php?id='.$venue_id.'">Restore</a></td>
                <td data-label="Delete Venue" class="align-middle clickable"><a href="delete-venue-permanently.php?id='.$venue_id.'">Delete Permanently</a></td>
                </tr>';
                }
            }
            ?>

            </tbody>
          </table> 
        <?php }?>
    </div>
</div>