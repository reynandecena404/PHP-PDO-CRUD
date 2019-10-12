<?php
    require_once ('include/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP CRUD - View Employee Records</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
</head>
<style>
    .visible{
        display:block;
    }
    .hidden{
        display:none;
    }
</style>
<body>    
    <div class="container mx-auto">
        <div class="card mt-3 border-success">
            <div class="card-header bg-success text-white font-weight-bold">
                VIEW EMPLOYEE RECORD
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <a href="index.php" class="btn btn-primary btn-sm">Add Employee Record</a>
                    </div>
                    <div class="col-md-6">
                        <form action="viewData.php" method="GET" class="form-inline float-right">
                            <div class="form-group mx-sm-3 mb-2">
                                <input type="text" class="form-control" name="search" id="search" value="" placeholder="Search by Name or SSN">
                            </div>
                            <button type="submit" name="search-btn" class="btn btn-dark mb-2">Search record</button>
                        </form>
                    </div>
                </div>
                <?php
                    include 'process/search.php';
                ?>
                <hr>
                <div class="alert alert-primary <?php if  (@$_GET["messageId"]) {echo 'visible'; }else{ echo 'hidden'; }?>" role="alert">
                    <?php echo @$_GET["messageId"] ?>
                </div>
                <table class="table table-striped table-dark table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">SS Number</th>
                            <th scope="col">Department</th>
                            <th scope="col">Salary</th>
                            <th scope="col">Address</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM emp_record";
                            $stmt = $connectDB->query($sql);
                            while ($row=$stmt->fetch()){
                                $id      = $row["emp_id"];
                                $name    = $row["emp_name"];
                                $ssn     = $row["emp_ssn"];
                                $dept    = $row["emp_dept"];
                                $salary  = $row["emp_salary"];
                                $address = $row["emp_address"];
                        ?>
                        <tr>
                            <th scope="row"><?php echo $id; ?></th>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $ssn; ?></td>
                            <td><?php echo $dept; ?></td>
                            <td><?php echo $salary; ?></td>
                            <td><?php echo $address; ?></td>
                            <td>
                                <a href="update.php?id=<?php echo $id; ?>" class="btn btn-warning btn-sm text-white"  data-toggle="tooltip" data-placement="bottom" title="Edit Record"><i class="fa fa-pencil"></i></a>
                                <a href="delete.php?id=<?php echo $id; ?>" class="btn btn-danger btn-sm"  data-toggle="tooltip" data-placement="bottom" title="Delete Record"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>                    
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
</body>
</html>