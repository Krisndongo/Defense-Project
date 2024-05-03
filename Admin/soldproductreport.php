<?php
define('TITLE', 'Product Report');
define('PAGE', 'sellreport');
include('includes/header.php');
include('../dbConnection.php');
session_start();
$ob = new database();
if (empty($_SESSION['email'])) {
    header("Location: login.php");
}
?>
<div class="col-sm-9 col-md-10 mt-5 text-center">
    <form action="" method="POST" class="d-print-none">
        <div class="form-row">
            <div class="form-group col-md-2">
                <input type="date" class="form-control" id="startdate" name="startdate" required>
            </div> <span> to </span>
            <div class="form-group col-md-2">
                <input type="date" class="form-control" id="enddate" name="enddate" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-secondary" name="searchsubmit" value="Search">
            </div>
            
        </div>
    </form>
    <?php
    if (isset($_POST['searchsubmit'])) {
        $startdate = $_POST['startdate'];
        $enddate = $_POST['enddate'];
        $where = "cpdate BETWEEN '$startdate' AND '$enddate'";
        if ($ob->num_check("customer_tb", "*", $where) === true) {
            $result = $ob->get_result();
            echo '
    <p class=" bg-dark text-white p-2 mt-4">Details</p>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Customer ID</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Address</th>
            <th scope="col">Product Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price Each</th>
            <th scope="col">Total</th>
            <th scope="col">Date</th>
        </tr>
        </thead>
        <tbody>';
            foreach ($result as $row) {
                    echo '<tr>
            <th scope="row">' . $row["custid"] . '</th>
            <td>' . $row["custname"] . '</td>
            <td>' . $row["custadd"] . '</td>
            <td>' . $row["cpname"] . '</td>
            <td>' . $row["cpquantity"] . '</td>
            <td>' . $row["cpeach"] . '</td>
            <td>' . $row["cptotal"] . '</td>
            <td>' . $row["cpdate"] . '</td>
            </tr>';
            }
            echo '<tr>
            <td><form class="d-print-none"><input class="btn btn-danger" type="submit" value="Print" onClick="window.print()"></form></td>
            <td></td>
            <td></td>
            <td></td>
            <td><input class="btn btn-danger" type="submit" value="Total Quantity-"></form>
            </td>
            <td></td>   
            <td><input class="btn btn-danger" type="submit" value="Total sell-"></form>
            </tr></tbody>
            </table>';
            
        } else {
            echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'> No Records Found ! </div>";
        }
    }
    ?>
<?php
include('includes/footer.php');
?>