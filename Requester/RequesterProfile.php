<?php
ob_start();
define('TITLE', 'Requester Profile');
define('PAGE', 'RequesterProfile');
include('includes/header.php');
include('../dbConnection.php');
session_start();
$ob = new database();
if (empty($_SESSION['email']) && empty($_SESSION['name'])) {
    header("Location: RequesterLogin.php");
} elseif (!empty($_SESSION['email']) && !empty($_SESSION['name'])) {
    $remail = $_SESSION['email'];
    $rname = $_SESSION['name'];
    if (isset($_POST['nameupdate'])) {
        $rname = ($_POST['rName']);
        $value = ["r_name" => $rname];
        $where = "r_email='$remail'";
        $ob->update("requesterlogin_tb", $value, $where);
        if ($ob->get_result() == true) {
            $passmsg = '<div class="alert alert-warning mt-2" role="alert"> Change successfully </div>';
        }
    }
}
?>

<div class="col-sm-6 mt-5">
    <form class="mx-5" method="POST">
        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail" value="<?php echo $remail ?>" readonly>
        </div>
        <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" class="form-control" id="inputName" value="<?php echo $rname ?>" name="rName">
        </div>
        <button type="submit" class="btn btn-danger" name="nameupdate">Update</button>
        <?php if (isset($passmsg)) {
            echo $passmsg;
        } ?>
    </form>
</div>
</div>
</div>
<?php
include('includes/footer.php');
?>