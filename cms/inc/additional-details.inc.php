<?php
//    VALIDATE FORM DATA AND INSERT DATA INTO DATABASE
if(Input::exists()){
    $validate = new Validate();
    $validation = $validate->check($_POST, array(
            'new_detail' => array(
                'name' => 'New Detail',
                'required' => true,
                'min' => 3,
                'max' =>250
            )
        ));

    if($validation->passed()){
    $add_details = DB::getInstance();
        try{
            $add_details->insert('cms_additional_package_details', array(
                'package_id'    => $package_id,
                'detail'        => Input::get('new_detail')

            ));
//                Redirect::to('additional-package-details.php?id='.$package_id);

        } catch(Exception $e) {
        die($e->getMessage());
        }
    }else {                   
        foreach($validation->errors() as $error){
        echo '<span style="color:#f00">'. $error. '</span><br>';
        }
    }
}

//GET DATA FROM THE DATABASE

$package_details = DB::getInstance()->get('cms_additional_package_details', array('package_id', '=', $package_id));
if(!$package_details->count()){
    echo $message = '<div class="col cms-bg-danger p3"><h4 class="text-danger">This Wedding package don\'t have any additional information </h4></div>';
} else{
    ?>
<ul class="pt-3 fa-ul">

<?php
    foreach($package_details->results() as $detail){
        echo '<li>
                <div class="row">
                    <div class="col-9 px-0">
                        <span class="fa-li"><i class="fas fa-heart"></i></span>
                        <span>'.$detail->detail. '</span>
                    </div>
                    <div class="col-3">
                        <a href="delete-package-additional-details.php?id='.$detail->id.'">Delete</a>
                    </div>
                </div>
            </li>';
    }
    ?>
</ul>
    <?php
}
if(Session::exists('additional_details')){
    echo '<div class="col cms-bg-success p3">
            <h4 class="text-success">'. Session::flash('additional_details'). '</h4>
        </div>';
}
?>