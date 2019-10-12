<?php
    if(isset($_GET['search-btn'])){
        $search = $_GET["search"];
        $sql = "SELECT * FROM emp_record WHERE emp_name=:Search OR emp_ssn=:Search";
        $stmt = $connectDB->prepare($sql);
        $stmt->bindValue(':Search', $search);
        $stmt->execute();

        while($searchRows = $stmt->fetch()){
            $id      = $searchRows["emp_id"];
            $name    = $searchRows["emp_name"];
            $ssn     = $searchRows["emp_ssn"];
            $dept    = $searchRows["emp_dept"];
            $salary  = $searchRows["emp_salary"];
            $address = $searchRows["emp_address"];
        ?>
        <hr>
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
            </tbody>                    
        </table>
        <?php
        }
    }
?>