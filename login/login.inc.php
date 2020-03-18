
        
<?php    
//    if(Token::check(Input::get('token'))){

        if(Input::exists()){
        $validate= new Validate();
            $validation= $validate->check($_POST, array(
            'username'=>array(
                'name' => 'ID or Username',
                'required'  => true,
                'min'       => 5,
                'max'       =>50
            ),
            'user_pass'=>array(
                'name' => 'Password',
                'required'  => true,
                'min'       => 5,
                'max'       =>25
            )
            ));
            if($validation->passed()){
                $user = new User();
                    $remember = (Input::get('remember') === 'on') ? true : false;
                    $login = $user->login(Input::get('username'), Input::get('user_pass'));
                   if($login){  
                            if($user->hasPermission('admin')){
                                Redirect::to('../admin');                      
                                } else{
                                Redirect::to('../index.php');
                            }
                     } else {
                         echo '<span style="color:#f00"> Sorry, logging in failed</span>';
                     }
                } else {
                    ?><h3 class="text-danger">Errors:</h3><?php
                     foreach($validation->errors() as $error){
                     echo '<span style="color:#f00">'. $error. '</span><br>';
                }
            }
        }
//    }
?>
<!--//        =========================================================-->
        