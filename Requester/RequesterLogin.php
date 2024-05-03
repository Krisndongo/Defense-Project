<?php
ob_start();
session_start();
include('../dbConnection.php');
$ob = new database();

if (isset($_POST['login'])) {
    $rEmail = filter_var($_POST['rEmail'], FILTER_VALIDATE_EMAIL);
    $rPassword = $_POST['rPassword'];
    $v = [$rEmail,$rPassword];
    $ob->string($v);
    $result = $ob->get_result();
    $rEmail = $result[0];
    $rPassword = $result[1];
    
    if (!empty($rEmail) && !empty($rPassword)) {
        $active_password = $ob->get_pass($rPassword, null, "requesterlogin_tb", "*", "r_email='$rEmail'");
        $row_check = $ob->num_check("requesterlogin_tb", "*", "r_email='$rEmail'");
        if ($row_check == true && $active_password == true) {
            $result = $ob->get_result();
            foreach ($result as list("r_name" => $_SESSION['name'],"r_email"=>$_SESSION['email'] )) {
            }
            header("location: RequesterProfile.php");
        }
        elseif ($row_check != true && $active_password != true) {
            $msg = '<div class="alert alert-warning mt-2" role="alert"> Enter Valid Email or Password </div>';
        }
        elseif ($row_check != true || $active_password != true) {
            $msg = '<div class="alert alert-warning mt-2" role="alert"> Enter Valid Email or Password </div>';
        }
        else {
            $msg = '<div class="alert alert-warning mt-2" role="alert"> Enter Valid Email or Password </div>';
        }
    } else {
        $msg = '<div class="alert alert-warning mt-2" role="alert"> Enter Valid Email or Password </div>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="../css/all.min.css">
    <style>
        .custom-margin {
            margin-top: 8vh;
        }
    </style>
    <title>Login</title> </head>

<body>
    <div class="mb-3 text-center mt-5" style="font-size: 30px;">
        <i class="fas fa-stethoscope"></i>
        <span>Online Service Managment System</span>
    </div>
    <p class="text-center" style="font-size: 20px;"> <i class="fas fa-user-secret text-danger"></i> <span>Requester
            </span>
    </p>
    <div class="container-fluid mb-5">
        <div class="row justify-content-center custom-margin">
            <div class="col-sm-6 col-md-4">
                <form action="" class="shadow-lg p-4" method="POST">
                    <div class="form-group">
                        <i class="fas fa-user"></i><label for="email" class="pl-2 font-weight-bold">Email</label><input type="email" class="form-control" placeholder="Email" name="rEmail">
                        <!--Add text-white below if want text color white-->
                        <small class="form-text">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-key"></i><label for="pass" class="pl-2 font-weight-bold">Password</label><input type="password" class="form-control" placeholder="Password" name="rPassword">
                    </div>
                    
                    <div> <input type="checkbox" name="check"> Remember me</div>
                    
                    <input type="submit" class="btn btn-outline-danger mt-3 btn-block shadow-sm font-weight-bold" name="login">

                    <?php if (isset($msg)) {
                        echo $msg;
                    } ?>

                </form>
                <div class="text-center"><a class="btn btn-info mt-3 shadow-sm font-weight-bold" href="../index.php">Back to Home</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Boostrap JavaScript -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/all.min.js"></script>
</body>

</html>
