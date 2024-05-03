<?php
define('TITLE', 'Requests');
define('PAGE', 'request');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
$ob = new database();
if (empty($_SESSION['email'])) {
    header("Location: login.php");
}
	echo '<div class="col-sm-4 mb-5">';
	if($ob->num_check( "submitrequest_tb","request_id, request_info, request_desc, request_date") == true){
		$result = $ob->get_result();
		foreach ($result as $results){
		echo '<div class="card mt-5 mx-5">';
		echo '<div class="card-header">';
		echo 'Request ID : '. $results['request_id'];
		echo '</div>';
		echo '<div class="card-body">';
		echo '<h5 class="card-title">Request Info : ' . $results['request_info'] . '</h5>';
		echo '<p class="card-text">' . $results['request_desc'] . '</p>';
		echo '<p class="card-text">Request Date: ' . $results['request_date'] . '</p>';
		echo '<div class="float-right">';
		echo '<form action="" method="POST"> <input type="hidden" name="id" value='. $results["request_id"] .'><input type="submit" class="btn btn-danger mr-3" name="view" value="View"><input type="submit" class="btn btn-secondary" name="close" value="Close"></form>';
		echo '</div>' ;
		echo '</div>' ;
		echo'</div>';
		}
	} else {
	echo '<div class="alert alert-info mt-5 col-sm-6" role="alert">
	<h4 class="alert-heading">Well done!</h4>
	<p>Aww yeah, you successfully assigned all Requests.</p>
	<hr>
	<h5 class="mb-0">No Pending Requests</h5>
	</div>';
	}

	//after assigning work we will delete data from submitrequesttable by pressing close button
	if(isset($_REQUEST['close'])){
		
		if($ob->delete("submitrequest_tb","request_id = {$_REQUEST['id']}") == TRUE){
		echo '<meta http-equiv="refresh" content= "0;URL=?closed" />';
		} else {
		echo "Unable to Delete Data";
		}
	}
echo '</div>';
include('assignworkform.php');
include('includes/footer.php'); 
?>
