<?php
define('TITLE', 'Add New Product');
define('PAGE', 'assets');
include('includes/header.php');
include('../dbConnection.php');
session_start();
$ob = new database();
if (empty($_SESSION['email'])) {
    header("Location: login.php");
}
if (isset($_POST['psubmit'])) {
    // Assigning User Values to Variable
    $pname         = $_POST['pname'];
    $pdop          = $_POST['pdop'];
    $pava          = $_POST['pava'];
    $ptotal        = $_POST['ptotal'];
    $poriginalcost = $_POST['poriginalcost'];
    $psellingcost  = $_POST['psellingcost'];
    $value = ["pname" => $pname, "pdop" => $pdop, "pava" => $pava, "ptotal" => $ptotal, "poriginalcost" => $poriginalcost, "psellingcost" => $psellingcost];
    if ($ob->insert("assets_tb", $value) === true) {
        $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Added Successfully </div>';
    } else {
        $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Add </div>';
    }
}
?>
<div class="col-sm-6 mt-5  mx-3 jumbotron">
    <h3 class="text-center">Add New Product</h3>
    <form action="" method="POST">
        <div class="form-group">
            <label for="pname">Product Name</label>
            <input type="text" class="form-control" id="pname" name="pname">
        </div>
        <div class="form-group">
            <label for="pdop">Date of Purchase</label>
            <input type="date" class="form-control" id="pdop" name="pdop">
        </div>
        <div class="form-group">
            <label for="pava">Available</label>
            <input type="text" class="form-control" id="pava" name="pava" onkeypress="isInputNumber(event)">
        </div>
        <div class="form-group">
            <label for="ptotal">Total</label>
            <input type="text" class="form-control" id="ptotal" name="ptotal" onkeypress="isInputNumber(event)">
        </div>
        <div class="form-group">
            <label for="poriginalcost">Original Cost Each</label>
            <input type="text" class="form-control" id="poriginalcost" name="poriginalcost" onkeypress="isInputNumber(event)">
        </div>
        <div class="form-group">
            <label for="psellingcost">Selling Cost Each</label>
            <input type="text" class="form-control" id="psellingcost" name="psellingcost" onkeypress="isInputNumber(event)">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="psubmit" name="psubmit">Submit</button>
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