<?php 
if(isset($_POST['add_staff_assistance'])){
    if(Input::exists()){
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
                'staff_assistance' => array(
                    'name' => 'Venue Staff Assistance details',
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
                    'category'      => 'staff assistance',
                    'description'   => Input::get('staff_assistance')
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
$staff_assistance_info = DB::getInstance()->get('cms_venue_facilities', array('venue_ref', '=', $venue_ref));
    if($staff_assistance_info->count()){
        foreach($staff_assistance_info->results() as $staff_assistance){
            $category = $staff_assistance->category;
            if($category === 'staff assistance'){
                echo '
                <div class="col d-flex pl-4">
                    <div class="col-9 px-0">
                        <span class="fa-li"><i class="fas fa-heart"></i></span>
                        <span>'.$staff_assistance->description. '</span>
                    </div>
                    <div class="col-3">
                        <a href="../cms/facilities/delete_venue_facility.php?id='.$staff_assistance->id.'#staff_assistance">Delete</a>
                    </div>
                </div>';
            } 

        }
    } 
?>