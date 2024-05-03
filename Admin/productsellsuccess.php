<?php
define('TITLE', 'Success');
define('PAGE', 'assets');
include('includes/header.php');
include('../dbConnection.php');
session_start();
$ob = new database();
if (empty($_SESSION['email'])) {
    header("Location: login.php");
}
if ($ob->num_check("customer_tb", "*", "custid = '{$_SESSION['myid']}'") === true) {
    $result = $ob->get_result();
    foreach ($result as $row) {
    }
    echo "<div class='ml-5 mt-5'>
    <h3 class='text-center'>Customer Bill</h3>
    <table class='table'>
    <tbody>
    <tr>
        <th>Customer ID</th>
        <td>" . $row['custid'] . "</td>
    </tr>
    <tr>
        <th>Customer Name</th>
        <td>" . $row['custname'] . "</td>
    </tr>
    <tr>
        <th>Address</th>
        <td>" . $row['custadd'] . "</td>
    </tr>
    <tr>
    <th>Product</th>
    <td>" . $row['cpname'] . "</td>
    </tr>
    <tr>
        <th>Quantity</th>
        <td>" . $row['cpquantity'] . "</td>
    </tr>
    <tr>
        <th>Price Each</th>
        <td>" . $row['cpeach'] . "</td>
    </tr>
    <tr>
        <th>Total Cost</th>
        <td>" . $row['cptotal'] . "</td>
    </tr>
    <tr>
    <th>Date</th>
    <td>" . $row['cpdate'] . "</td>
    </tr>
    <tr class='text-center'>
        <td><form class='d-print-none'><input class='btn btn-danger' type='submit' value='Print' onClick='window.print()'></form></td>
        <form> <td><a href='assets.php' class='btn btn-secondary d-print-none'>Close</a></td></form>
    </tr>
    </tbody>
    </table> </div>
    ";
} else {
    echo '<div class="alert alert-warning mt-2" role="alert"> Failed </div>';
}
include('includes/footer.php');
?>