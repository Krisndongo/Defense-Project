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
  // Assigning User Values to Variable
  if (isset($_POST['submitrequest'])) {
    $rinfo   = $_POST['requestinfo'];
    $rdesc   = $_POST['requestdesc'];
    $rname   = $_POST['requestername'];
    $radd1   = $_POST['requesteradd1'];
    $radd2   = $_POST['requesteradd2'];
    $rcity   = $_POST['requestercity'];
    $rstate  = $_POST['requesterstate'];
    $rzip    = $_POST['requesterzip'];
    $remail  = $_POST['requesteremail'];
    $rmobile = $_POST['requestermobile'];
    $rdate   = $_POST['requestdate'];

    if ($remail != $_SESSION['email']) {
      $msg = '<div class="alert alert-warning mt-2" role="alert"> Enter your account email address </div>';
    } else {
      $value = ["request_info" => $rinfo, "request_desc" => $rdesc, "requester_name" => $rname, "requester_add1" => $radd1, "requester_add2" => $radd2, "requester_city" => $rcity, "requester_state" => $rstate, "requester_zip" => $rzip, "requester_email" => $remail, "requester_mobile" => $rmobile, "request_date" => $rdate];
      if ($ob->insert("submitrequest_tb", $value) == true) {
        $result =  $ob->get_result();
        $_SESSION['myid'] = implode( " ",$result );
        header("location: submitrequestsuccess.php");
        $msg = '<div class="alert alert-warning mt-2" role="alert"> Change successfully </div>';
      } else {
        $msg = '<div class="alert alert-warning mt-2" role="alert"> Change unsuccessfully </div>';
      }
    }
  }
}
?>

<div class="col-sm-9 col-md-10 mt-5">
  <form class="mx-5" action="" method="POST">
    <div class="form-group">
      <label for="inputContracttInfo">Contract Info</label>
      <input type="text" class="form-control" id="inputContractInfo" placeholder="Contract Info" name="Contractinfo">
    </div>
    <div class="form-group">
      <label for="inputRequestDescription">Description</label>
      <input type="text" class="form-control" id="inputRequestDescription" placeholder="Write Description" name="requestdesc">
    </div>
    <div class="form-group">
      <label for="inputName">Name</label>
      <input type="text" class="form-control" id="inputName" placeholder="Rahul" name="requestername">
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputAddress">Address Line 1</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="House No. 123" name="requesteradd1">
      </div>
      <div class="form-group col-md-6">
        <label for="TaxpayerNumber">Taxpayer Number</label>
        <input type="text" class="form-control" id="Taxpayer Number" placeholder="Company No. 123" name="requesteradd2">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputCity">City</label>
        <input type="text" class="form-control" id="inputCity" name="requestercity">
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">State</label>
        <input type="text" class="form-control" id="inputState" name="requesterstate">
      </div>
      <div class="form-group col-md-2">
        <label for="inputZip">Zip</label>
        <input type="text" class="form-control" id="inputZip" name="requesterzip" onkeypress="isInputNumber(event)">
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail">Email</label>
        <input type="email" class="form-control" id="inputEmail" name="requesteremail">
      </div>
      <div class="form-group col-md-2">
        <label for="inputMobile">Mobile</label>
        <input type="text" class="form-control" id="inputMobile" name="requestermobile" onkeypress="isInputNumber(event)">
      </div>
      <div class="form-group col-md-2">
        <label for="inputDate">Date</label>
        <input type="date" class="form-control" id="inputDate" name="requestdate">
      </div>
    </div>

    <button type="submit" class="btn btn-danger" name="submitrequest">Submit</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
  </form>
  <!-- below msg display if required fill missing or form submitted success or failed -->
  <?php if (isset($msg)) {
    echo $msg;
  } ?>
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