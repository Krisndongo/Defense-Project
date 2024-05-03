<?php
define('TITLE', 'Work Report');
define('PAGE', 'workreport');
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
        $where = "assign_date BETWEEN '$startdate' AND '$enddate'";
        if ($ob->num_check("assignwork_tb", "*", $where) === true) {
            $result = $ob->get_result();
        echo '
    <p class=" bg-dark text-white p-2 mt-4">Details</p>
    <table class="table">
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
      </tr>';
            }
            echo '<tr>
    <td><form class="d-print-none"><input class="btn btn-danger" type="submit" value="Print" onClick="window.print()"></form></td>
  </tr></tbody>
  </table>';
        } else {
            echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'> No Records Found ! </div>";
        }
    }
    ?>
</div>
</div>
</div>

<?php
include('includes/footer.php');
?>