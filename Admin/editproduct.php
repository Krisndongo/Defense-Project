<?php
define('TITLE', 'Update Product');
define('PAGE', 'assets');
include('includes/header.php');
include('../dbConnection.php');
session_start();
$ob = new database();
if (empty($_SESSION['email'])) {
    header("Location: login.php");
}
if (isset($_POST['pupdate'])) {
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $pdop = $_POST['pdop'];
    $pava = $_POST['pava'];
    $ptotal = $_POST['ptotal'];
    $poriginalcost = $_POST['poriginalcost'];
    $psellingcost = $_POST['psellingcost'];
    $value = ["pname" => $pname, "pdop" => $pdop, "pava" => $pava, "ptotal" => $ptotal, "poriginalcost" => $poriginalcost, "psellingcost" => $psellingcost];
    $update_result = $ob->update("assets_tb", $value, "pid = '$pid'");
    if ($update_result === true) {
        header('location: assets.php');
        // $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
    } else {
        $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
    }
}
?>
<div class="col-sm-6 mt-5  mx-3 jumbotron">
    <h3 class="text-center">Update Product Details</h3>
    <?php
    if (isset($_POST['view'])) {
        $ob->select("assets_tb","*","pid = {$_POST['id']}");
        $result = $ob->get_result();
        foreach ($result as $row) {
        }
    }
    ?>
    <form action="" method="POST">
        <div class="form-group">
            <label for="pid">Product ID</label>
            <input type="text" class="form-control" id="pid" name="pid" value="<?php if (isset($row['pid'])) { echo $row['pid']; } ?>" readonly >
        </div>
        <div class="form-group">
            <label for="pname">Name</label>
            <input type="text" class="form-control" id="pname" name="pname" value="<?php if (isset($row['pname'])) { echo $row['pname']; } ?>" required>
        </div>
        <div class="form-group">
            <label for="pdop">DOP</label>
            <input type="date" class="form-control" id="pdop" name="pdop" value="<?php if (isset($row['pdop'])) { echo $row['pdop']; } ?>" required>
        </div>
        <div class="form-group">
            <label for="pava">Available</label>
            <input type="text" class="form-control" id="pava" name="pava" value="<?php if (isset($row['pava'])) { echo $row['pava']; } ?>" onkeypress="isInputNumber(event)" required>
        </div>
        <div class="form-group">
            <label for="ptotal">Total</label>
            <input type="text" class="form-control" id="ptotal" name="ptotal" value="<?php if (isset($row['ptotal'])) { echo $row['ptotal']; } ?>" onkeypress="isInputNumber(event)" required>
        </div>
        <div class="form-group">
            <label for="poriginalcost">Original Cost Each</label>
            <input type="text" class="form-control" id="poriginalcost" name="poriginalcost" value="<?php if (isset($row['poriginalcost'])) { echo $row['poriginalcost']; } ?>" onkeypress="isInputNumber(event)" required>
        </div>
        <div class="form-group">
            <label for="psellingcost">Selling Price Each</label>
            <input type="text" class="form-control" id="psellingcost" name="psellingcost" value="<?php if (isset($row['psellingcost'])) { echo $row['psellingcost']; } ?>" onkeypress="isInputNumber(event)" required>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="pupdate" name="pupdate"> Update </button>
            <a href="assets.php" class="btn btn-secondary">Close</a>
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