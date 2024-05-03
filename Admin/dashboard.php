<?php
define('TITLE', 'Dashboard');
define('PAGE', 'dashboard');
include('includes/header.php');
include('../dbConnection.php');
session_start();
$ob = new database();
    if (empty($_SESSION['email'])) {
        header("Location: login.php");
    }
    $ob->select("submitrequest_tb", "request_id");
    $result = $ob->get_result();
    foreach ($result as list("request_id" => $Requests)) {
    }

    $ob->select("assignwork_tb", "request_id");
    $result = $ob->get_result();
    foreach ($result as list("request_id" => $Work)) {
    }

    $ob->select("technician_tb", "COUNT(empid)");
    $result = $ob->get_result();
    foreach ($result as list("COUNT(empid)" => $Technician)) {
    }

    $ob->select("customer_tb", "SUM(cptotal)");
    $result = $ob->get_result();
    foreach ($result as list("SUM(cptotal)" => $sell)) {
    }

    
    $ob->select("customer_tb", "SUM(cptotal)", " cpdate >= SUBDATE(CURDATE(), INTERVAL 30 DAY)");
    $result = $ob->get_result();
    foreach ($result as list("SUM(cptotal)" => $month)) {
    }

    $ob->select("assets_tb", "SUM(pava)");
    $result = $ob->get_result();
    foreach ($result as list("SUM(pava)" => $product)) {
    }
?>
<div class="col-sm-9 col-md-10">
    <div class="row mx-5 text-center">
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header">Requests Received</div>
                <div class="card-body">
                    <h4 class="card-title">
                        <?php 
                        if ( isset($Requests) ) {
                            echo $Requests;
                        }else{
                            echo "Empty Requests Received";
                        }
                         ?>
                    </h4>
                    <a class="btn text-white" href="request.php">View</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">Assigned Work</div>
                <div class="card-body">
                    <h4 class="card-title">
                    <?php 
                        if ( isset($Work) ) {
                            echo $Work;
                        }else{
                            echo "Empty Assigned Work";
                        }
                    ?>
                        
                    </h4>
                    <a class="btn text-white" href="work.php">View</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header">No. of Technician</div>
                <div class="card-body">
                    <h4 class="card-title">
                        <?php 
                        if ( isset($Technician) ) {
                            echo $Technician;
                        }else{
                            echo "Empty No. of Technician";
                        }
                        ?>
                    </h4>
                    <a class="btn text-white" href="technician.php">View</a>
                </div>
            </div>
        </div>
    </div>
    <!-- 2nd row start -->
    <div class="row mx-5 text-center">
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header">Total Product sell</div>
                <div class="card-body">
                    <h4 class="card-title">
                        <?php 

                        if ( isset($sell) ) {
                            echo $sell . " Taka";
                        }else{
                            echo "Empty Requests Received";
                        }
                         ?>
                    </h4>
                    <a class="btn text-white" href="request.php">View</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header">Last mounth sell</div>
                <div class="card-body">
                    <h4 class="card-title">
                    <?php 
                        if ( isset($month) ) {
                            echo $month . " Taka";
                        }else{
                            echo "Empty Assigned Work";
                        }
                    ?>
                        
                    </h4>
                    <a class="btn text-white" href="work.php">View</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">Total product</div>
                <div class="card-body">
                    <h4 class="card-title">
                        <?php 
                        if ( isset($product) ) {
                            echo $product;
                        }else{
                            echo "Empty No. of Technician";
                        }
                        ?>
                    </h4>
                    <a class="btn text-white" href="technician.php">View</a>
                </div>
            </div>
        </div>
    </div>
    
</div>
<?php
include('includes/footer.php');
?>
