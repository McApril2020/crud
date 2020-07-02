<?php

require_once('./connection/dbconnection.php');
$db = new Crudoperation();
$result = $db->viewData();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title>View Data</title>
</head>
<body>

<div class="text-center text-dark">
    <h2>User List</h2>
        <?php 
            $db->displayMsg(); 
            $db->displayMsg();
        ?>
        <table class="table table-striped">
            <tr>
                <td>ID</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>User Name</td>
                <td>Email</td>
                <td></td>
                <td></td>
            </tr>
             
            <tr>           
                <?php while($data = mysqli_fetch_assoc($result)) { ?>
                
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['firstname']; ?></td>
                    <td><?php echo $data['lastname']; ?></td>
                    <td><?php echo $data['username']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><a href="edit.php?U_ID=<?php echo $data['id'];?>" class="btn btn-success">Edit</a></td>
                    <td><a href="delete.php?D_ID=<?php echo $data['id'];?>" class="btn btn-danger">Delete</a></td>
             </tr>       
                <?php } ?>
        </table>
</div>
</body>
</html>
