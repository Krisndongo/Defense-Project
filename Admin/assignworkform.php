<?php

$ob = new database();
if (empty($_SESSION['email'])) {
    header("Location: login.php");
}
if (isset($_POST['view'])) {
    $ob->select("submitrequest_tb", "*", "request_id = '{$_REQUEST['id']}'");
    $result = $ob->get_result();
    foreach ($result as $row) {
    }
}

//  Assign work Order Request Data going to submit and save on db assignwork_tb table
if (isset($_POST['assign'])) {
    // Assigning User Values to Variable
    $rid = $_POST['request_id'];
    $rinfo = $_POST['request_info'];
    $rdesc = $_POST['requestdesc'];
    $rname = $_POST['requestername'];
    $radd1 = $_POST['address1'];
    $radd2 = $_POST['address2'];
    $rcity = $_POST['requestercity'];
    $rstate = $_POST['requesterstate'];
    $rzip = $_POST['requesterzip'];
    $remail = $_POST['requesteremail'];
    $rmobile = $_POST['requestermobile'];
    $rassigntech = $_POST['assigntech'];
    $rdate = $_POST['inputdate'];
    $value = ["request_id" => $rid, "request_info" => $rinfo, "request_desc" => $rdesc, "requester_name" => $rname, "requester_add1" => $radd1, "requester_add2" => $radd2, "requester_city" => $rcity, "requester_state" => $rstate, "requester_zip" => $rzip, "requester_email" => $remail, "requester_mobile" => $rmobile, "assign_tech" => $rassigntech, "assign_date" => $rdate,];
    $ob->insert("assignwork_tb", $value);
    $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Work Assigned Successfully </div>';
}

// Assign work Order Request Data going to submit and save on db assignwork_tb table [END]
?>
<div class="col-sm-5 mt-5 jumbotron">
    <!-- Main Content area Start Last -->
    <form action="" method="POST">
        <h5 class="text-center">Assign Work Order Request</h5>
        <div class="form-group">
            <label for="request_id">Request ID</label>
            <input type="text" class="form-control" id="request_id" name="request_id" value="<?php if (isset($row['request_id'])) {
                                                                                                    echo $row['request_id'];
                                                                                                } ?>" readonly required>
        </div>
        <div class="form-group">
            <label for="request_info">Request Info</label>
            <input type="text" class="form-control" id="request_info" name="request_info" value="<?php if (isset($row['request_info'])) {
                                                                                                        echo $row['request_info'];
                                                                                                    } ?>" required>
        </div>
        <div class="form-group">
            <label for="requestdesc">Description</label>
            <input type="text" class="form-control" id="requestdesc" name="requestdesc" value="<?php if (isset($row['request_desc'])) {
                                                                                                    echo $row['request_desc'];
                                                                                                } ?>" required>
        </div>
        <div class="form-group">
            <label for="requestername">Name</label>
            <input type="text" class="form-control" id="requestername" name="requestername" value="<?php if (isset($row['requester_name'])) {
                                                                                                        echo $row['requester_name'];
                                                                                                    } ?>" required>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="address1">Address Line 1</label>
                <input type="text" class="form-control" id="address1" name="address1" value="<?php if (isset($row['requester_add1'])) {
                                                                                                    echo $row['requester_add1'];
                                                                                                } ?>" required>
            </div>
            <div class="form-group col-md-6">
                <label for="address2">Address Line 2</label>
                <input type="text" class="form-control" id="address2" name="address2" value="<?php if (isset($row['requester_add2'])) {
                                                                                                    echo $row['requester_add2'];
                                                                                                } ?>" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="requestercity">City</label>
                <input type="text" class="form-control" id="requestercity" name="requestercity" value="<?php if (isset($row['requester_city'])) {
                                                                                                            echo $row['requester_city'];
                                                                                                        } ?>" required>
            </div>
            <div class="form-group col-md-4">
                <label for="requesterstate">State</label>
                <input type="text" class="form-control" id="requesterstate" name="requesterstate" value="<?php if (isset($row['requester_state'])) {
                                                                                                                echo $row['requester_state'];
                                                                                                            } ?>" required>
            </div>
            <div class="form-group col-md-4">
                <label for="requesterzip">Zip</label>
                <input type="text" class="form-control" id="requesterzip" name="requesterzip" value="<?php if (isset($row['requester_zip'])) {
                                                                                                            echo $row['requester_zip'];
                                                                                                        } ?>" onkeypress="isInputNumber(event)" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="requesteremail">Email</label>
                <input type="email" class="form-control" id="requesteremail" name="requesteremail" value="<?php if (isset($row['requester_email'])) {
                                                                                                                echo $row['requester_email'];
                                                                                                            } ?>" required>
            </div>
            <div class="form-group col-md-4">
                <label for="requestermobile">Mobile</label>
                <input type="text" class="form-control" id="requestermobile" name="requestermobile" value="<?php if (isset($row['requester_mobile'])) {
                                                                                                                echo $row['requester_mobile'];
                                                                                                            } ?>" onkeypress="isInputNumber(event)" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="assigntech">Assign to Technician</label>
                <select class="form-control" name="assigntech" id="assigntech">
                    <option value="">Select Technician</option>
                    <?php
                    $ob->select("technician_tb", "*");
                    $tecn_tb = $ob->get_result();
                    foreach ($tecn_tb as $tec) { ?>
                        <option value="<?php echo $tec['empid'] ?>"><?php echo $tec['empName'] ?></option>
                    <?php  } ?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="inputDate">Date</label>
                <input type="date" class="form-control" id="inputDate" name="inputdate">
            </div>
        </div>
        <div class="float-right">
            <button type="submit" class="btn btn-success" name="assign">Assign</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
    </form>
    <!-- below msg display if required fill missing or form submitted success or failed -->
    <?php if (isset($msg)) {
        echo $msg;
    } ?>
</div> <!-- Main Content area End Last -->

<!-- Only Number for input fields -->
<script>
    function isInputNumber(evt) {
        var ch = String.fromCharCode(evt.which);
        if (!(/[0-9]/.test(ch))) {
            evt.preventDefault();
        }
    }
</script>