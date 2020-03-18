<?php 
if(isset($_POST['add_capacity'])){
    if(Input::exists()){
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
                'capacity' => array(
                    'name' => 'Venue capacity details',
                    'required' => true,
                    'min' => 3,
                    'max' =>250
                )
            ));

        if($validation->passed()){
        $add_details = DB::getInstance();
            try{
                $add_details->insert('cms_venue_facilities', array(
                    'venue_ref'      => $venue_ref,
                    'category'      => 'capacity',
                    'description'   => Input::get('capacity')
                ));

            } catch(Exception $e) {
            die($e->getMessage());
            }
        }else {                   
            foreach($validation->errors() as $error){
            echo '<span style="color:#f00">'. $error. '</span><br>';
            }
        }
    }
}
$capacity_info = DB::getInstance()->get('cms_venue_facilities', array('venue_ref', '=', $venue_ref));
    if($capacity_info->count()){
        foreach($capacity_info->results() as $capacity){
            $category = $capacity->category;
            if($category === 'capacity'){
                echo '
                <div class="col d-flex pl-4">
                    <div class="col-9 px-0">
                        <span class="fa-li"><i class="fas fa-heart"></i></span>
                        <span>'.$capacity->description. '</span>
                    </div>
                    <div class="col-3">
                        <a href="../cms/facilities/delete_venue_facility.php?id='.$capacity->id.'#capacity">Delete</a>
                    </div>
                </div>';
            } 

        }
    } 
?>