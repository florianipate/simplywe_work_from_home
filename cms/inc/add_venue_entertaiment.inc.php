<?php 
if(isset($_POST['add_entertaiment'])){
    if(Input::exists()){
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
                'entertaiment' => array(
                    'name' => 'Evening Entertaiment details',
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
                    'category'      => 'entertaiment',
                    'description'   => Input::get('entertaiment')
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
$entertaiment_info = DB::getInstance()->get('cms_venue_facilities', array('venue_ref', '=', $venue_ref));
    if($entertaiment_info->count()){
        foreach($entertaiment_info->results() as $entertaiment){
            $category = $entertaiment->category;
            if($category === 'entertaiment'){
                echo '
                <div class="col d-flex pl-4">
                    <div class="col-9 px-0">
                        <span class="fa-li"><i class="fas fa-heart"></i></span>
                        <span>'.$entertaiment->description. '</span>
                    </div>
                    <div class="col-3">
                        <a href="../cms/facilities/delete_venue_facility.php?id='.$entertaiment->id.'#entertaiment">Delete</a>
                    </div>
                </div>';
            } 

        }
    } 
?>