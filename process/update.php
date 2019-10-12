<?php
    require_once("include/db.php");
    $queryID = $_GET["id"];

    if(isset($_POST['submit'])){
        $empName = $_POST['empName'];
        $ssNumber = $_POST['ssNumber'];
        $dept = $_POST['dept'];
        $salary = $_POST['salary'];
        $address = $_POST['address'];

        $sql = "UPDATE emp_record SET emp_name='$empName',emp_ssn='$ssNumber',emp_dept='$dept',emp_salary='$salary',emp_address='$address' WHERE emp_id = '$queryID'";                    
        $stmt = $connectDB->query($sql);

        if($stmt){
            echo '<script> window.open ("viewData.php?messageId=Record successfully updated!","_self")</script>';
        }
    }
?>