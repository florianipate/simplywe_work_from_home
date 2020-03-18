<?php 
if(isset($_POST['add_other_facilities'])){
    if(Input::exists()){
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
                'other_facilities' => array(
                    'name' => 'Venue Other Details',
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
                    'category'      => 'other facilities',
                    'description'   => Input::get('other_facilities')
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
$other_facilities_info = DB::getInstance()->get('cms_venue_facilities', array('venue_ref', '=', $venue_ref));
    if($other_facilities_info->count()){
        foreach($other_facilities_info->results() as $other_facilities){
            $category = $other_facilities->category;
            if($category === 'other facilities'){
                echo '
                <div class="col d-flex pl-4">
                    <div class="col-9 px-0">
                        <span class="fa-li"><i class="fas fa-heart"></i></span>
                        <span>'.$other_facilities->description. '</span>
                    </div>
                    <div class="col-3">
                        <a href="../cms/facilities/delete_venue_facility.php?id='.$other_facilities->id.'#staff_assistance">Delete</a>
                    </div>
                </div>';
            } 

        }
    } 
?>