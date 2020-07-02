<?php  

    
    require_once('./connection/crudoperation.php');

    Class Dbconnection {

        public $connection;
        public function __construct() {
            $this->db_connection();
        }

        
        public function db_connection() {

            $this->connection = mysqli_connect('localhost', 'root', '', 'crud');
            if(mysqli_connect_error()) {
                die('Connection Failed');
            }
        }

        public function checkData($para1){
            $result = mysqli_real_escape_string($this->connection,$para1);
            return $result;
        }


    }

   
?>