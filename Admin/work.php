<?php
define('TITLE', 'Work Order');
define('PAGE', 'work');
include('includes/header.php');
include('../dbConnection.php');
session_start();
$ob = new database();
if (empty($_SESSION['email'])) {
    header("Location: login.php");
}
?>
<div class="col-sm-9 col-md-10 mt-5">
    <?php
    if ( $ob->num_check("assignwork_tb") === true) {
    $result = $ob->get_result();
    echo '<table class="table">
  <thead>
    <tr>
      <th scope="col">Req ID</th>
      <th scope="col">Request Info</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">City</th>
      <th scope="col">Mobile</th>
      <th scope="col">Technician</th>
      <th scope="col">Assigned Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>';
        foreach ($result as $row) {
            echo '<tr>
    <th scope="row">' . $row["request_id"] . '</th>
    <td>' . $row["request_info"] . '</td>
    <td>' . $row["requester_name"] . '</td>
    <td>' . $row["requester_add2"] . '</td>
    <td>' . $row["requester_city"] . '</td>
    <td>' . $row["requester_mobile"] . '</td>
    <td>' . $row["assign_tech"] . '</td>
    <td>' . $row["assign_date"] . '</td>
    <td><form action="viewassignwork.php" method="POST" class="d-inline"> <input type="hidden" name="id" value=' . $row["request_id"] . '><button type="submit" class="btn btn-warning" name="view" value="View"><i class="far fa-eye"></i></button></form>

    <form action="" method="POST" class="d-inline"><input type="hidden" name="id" value=' . $row["request_id"] . '><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></form>
    </td>
    </tr>';
        }
        echo '</tbody> </table>';
    } else {
        echo '<div class="alert alert-warning mt-2" role="alert"> You have no work order </div>';
    }
    if (isset($_POST['delete'])) {
        if (($ob->delete("assignwork_tb", "request_id = '{$_POST['id']}'")) === true) {
            echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
        } else {
            echo "Unable to Delete Data";
        }
    }
    ?>
</div>
<?php
include('includes/footer.php');
?>