<?php
    require_once("include/db.php");
    $queryID = $_GET["id"];

    if(isset($_POST['submit'])){
        $empName = $_POST['empName'];
        $ssNumber = $_POST['ssNumber'];
        $dept = $_POST['dept'];
        $salary = $_POST['salary'];
        $address = $_POST['address'];

        $sql = "DELETE FROM emp_record WHERE emp_id = '$queryID'";                    
        $stmt = $connectDB->query($sql);

        if($stmt){
            echo '<script> window.open ("viewData.php?messageId=Record successfully deleted!","_self")</script>';
        }
    }
?>