<?php
define('TITLE', 'Assests');
define('PAGE', 'assets');
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
    <p class=" bg-dark text-white p-2">Product/Parts Details</p>
    <?php
    if ($ob->num_check("assets_tb") === true) {
        $result = $ob->get_result();
        echo '<table id="example" class="table">
    <thead>
      <tr>
        <th scope="col">Product ID</th>
        <th scope="col">Name</th>
        <th scope="col">DOP</th>
        <th scope="col">Available</th>
        <th scope="col">Total</th>
        <th scope="col">Original Cost Each</th>
        <th scope="col">Selling Price Each</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>';
        foreach ($result as $row) {
            echo '<tr>
        <th scope="row">' . $row["pid"] . '</th>
        <td>' . $row["pname"] . '</td>
        <td>' . $row["pdop"] . '</td>
        <td>' . $row["pava"] . '</td>
        <td>' . $row["ptotal"] . '</td>
        <td>' . $row["poriginalcost"] . '</td>
        <td>' . $row["psellingcost"] . '</td>
        <td>
          <form action="editproduct.php" method="POST" class="d-inline"> <input type="hidden" name="id" value=' . $row["pid"] . '><button type="submit" class="btn btn-info" name="view" value="View"><i class="fas fa-pen"></i></button></form>  

          <form action="" method="POST" class="d-inline"><input type="hidden" name="id" value=' . $row["pid"] . '><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></form>

          <form action="sellproduct.php" method="POST" class="d-inline"><input type="hidden" name="id" value=' . $row["pid"] . '><button type="submit" class="btn btn-success" name="issue" value="Issue"><i class="fas fa-handshake"></i></button></form>
        </td>
      </tr>';
        }
        echo '</tbody>
  </table>';
        
    } else {
        echo '<div class="alert alert-warning mt-2" role="alert"> You have no product </div>';
    }
    if (isset($_POST['delete'])) {
        if ($ob->delete("assets_tb", "pid = '{$_POST['id']}'") === true) {
            echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
        } else {
            echo '<div class="alert alert-warning mt-2" role="alert"> Unable to Delete Data </div>';
        }
    }
    ?>
</div>
</div>
<a class="btn btn-danger box" href="addproduct.php"><i class="fas fa-plus fa-2x"></i></a>
</div>

<?php
include('includes/footer.php');
?>