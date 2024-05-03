<?php
define('TITLE', 'Change Password');
define('PAGE', 'Requesterchangepass');
include('includes/header.php');
include('../dbConnection.php');
session_start();
$ob = new database();
if (empty($_SESSION['email']) && empty($_SESSION['name'])) {
  header("Location: RequesterLogin.php");
} elseif (!empty($_SESSION['email']) && !empty($_SESSION['name'])) {
  if (isset($_POST['passupdate'])) {
    $rPassword = $_POST['oPassword'];
    $newpass = $_POST['nPassword'];
    $renewpass = $_POST['renPassword'];
    if ($newpass === $renewpass) {
      $active_password = $ob->get_pass($rPassword, null, "requesterlogin_tb", "*", "r_email= '{$_SESSION['email']}' ");
      if ($active_password == true) {
        $re_gen_password = $ob->get_pass($newpass, $renewpass);
        $value = ["r_password" => $re_gen_password];
        $ob->update("requesterlogin_tb", $value, "r_email= '{$_SESSION['email']}'");
        $passmsg = '<div class="alert alert-warning mt-2" role="alert"> succcessfully change </div>';
      } else {
        $passmsg = '<div class="alert alert-warning mt-2" role="alert"> Your old Password is wrong </div>';
      }
    }else{
      $passmsg = '<div class="alert alert-warning mt-2" role="alert"> Please Enter same Password </div>';
    }
  }
}
?>

<div class="col-sm-9 col-md-10">
  <div class="row">
    <div class="col-sm-6">
      <form class="mt-5 mx-5" method="POST">
        <div class="form-group">
          <label for="inputEmail">Email</label>
          <input type="email" class="form-control" id="inputEmail" value=" <?php echo $_SESSION['email'] ?>" readonly>
        </div>
        <div class="form-group">
          <label for="inputoldpassword">Old Password</label>
          <input type="password" class="form-control" id="inputoldpassword" placeholder="Old Password" name="oPassword" required>
        </div>
        <div class="form-group">
          <label for="inputnewpassword">New Password</label>
          <input type="password" class="form-control" id="inputnewpassword" placeholder="New Password" name="nPassword" required>
        </div>
        <div class="form-group">
          <label for="inputrenewpassword">Renew Password</label>
          <input type="password" class="form-control" id="inputrenewpassword" placeholder="Re New Password" name="renPassword" required>
        </div>
        <button type="submit" class="btn btn-danger mr-4 mt-4" name="passupdate">Update</button>
        <button type="reset" class="btn btn-secondary mt-4">Reset</button>
        <?php if (isset($passmsg)) {
          echo $passmsg;
        } ?>
      </form>
    </div>
  </div>
</div>
<?php
//include('includes/footer.php'); 
?>