<?php
$page='duplicate_additional_package_details';
require_once '../cms/overall/header.php';

if(Session::exists('old_package_id')){
    $old_package_id = Session::flash('old_package_id');
}
if(Session::exists('new_package_id')){
    $new_package_id = Session::flash('new_package_id');
}
if($old_package_id != '' && $new_package_id !=''){
    $package_info = DB::getInstance()->get('cms_additional_package_details', array('package_id', '=', $old_package_id));
    if($package_info->count()){
        $x          = $package_info->count();
        $separator  = '';
        $y          = 1;
        $details = '';
        foreach($package_info->results() as $package){
            $separator = ($y < $x)? ',' : '';
            $y++;
            $details .= $package->detail.$separator;
        }
        $duplicate_details = explode(',', $details);
        foreach($duplicate_details as $duplicate_detail){
            $add_duplicate = DB::getInstance();
                try{
                $add_duplicate->insert('cms_additional_package_details', array(
                    'package_id'    => $new_package_id,
                    'detail'        => $duplicate_detail
                    ));
                } catch(Exception $e) {
                die($e->getMessage());
                }
        }
        Session::put('additional_details', 'The above details has been added to the duplicated package!');
        Redirect::to('additional-package-details.php?id='.$new_package_id); 
    }
}

require_once '../cms/overall/footer.php';
