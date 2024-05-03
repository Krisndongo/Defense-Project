<?php
define('TITLE', 'Submit Request');
define('PAGE', 'SubmitRequest');
include('includes/header.php');
include('../dbConnection.php');
session_start();
$ob = new database();
if (empty($_SESSION['email']) && empty($_SESSION['name'])) {
    header("Location: RequesterLogin.php");
} elseif (!empty($_SESSION['email']) && !empty($_SESSION['name'])) {
    $ob->select('submitrequest_tb', '*', "request_id = {$_SESSION['myid']}");
    $result = $ob->get_result();

    foreach ($result as list("request_id" => $id, "requester_name" => $name, "requester_email" => $email, "request_info" => $info, "request_desc" => $des)) {
        echo "<div class='ml-5 mt-5'>
    <table class='table'>
        <tbody>
        <tr>
        <th>Request ID</th>
        <td>" . $id . "</td>
        </tr>
        <tr>
        <th>Name</th>
        <td>" . $name . "</td>
        </tr>
        <tr>
        <th>Email ID</th>
        <td>" . $email . "</td>
        </tr>
        <tr>
        <th>Request Info</th>
        <td>" . $info . "</td>
        </tr>
        <tr>
        <th>Request Description</th>
        <td>" . $des . "</td>
        </tr>
        <tr>
        <td><form class='d-print-none'><input class='btn btn-danger' type='submit' value='Print' onClick='window.print()'></form></td>
         </tr>
        </tbody>
    </table> 
    </div>
    ";
    }
} else {
    echo "Failed";
}
include('includes/footer.php');
?>


