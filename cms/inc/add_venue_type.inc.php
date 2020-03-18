<?php 
if(isset($_POST['add_venue_type'])){
    if(Input::exists()){
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
                'venue_type' => array(
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
                    'category'      => 'venue type',
                    'description'   => Input::get('venue_type')
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
$venue_type_info = DB::getInstance()->get('cms_venue_facilities', array('venue_ref', '=', $venue_ref));
    if($venue_type_info->count()){
        foreach($venue_type_info->results() as $venue_type){
            $category = $venue_type->category;
            if($category === 'venue type'){
                echo '
                <div class="col d-flex pl-4">
                    <div class="col-9 px-0">
                        <span class="fa-li"><i class="fas fa-heart"></i></span>
                        <span>'.$venue_type->description. '</span>
                    </div>
                    <div class="col-3">
                        <a href="../cms/facilities/delete_venue_facility.php?id='.$venue_type->id.'#venue_type">Delete</a>
                    </div>
                </div>';
            } 

        }
    } 
?>