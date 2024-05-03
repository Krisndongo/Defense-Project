<?php
define('TITLE', 'Requesters');
define('PAGE', 'requesters');
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
    <p class=" bg-dark text-white p-2">List of Requesters</p>
    <?php
    if ($ob->num_check("requesterlogin_tb") === true) {
        $result = $ob->get_result();
        echo '<table class="table">
    <thead>
    <tr>
        <th scope="col">Requester ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>';
        foreach ($result as $row) {
            echo '<tr>';
            echo '<th scope="row">' . $row["r_login_id"] . '</th>';
            echo '<td>' . $row["r_name"] . '</td>';
            echo '<td>' . $row["r_email"] . '</td>';
            echo '<td><form action="editreq.php" method="POST" class="d-inline"> <input type="hidden" name="id" value=' . $row["r_login_id"] . '><button type="submit" class="btn btn-info mr-3" name="view" value="View"><i class="fas fa-pen"></i></button></form>  
            <form action="" method="POST" class="d-inline"><input type="hidden" name="id" value=' . $row["r_login_id"] . '><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></form></td>
            </tr>';
        }
    echo '</tbody>
    </table>';
    } else {
        echo '<div class="alert alert-warning mt-2" role="alert"> You have no requester </div>';
    }
    if (isset($_POST['delete'])) {
        if ( $ob->delete("requesterlogin_tb", "r_login_id = '{$_POST['id']}'") === true ) {
            echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
        }else {
            echo '<div class="alert alert-warning mt-2" role="alert"> Unable to Delete Data </div>';
        }
    }
    ?>
</div>
</div>
<div><a class="btn btn-danger box" href="insertreq.php"><i class="fas fa-plus fa-2x"></i></a>
</div>
</div>
<?php
include('includes/footer.php');
?>