<?php   

    session_start();
    require_once('./connection/dbconnection.php');
    $db = new Dbconnection();

    Class Crudoperation extends Dbconnection{

        //Saving data into database function
        public function saveData() {

            global $db;
            if(isset($_POST['submit'])){
                $FirstName = $db->checkData($_POST['firstname']);
                $LastName = $db->checkData($_POST['lastname']);
                $UserName = $db->checkData($_POST['username']);
                $Email = $db->checkData($_POST['email']);

                if($this->insertData($FirstName,$LastName,$UserName,$Email)) {
                    echo '<div class="alert alert-success">Success</div>';
                    header('location:view.php');
                } else {
                    echo '<div class="alert alert-danger">Failed</div>';
                }
            }
        }

        function insertData($a, $b, $c, $d) {


            global $db;
            $query = "INSERT INTO crud (firstname,lastname,username,email) values('$a', '$b', '$c', '$d')";
            $result = mysqli_query($db->connection, $query);
            return $result;
            // if($result) {
            //     return true;
            // } else {
            //     return false;
            // }
        }

        //viewing database records
        public function viewData() {

            global $db;
            $queries = "SELECT * FROM crud";
            $result = mysqli_query($db->connection, $queries);
            return $result;
        }

        //update saved data
        public function updateData($id){
            global $db;
            $queries = "SELECT * FROM crud WHERE id='$id'";
            $result = mysqli_query($db->connection, $queries);
            return $result;
        }

        //update saved data
        public function updateAndSave(){
            global $db;

            if(isset($_POST['update'])) {
                $ID = $_POST['id'];
                $FirstName = $db->checkData($_POST['firstname']);
                $LastName = $db->checkData($_POST['lastname']);
                $UserName = $db->checkData($_POST['username']);
                $Email = $db->checkData($_POST['email']);

                if($this->displayData($ID,$FirstName,$LastName,$UserName,$Email)) {
                    $this->sessionMsg('<div class="alert alert-success">Data has been Updated</div>');
                    header("location:view.php");
                } else {
                    $this->sessionMsg('<div class="alert alert-danger">Data has not been update</div>');
                }

            }
        }

        //update, save and display data
        public function displayData($id, $firstname, $lastname, $username, $email) {
            global $db;
            $queries = "UPDATE crud SET firstname='$firstname', lastname='$lastname', username='$username', email='$email' WHERE id='$id'";
            $result = mysqli_query($db->connection, $queries);
            return $result;
            // if($result) {
            //     return true;
            // } else {
            //     return false;
            // }

        }

        //Session message
        public function sessionMsg($msg) {
             if(!empty($msg)) {
                 $_SESSION['Message'] = $msg;

             } else {
                 $msg = "";
             }
        }

        //display message
        public function displayMsg() {
            if(isset($_SESSION['Message'])) {
                echo $_SESSION['Message'];
                unset($_SESSION['Message']);
            }
        }

        //deleting saved data
        public function deleteData($id) {
            global $db;
            $queries = "DELETE FROM crud WHERE id='$id'";
            $result = mysqli_query($db->connection, $queries);
            
            if($result) {
                return true;
            } else {
                return false;
            }
        }

    
    }

?>