<?php 

    require_once('./connection/dbconnection.php');
    $db = new Crudoperation();
    
    
    if(isset($_GET['D_ID'])) {

        global $db;
        $ID = $_GET['D_ID'];
            if($db->deleteData($ID)) {
                $db->sessionMsg('<div class="alert alert-danger">Data has been deleted!</div>');  
                header("location:view.php");
            } else {
                $db->sessionMsg('<div class="alert alert-success">Failed to delete selected file</div>');
            }
    }
?>