<?php
    require_once("include/db.php");

    if(isset($_POST['submit'])){
        if(!empty($_POST['empName']) && !empty($_POST['ssNumber'])){
            $empName = $_POST['empName'];
            $ssNumber = $_POST['ssNumber'];
            $dept = $_POST['dept'];
            $salary = $_POST['salary'];
            $address = $_POST['address'];

            $sql = "INSERT INTO emp_record(emp_name,emp_ssn,emp_dept,emp_salary,emp_address)
                    VALUES(:empName,:empSSN,:empDept,:empSalary,:empAddress)";                    
            $stmt = $connectDB->prepare($sql);
            $stmt->bindValue('empName',$empName);
            $stmt->bindValue('empSSN',$ssNumber);
            $stmt->bindValue('empDept',$dept);
            $stmt->bindValue('empSalary',$salary);
            $stmt->bindValue('empAddress',$address);
            $execute = $stmt->execute();

            if($execute){
                echo " <div class='alert alert-success mt-4' role='alert'>
                        Record successfully added!
                        </div> ";
            }
        }else{
            echo " <div class='alert alert-danger mt-4' role='alert'>
                        Please add atleast the Employee Name and Social Security Number!
                    </div> ";
        }
    }
?>