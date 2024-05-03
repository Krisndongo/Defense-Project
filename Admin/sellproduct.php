<?php
define('TITLE', 'Sell Product');
define('PAGE', 'assets');
include('includes/header.php');
include('../dbConnection.php');
session_start();
$ob = new database();
if (empty($_SESSION['email'])) {
    header("Location: login.php");
}
if (isset($_POST['psubmit'])) {
    // Assigning User Values to Variable for update
    $pid = $_POST['pid'];
    $pava = ($_POST['pava'] - $_POST['pquantity']);
    // Assigning User Values to Variable for insert
    $custname = $_POST['cname'];
    $custadd = $_POST['cadd'];
    $cpname = $_POST['pname'];
    $cpquantity = $_POST['pquantity'];
    $cpeach = $_POST['psellingcost'];
    $cptotal = $_POST['totalcost'];
    $cpdate = $_POST['selldate'];
    $cust_in_value = [ "custname"=>$custname,"custadd"=>$custadd,"cpname"=>$cpname,"cpquantity"=>$cpquantity,"cpeach"=>$cpeach,"cptotal"=>$cptotal,"cpdate"=>$cpdate ];
    if ($ob->insert("customer_tb",$cust_in_value) === true) {
        $get_id = $ob->get_result();
        $get_id = implode(" ",$get_id);
        $_SESSION['myid'] = $get_id;
        $value = ["pava"=>$pava,"pname"=>"amirul" ];
        $ob->update("assets_tb",$value,"pid = '$pid'");
        header('location: productsellsuccess.php');
    }
    //Updating Assest data for available product after sell
    
}

?>
<div class="col-sm-6 mt-5  mx-3 jumbotron">
    <h3 class="text-center">Customer Bill</h3>
    <?php
    if (isset($_POST['issue'])) {
        $ob->select("assets_tb","*","pid = {$_POST['id']}");
        $result = $ob->get_result();
        foreach ($result as $row) {
        }
    }
    ?>
    <form action="" method="POST">
        <div class="form-group">
            <label for="pid">Product ID</label>
            <input type="text" class="form-control" id="pid" name="pid" value="<?php if (isset($row['pid'])) { echo $row['pid']; } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="cname">Customer Name</label>
            <input type="text" class="form-control" id="cname" name="cname" required>
        </div>
        <div class="form-group">
            <label for="cadd">Customer Address</label>
            <input type="text" class="form-control" id="cadd" name="cadd" required>
        </div>
        <div class="form-group">
            <label for="pname">Product Name</label>
            <input type="text" class="form-control" id="pname" name="pname" value="<?php if (isset($row['pname'])) { echo $row['pname']; } ?>" required>
        </div>
        <div class="form-group">
            <label for="pava">Available</label>
            <input type="text" class="form-control" id="pava" name="pava" value="<?php if (isset($row['pava'])) { echo $row['pava']; } ?>" readonly onkeypress="isInputNumber(event)" required>
        </div>
        <div class="form-group">
            <label for="pquantity">Quantity</label>
            <input type="text" class="form-control" id="pquantity" name="pquantity" onkeypress="isInputNumber(event)" required>
        </div>
        <div class="form-group">
            <label for="psellingcost">Price Each</label>
            <input type="text" class="form-control" id="psellingcost" name="psellingcost" value="<?php if (isset($row['psellingcost'])) { echo $row['psellingcost']; } ?>" onkeypress="isInputNumber(event)" required>
        </div>
        <div class="form-group">
            <label for="totalcost">Total Price</label>
            <input type="text" class="form-control" id="totalcost" name="totalcost" onkeypress="isInputNumber(event)" required>
        </div>
        <div class="form-group col-md-4">
            <label for="inputDate">Date</label>
            <input type="date" class="form-control" id="inputDate" name="selldate" required>
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