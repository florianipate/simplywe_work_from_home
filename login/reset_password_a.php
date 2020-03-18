<?php
$page='login';
require_once '../cms/overall/header.php';
?>
<div class="container ">
    <div class="row">
        <div class=" col-12 m-auto py-2">
            <h1 class="text-center">Forgot password</h1>
        </div>

    
        <form method="post" class="col-xs-8 col-md-6 col-lg-5 m-auto card pb-3 pt-3">
            <div class="form-group">
                <?php
                function randomString($lenght){
                    $chars = "ABCDEFGHKLMNPRSTXWYZ0123456789";
                    srand ((double)microtime()* 1000000);
                    $str ="";
                    $i =1;
                        while($i <= $lenght){
                            $num = rand() %33;
                            $tmp = substr($chars, $num, 1);
                            $str = $str . $tmp;
                            $i++;
                    }
                }
                    
                if(Input::exists()){
                    $validate= new Validate();
                    $validation= $validate->check($_POST, array(
                    'username'=>array(
                        'name' => 'ID or Username',
                        'required'  => true,
                        'min'       => 5,
                        'max'       =>50
                    )
                    ));
                    $username = Input::get('username');
                    if($validation->passed()){
                        $user_info = DB::getInstance()->get('cms_user', array('username', '=', $username));
                        if(!$user_info->count()){
                            echo '<span style="color:#f00">This account is currently unavailable!</span><br>';
                        } else{
//                            send email with auth code
                        }
                    }
                }
                
                
                
                ?>
            </div>
            <div class="form-group">
                <label for="username">Email Address</label><span class="required">*</span>
                <input type="email" class="form-control" name="username" id="username" aria-describedBy="emailHelp" value="<?php echo Input::get('user_email')?>" />
                <small id="emailHelp" class="form-text text-muted">Enter your registered email address.</small>
            </div>

            <button type="submit" class="btn btn-primary w-50 m-auto">Submit</button>
        </form>
    </div>
</div>
<?php
require_once '../cms/overall/footer.php';
?>

