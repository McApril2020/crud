<?php

    require_once('./connection/dbconnection.php');
    $db = new Crudoperation();
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title>CRUD OOP</title>
</head>
<body>


<?php echo $db->saveData(); ?>
    <div class="text-center text-dark">

        <form method="POST">
                <table class="table table-striped">
                    <tr>
                        <h2>Create Account</h2>
                    </tr>
                    <tr>
                        <td>First Name</td>
                        <td><input type="text" name="firstname" class="form-control" required> </td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td><input type="text" name="lastname" class="form-control" required> </td>
                    </tr>
                    <tr>
                        <td>User Name</td>
                        <td><input type="text" name="username" class="form-control" required> </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="email" class="form-control" required> </td>
                    </tr>
                        <td><input type="submit" name="submit" value="Submit" class="btn btn-success"></td>
                    </tr>                  
                </table>
            </form>
    </div>
</body>
</html>