<?php
$page='settings';
require_once '../cms/overall/header.php';
$user = new User();
if(!$user->isLoggedIn()){
    Redirect::to('../login');
}
if(!isset($_GET['id'])){
    Redirect::to('../index.php');
} else{
    $user_id = $_GET['id'];
    $password_info = DB::getInstance()->get('cms_user', array('id', '=', $user_id));
    $password = $password_info->first()->user_pass;
//    echo 'user password is'. $password;
?>
<div class="container ">
    <div class=" col-xs-10 col-md-6 col-lg-5">
        <h1 class="text-center">Change Password</h1>
    </div>
    <form method="post" class="col-xs-8 col-md-6 col-lg-5 card pb-3 pt-3">
        <div class="form-group">
            <?php
//                PROCESS THE LOGIC OF CHANGING USER'S PASSWORD
                require_once 'changepassword.inc.php';
            ?>
        </div>
<!--        FORM ELEMENTS-->
        <div class="form-group">
            <label for="current_password">Current Password</label><span class="required">*</span>
            <input type="password" class="form-control" name="current_password" id="current_password" aria-describedBy="current_passwordHelp" value="<?php echo Input::get('current_password'); ?>" />
            <small id="current_passwordHelp" class="form-text text-muted">Enter your current password</small>
        </div>
        <div class="form-group">
            <label for="new_password">New Password</label><span class="required">*</span>
            <input type="password" class="form-control" name="new_password" id="new_password" ariadescribedBy = "new_password" value= "<?php echo Input::get('new_password'); ?>" />
            <small id="current_passwordHelp" class="form-text text-muted">Enter your new password</small>
        </div>
        <div class="form-group">
            <label for="new_password_again">New Password Again</label><span class="required">*</span>
            <input type="password" class="form-control" name="new_password_again" id="new_password_again" ariadescribedBy = "new_password_again" value= "<?php echo Input::get('new_password'); ?>" />
            <small id="current_password_againHelp" class="form-text text-muted">Enter your new password again</small>
        </div>
<!--        SUBMIT FORM-->
        <button type="submit" class="btn btn-primary w-50 m-auto">Change Passwod</button>
    </form>
</div>
<?php
}
require_once '../cms/overall/footer.php';
?>



