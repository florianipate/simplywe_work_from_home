<?php
$page='login';
require_once '../cms/overall/header.php';
?>
<div class="container ">
    <div class=" col-xs-10 col-md-6 col-lg-6">
        <h1 class="text-center">Sign up</h1>
    </div>
    <form action="" method="post" class="col-xs-8 col-md-6 col-lg-6 card pb-3 pt-3">
        <div class="form-group">
           <?php
            require_once 'register.inc.php';
           ?> 
        </div>
        <div class="d-md-flex">
        <div class="form-group col-md-6 col-xs-12 mr-md-1 p-0">
            <label for="f_name">First Name</label><span class="required">*</span>
            <input type="text" class="form-control" id="f_name" name="f_name" value="<?php echo Input::get('f_name')?>" aria-describedby="f_nameHelp" />
            <small id="f_nameHelp" class="form-text text-muted">Enter First Name</small>
        </div>
        <div class="form-group col-md-6 col-xs-12 ml-md-1 p-0">
            <label for="l_name">Last Name</label><span class="required">*</span>
            <input type="text" class="form-control" id="l_name" name="l_name" value="<?php echo Input::get('l_name')?>" aria-describedby="l_nameHelp" />
            <small id="l_nameHelp" class="form-text text-muted">Enter Last Name</small>
        </div>
        </div>
        
        <div class="form-group">
            <label for="username">Email Address</label><span class="required">*</span>
            <input type="email" class="form-control" name="username" id="username" aria-describedBy="emailHelp" value="<?php echo Input::get('username')?>" />
            <small id="emailHelp" class="form-text text-muted">Enter your registered email address.</small>
        </div>
        <div class="form-group">
            <label for="password">Password</label><span class="required">*</span>
            <input type="password" class="form-control" id="user_pass" name="user_pass" aria-describedBy="user_passdHelp" />
            <small id="user_passHelp" class="form-text text-muted">Enter password.</small>
        </div>
        <div class="form-group">
            <label for="user_pass_again">Password again</label><span class="required">*</span>
            <input type="password" class="form-control" id="user_pass_again" name="user_pass_again" aria-describedBy="user_pass_againHelp" />
            <small id="user_pass_againHelp" class="form-text text-muted">Enter password again.</small>
        </div>
        <div class="form-group">
            <div><span class="required">*</span> Required fields</div>
            <input type="checkbox" name="remember" class="pl-3" id="tandc"/> 
            <label for="tandc"> I agree to Simplywed <a href="terms_conditions.php">Terms & Conditions.</a><span class="required">*</span></label>
        </div>
        <div class="form-group pt-2">
            <button type="submit" class="btn btn-primary m-auto">Register</button>
        </div>
            <input type="hidden" name="token" value="<?php  echo Token::generate(); ?>"/>
    </form>
</div>


<?php
require_once '../cms/overall/header.php';
?>