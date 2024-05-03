<?php
define('TITLE', 'Update Requester');
define('PAGE', 'requesters');
include('includes/header.php');
include('../dbConnection.php');
session_start();
$ob = new database();
if (empty($_SESSION['email'])) {
    header("Location: login.php");
} 
    if (isset($_POST['requpdate'])) {
        // Assigning User Values to Variable
        $rid = $_POST['r_login_id'];
        $rname = $_POST['r_name'];
        $remail = $_POST['r_email'];
        $value = [ "r_login_id"=> $rid, "r_name"=> $rname, "r_email"=> $remail ];
        $update_result = $ob->update("requesterlogin_tb",$value,"r_login_id = '$rid'");
        if ($update_result === true) {
            header('location: requester.php');
            // $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
        }
    }
?>
<div class="col-sm-6 mt-5  mx-3 jumbotron">
    <h3 class="text-center">Update Requester Details</h3>
    <?php
    if (isset($_POST['view'])) {
        $ob->select("requesterlogin_tb","*","r_login_id = '{$_POST['id']}'");
        $result = $ob->get_result();
        foreach ($result as $row) {
        }
    }
    ?>
    <form action="" method="POST">
        <div class="form-group">
            <label for="r_login_id">Requester ID</label>
            <input type="text" class="form-control" id="r_login_id" name="r_login_id" value="<?php if (isset($row['r_login_id'])) { echo $row['r_login_id']; } ?>" required>
        </div>
        <div class="form-group">
            <label for="r_name">Name</label>
            <input type="text" class="form-control" id="r_name" name="r_name" value="<?php if (isset($row['r_name'])) { echo $row['r_name']; } ?>" required>
        </div>
        <div class="form-group">
            <label for="r_email">Email</label>
            <input type="text" class="form-control" id="r_email" name="r_email" value="<?php if (isset($row['r_email'])) { echo $row['r_email']; } ?>" required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
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