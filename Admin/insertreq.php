<?php
define('TITLE', 'Add New Requester');
define('PAGE', 'requesters');
include('includes/header.php');
include('../dbConnection.php');
session_start();
$ob = new database();
if (empty($_SESSION['email'])) {
    header("Location: login.php");
}
    if (isset($_POST['reqsubmit'])) {
        // Assigning User Values to Variable
        $rname = $_POST['r_name'];
        $rEmail = $_POST['r_email'];
        $rPassword = $_POST['r_password'];
        $value = [ "r_name"=> $rname, "r_email"=> $rEmail, "r_password"=> $rPassword ];
        if ($ob->insert("requesterlogin_tb",$value) === true) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Added Successfully </div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Add </div>';
        }
    }

?>
<div class="col-sm-6 mt-5  mx-3 jumbotron">
    <h3 class="text-center">Add New Requester</h3>
    <form action="" method="POST">
        <div class="form-group">
            <label for="r_name">Name</label>
            <input type="text" class="form-control" id="r_name" name="r_name">
        </div>
        <div class="form-group">
            <label for="r_email">Email</label>
            <input type="email" class="form-control" id="r_email" name="r_email">
        </div>
        <div class="form-group">
            <label for="r_password">Password</label>
            <input type="password" class="form-control" id="r_password" name="r_password">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="reqsubmit" name="reqsubmit">Submit</button>
            <a href="requester.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if (isset($msg)) {
            echo $msg;
        } ?>
    </form>
</div>
<?php
include('includes/footer.php');
?>