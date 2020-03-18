<?php
if(Input::exists()){
        $validate= new Validate();
            $validation= $validate->check($_POST, array(
            'current_password'=>array(
                'name' => 'Current Password',
                'required'  => true,
                'min'       => 5,
                'max'       =>25
            ),
            'new_password'=>array(
                'name' => 'New Password',
                'required'  => true,
                'min'       => 5,
                'max'       =>25
            ),
            'new_password_again'=>array(
                'name' => 'New Password Again',
                'required'  => true,
                'matches'   => 'new_password',
                'min'       => 5,
                'max'       =>25
            )
            ));
    if($validation->passed()){
        $current_password = Input::get('current_password');
        $user = new User();
        if(!password_verify($current_password, $user->data()->user_pass)){
            echo '<span style="color:#f00">The current password is incorect!</span><br>';            
        }else{
            DB::getInstance()->update('cms_user', $user_id, array(
                'user_pass' => password_hash(Input::get('new_password'), PASSWORD_BCRYPT)
            ));
            $user->logout();
            Session::put('password_changed', 'You have succesfully changed your password');
            Redirect::to('../login');
        }
        
    } else{
        ?><h3 class="text-danger">Errors:</h3><?php
             foreach($validation->errors() as $error){
             echo '<span style="color:#f00">'. $error. '</span><br>';
        }
    }
}
    
    