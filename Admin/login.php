<?php
include('../dbConnection.php');
session_start();
$ob = new database();
if (isset($_POST['login'])) {
    $rEmail = $_POST['aEmail'];
    $rPassword = $_POST['aPassword'];
    //$rEmail = mysqli_real_escape_string($mysqli, trim($_POST['rEmail']));
    //$rPassword = mysqli_real_escape_string($mysqli, trim($_POST['rPassword']));
    if (!empty($rEmail) && !empty($rPassword)) {
        // $active_password = $ob->get_pass($rPassword, null, "adminlogin_tb", "*", "a_email='$rEmail'");
        // $row_check = $ob->num_check("adminlogin_tb", "*", "a_email='$rEmail'");

            $db = mysqli_connect("localhost","root","","osms");
            if ($db) {
                $sql = "SELECT a_email FROM adminlogin_tb WHERE a_password = $rPassword";
                $query = mysqli_query($db , $sql);
                $have_admin = mysqli_num_rows($query);
                if ($have_admin) {
                    while ($row = mysqli_fetch_assoc($query)) {
                        $_SESSION['email']= $rEmail = $row['a_email'];
                        header("location: dashboard.php");
                    }
                }else{
                    $msg = '<div class="alert alert-warning mt-2" role="alert"> Enter Valid Email or Password </div>';
                }
            }
            else{
                die("database connection failed" . mysqli_error($db));
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
    <title>Login</title>
</head>

<body>
    <div class="mb-3 text-center mt-5" style="font-size: 30px;">
        <i class="fas fa-stethoscope"></i>
        <span>Online Service Managment System</span>
    </div>
    <p class="text-center" style="font-size: 20px;"> <i class="fas fa-user-secret text-danger"></i> <span>Admin
            Area</span>
    </p>
    <div class="container-fluid mb-5">
        <div class="row justify-content-center custom-margin">
            <div class="col-sm-6 col-md-4">
                <form action="" class="shadow-lg p-4" method="POST">
                    <div class="form-group">
                        <i class="fas fa-user"></i><label for="email" class="pl-2 font-weight-bold">Email</label><input type="email" class="form-control" placeholder="Email" name="aEmail" required>
                        <!--Add text-white below if want text color white-->
                        <small class="form-text">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-key"></i><label for="pass" class="pl-2 font-weight-bold">Password</label><input type="password" class="form-control" placeholder="Password" name="aPassword" required>
                    </div>
                    <button type="submit" class="btn btn-outline-danger mt-3 btn-block shadow-sm font-weight-bold" name="login">Login</button>
                    <?php if (isset($msg)) {
                        echo $msg;
                    } ?>
                </form>
                <div class="text-center"><a class="btn btn-info mt-3 shadow-sm font-weight-bold" href="../index.php">Back
                        to Home</a></div>
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
