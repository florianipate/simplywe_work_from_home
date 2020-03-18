        
<!--       ==================== Register the user =================-->
<?php
    $user = new User();
    if($user->isLoggedIn()){
    $user->logout();
    Redirect::to('register.php');
    } else{
        if(Input::exists()){
            $validate = new Validate();
            $validation = $validate->check($_POST, array(
                'f_name' => array(
                'name' => 'First Name',
                'required' => true,
                'min' => 3,
                'max' =>20
                ),
                'l_name' => array(
                'name'=> 'Last Name',
                'required'=> true,
                'min' => 3,
                'max' =>20
                ),
                'username' => array(
                'name'=> 'Email',
                'required'=> true,
                'min' => 3,
                'max' =>50,
                'unique' => 'cms_user'
                ),
                'user_pass' => array(
                'name' => 'Password',
                'required' => true,
                'min' => 6,
                'max' =>20
                ),
                'user_pass_again' => array(
                'name' => 'Password Again',
                'required' => true,
                'matches' => 'user_pass'
                )

            ));
            if($validation->passed()){
                $salt = Hash::salt(32);
                $user = new User();
                try{
                   $user->create(array(
                       'f_name'     =>Input::get('f_name'),
                       'l_name'     =>Input::get('l_name'),
                       'username' =>Input::get('username'),
                       'contact_no' =>Input::get('contact_no'),
                       'user_pass' => password_hash(Input::get('user_pass'), PASSWORD_BCRYPT), 
                       'user_group_id'  => 1
                        )); 
                    Session::put('registered', 'You have succesfully created your accont');
                    Redirect::to('../login');
                } catch(Exception $e) {
                    die($e->getMessage());
                }
                
            }
             else {  
                 ?><h1 class="text-danger">Errors:</h1><?php                 
                foreach($validation->errors() as $error){
                echo '<span style="color:#f00">'. $error. '</span><br>';
                }
            }
        }
    }
        
?>
<!--       ========================================================-->
        
