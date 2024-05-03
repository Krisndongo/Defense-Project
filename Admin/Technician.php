<?php
define('TITLE', 'Technician');
define('PAGE', 'technician');
include('includes/header.php');
include('../dbConnection.php');
session_start();
$ob = new database();
if (empty($_SESSION['email'])) {
    header("Location: login.php");
}
?>
<div class="col-sm-9 col-md-10 mt-5 text-center">
    <!--Table-->
    <p class=" bg-dark text-white p-2">List of Employees</p>
    <?php
    if ($ob->num_check("technician_tb") === true) {
        $result = $ob->get_result();
        echo '<table class="table">
  <thead>
   <tr>
    <th scope="col">Emp ID</th>
    <th scope="col">Name</th>
    <th scope="col">City</th>
    <th scope="col">Mobile</th>
    <th scope="col">Email</th>
    <th scope="col">Action</th>
   </tr>
  </thead>
  <tbody>';
        foreach ($result as $row) {
            echo '<tr>';
            echo '<th scope="row">' . $row["empid"] . '</th>';
            echo '<td>' . $row["empName"] . '</td>';
            echo '<td>' . $row["empCity"] . '</td>';
            echo '<td>' . $row["empMobile"] . '</td>';
            echo '<td>' . $row["empEmail"] . '</td>';
            echo '<td><form action="editemp.php" method="POST" class="d-inline"> <input type="hidden" name="id" value=' . $row["empid"] . '><button type="submit" class="btn btn-info mr-3" name="view" value="View"><i class="fas fa-pen"></i></button></form> 
    
    <form action="" method="POST" class="d-inline"><input type="hidden" name="id" value=' . $row["empid"] . '><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></form></td>
   </tr>';
        }
        echo '</tbody>
 </table>';
    } else {
        echo '<div class="alert alert-warning mt-2" role="alert"> You have no technician </div>';
    }

    if (isset($_POST['delete'])) {
        if ($ob->delete("technician_tb", "empid = {$_POST['id']}") === true) {
            echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
        } else {
            echo '<div class="alert alert-warning mt-2" role="alert"> Unable to Delete Data </div>';
        }
    }
    ?>
</div>

<div><a class="btn btn-danger box" href="insertemp.php"><i class="fas fa-plus fa-2x"></i></a>
</div>


<?php
include('includes/footer.php');
?>