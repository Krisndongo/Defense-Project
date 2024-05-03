<?php
define('TITLE', 'Update Technician');
define('PAGE', 'technician');
include('includes/header.php');
include('../dbConnection.php');
session_start();
$ob = new database();
if (empty($_SESSION['email'])) {
    header("Location: login.php");
} 
if (isset($_POST['empupdate'])) {
    // Assigning User Values to Variable
    $eId = $_POST['empId'];
    $eName = $_POST['empName'];
    $eCity = $_POST['empCity'];
    $eMobile = $_POST['empMobile'];
    $eEmail = $_POST['empEmail'];
    $value = ["empName" => $eName, "empCity" => $eCity, "empMobile" => $eMobile, "empEmail" => $eEmail ];
    $update_result = $ob->update("technician_tb", $value, "empid = '$eId'");
    if ($update_result === true) {
        header('location: technician.php');
        $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
    } else {
        $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
    }
}
?>
<div class="col-sm-6 mt-5  mx-3 jumbotron">
    <h3 class="text-center">Update Technician Details</h3>
    <?php
    if (isset($_POST['view'])) {
        $ob->select("technician_tb","*","empid = '{$_POST['id']}'");
        $result = $ob->get_result();
        foreach ($result as $row) {
        }
    }
    ?>
    <form action="" method="POST">
        <div class="form-group">
            <label for="empId">Emp ID</label>
            <input type="text" class="form-control" id="empId" name="empId" value="<?php if (isset($row['empid'])) { echo $row['empid']; } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="empName">Name</label>
            <input type="text" class="form-control" id="empName" name="empName" value="<?php if (isset($row['empName'])) { echo $row['empName']; } ?>" required>
        </div>
        <div class="form-group">
            <label for="empCity">City</label>
            <input type="text" class="form-control" id="empCity" name="empCity" value="<?php if (isset($row['empCity'])) { echo $row['empCity']; } ?>" required>
        </div>
        <div class="form-group">
            <label for="empMobile">Mobile</label>
            <input type="text" class="form-control" id="empMobile" name="empMobile" value="<?php if (isset($row['empMobile'])) { echo $row['empMobile']; } ?>" onkeypress="isInputNumber(event)" required>
        </div>
        <div class="form-group">
            <label for="empEmail">Email</label>
            <input type="email" class="form-control" id="empEmail" name="empEmail" value="<?php if (isset($row['empEmail'])) { echo $row['empEmail']; } ?>" required>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="empupdate" name="empupdate">Update</button>
            <a href="technician.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if (isset($msg)) {
            echo $msg;
        } ?>
    </form>
</div>
<!-- Only Number for input fields -->
<script>
    function isInputNumber(evt) {
        var ch = String.fromCharCode(evt.which);
        if (!(/[0-9]/.test(ch))) {
            evt.preventDefault();
        }
    }
</script>
<?php
include('includes/footer.php');
?>