<?php

    require_once('./connection/dbconnection.php');
    $db = new Crudoperation();
    $db->updateAndSave();
    $id = $_GET['U_ID'];
    $result = $db->updateData($id);
    $query = mysqli_fetch_assoc($result);
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title>Edit Data</title>
</head>
<body>


<?php echo $db->saveData(); ?>
    <div class="text-center text-dark">

        <form action="" method="POST">
                <table class="table table-striped">
                    <tr>
                        <h2>Update Data</h2>
                    </tr>
                    <tr>                    
                        <td><input type="hidden" name="id" class="form-control" required value="<?php echo $query['id']; ?>"> </td>
                    </tr>
                    <tr>
                        <td>First Name</td>
                        <td><input type="text" name="firstname" class="form-control" required value="<?php echo $query['firstname']; ?>"> </td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td><input type="text" name="lastname" class="form-control" required value="<?php echo $query['lastname']; ?>"> </td>
                    </tr>
                    <tr>
                        <td>User Name</td>
                        <td><input type="text" name="username" class="form-control" required value="<?php echo $query['username']; ?>"> </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="email" class="form-control" required value="<?php echo $query['email']; ?>"> </td>
                    </tr>
                        <td><input type="submit" name="update" value="Update" class="btn btn-success"></td>
                    </tr>                  
                </table>
            </form>
    </div>
</body>
</html>