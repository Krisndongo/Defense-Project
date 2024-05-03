<?php
include('dbConnection.php');
$ob = new database;
//Data receive form post method
if (isset($_POST['rSignup'])) {
    $rName = $_POST['rName'];
    $rEmail = filter_var($_POST['rEmail'], FILTER_VALIDATE_EMAIL);
    $rPassword = $_POST['rPassword'];
    $cPassword = $_POST['cPassword'];
    $where = "r_email='$rEmail'";
    if ($rEmail) {
        //password matching 
        if ($rPassword === $cPassword) {
            $pass = $ob->get_pass($rPassword, $cPassword);
            //check email exist or not exist
            if ($ob->num_check("requesterlogin_tb", "*", $where) == true) {
                $reg_msg = '<div class="alert alert-success mt-2" role="alert"> Email exist,Please  provide new email</div>';
            } else {
                $value = ["r_name" => $rName, "r_email" => $rEmail, "r_password" => $pass];
                if ($ob->insert("requesterlogin_tb", $value)) {
                    $reg_msg = '<div class="alert alert-success mt-2" role="alert"> Account Succefully Created </div>';
                } else {
                    $reg_msg = '<div class="alert alert-danger mt-2" role="alert"> Unable to Create Account </div>';
                }
            }
        } else {
            $reg_msg = '<div class="alert alert-success mt-2" role="alert"> Please  provide same password</div>';
        }
    } else {
        $reg_msg = '<div class="alert alert-success mt-2" role="alert"> Please  provide valid email </div>';
    }
}
?>
<!-- Form for user registration -->
<div class="container pt-5" id="registration">
    <h2 class="text-center">Create an Account</h2>
    <div class="row mt-4 mb-4">
        <div class="col-md-6 offset-md-3">
            <form action="" class="shadow-lg p-4" method="POST">
                <div class="form-group">
                    <i class="fas fa-user"></i><label for="name" class="pl-2 font-weight-bold">Name</label><input type="text" class="form-control" placeholder="Name" name="rName" required>
                </div>
                <div class="form-group">
                    <i class="fas fa-user"></i><label for="email" class="pl-2 font-weight-bold">Email</label><input type="email" class="form-control" placeholder="Email" name="rEmail" required>
                    <!--Add text-white below if want text color white-->
                    <small class="form-text">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i><label for="pass" class="pl-2 font-weight-bold">New
                        Password</label><input type="password" class="form-control" placeholder="Password" name="rPassword" required>
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i><label for="pass" class="pl-2 font-weight-bold">Confirm Password</label><input type="password" class="form-control" placeholder="Confirm Password" name="cPassword" required>
                </div>
                <button type="submit" class="btn btn-danger mt-5 btn-block shadow-sm font-weight-bold" name="rSignup">Sign Up</button>
                <em style="font-size:10px;">Note - By clicking Sign Up, you agree to our Terms, Data
                    Policy and Cookie Policy.</em>
                <?php if (isset($reg_msg)) {
                    echo $reg_msg;
                } ?>
            </form>
        </div>
    </div>
</div>