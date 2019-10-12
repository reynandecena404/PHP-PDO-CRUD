<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP CRUD - Update Employee Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>    
    <div class="container mx-auto">
        <?php
            include 'process/update.php';
        ?>
        <div class="card mt-3 border-success">
            <div class="card-header bg-success text-white font-weight-bold">
                UPDATE EMPLOYEE RECORD
            </div>
            <div class="card-body">                
                <?php
                    $sql = "SELECT * FROM emp_record WHERE emp_id='$queryID'";
                    $stmt = $connectDB->query($sql);
                    while($row=$stmt->fetch()){
                        $id = $row["emp_id"];
                        $name = $row["emp_name"];
                        $ssn = $row["emp_ssn"];
                        $dept = $row["emp_dept"];
                        $salary = $row["emp_salary"];
                        $address = $row["emp_address"];
                    }
                ?>
                <form action="update.php?id=<?php echo $queryID; ?>" method="POST">
                    <div class="form-group">
                        <label for="empName">Employee Name</label>
                        <input type="text" class="form-control" id="empName" name="empName" value="<?php echo $name;?>">
                    </div>
                    <div class="form-group">
                        <label for="ssNumber">Social Security Number</label>
                        <input type="text" class="form-control" id="ssNumber" name="ssNumber" value="<?php echo $ssn;?>">
                    </div>
                    <div class="form-group">
                        <label for="dept">Department</label>
                        <input type="text" class="form-control" id="dept" name="dept" value="<?php echo $dept;?>">
                    </div>
                    <div class="form-group">
                        <label for="salary">Salary</label>
                        <input type="text" class="form-control" id="salary" name="salary" value="<?php echo $salary;?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Home Address</label>
                        <textarea class="form-control" name="address" id="address" cols="3" rows="3"><?php echo $address;?></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-info btn-sm">Update Record</button>
                        <a href="viewData.php" class="btn btn-secondary btn-sm">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>