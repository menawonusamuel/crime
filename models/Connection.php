<?php


     /**public
     * 
     */
    class Connection
    {
        private $username="root";
        private $password="";
        private $server="localhost";
        protected $conn;
        public function __construct()
        {
            
            $this->open_connection();            
        }

        public function open_connection(){
            //creating connection to database
            $this->conn= new mysqli($this->server, $this->username, $this->password);
                 if($this->conn->connect_error){
                echo "Database Connection failed" . $this->conn->connect_error;
            }
           //selecting database
            $db=mysqli_select_db($this->conn, "crime");
            $this->is_not($db);
        }
        public function getAllCases(){     
            return $this->getBySql("SELECT * FROM case_types");
        }

        public function getAllCasesById($id){     
        return $this->getBySql("SELECT * FROM case_types WHERE case_types_id = {$id}");
        }

        public function getAllLocalCommands(){     
            $commands = $this->getBySql("SELECT * FROM police_command_areas");
            if(mysqli_num_rows($commands) > 0) {
                return $commands;
            }else{
                return false;
            }
        }
        public function getAllLocalCommandsById($id){ 
         
        $commands = $this->getBySql("SELECT * FROM police_command_areas WHERE command_id = '$id'");
                return $commands;
            
        }
        
        
        public function getAllDepartments(){     
            $depts = $this->getBySql("SELECT * FROM police_department");
            if (mysqli_num_rows($depts) > 0) {
                return $depts;
            }else{
                return false;
            }
        }

        public function getAllDepartmentsById($id){  
            
            $depts = $this->getBySql("SELECT * FROM police_department WHERE department_id = '$id'");
                return $depts;
        }

        public function getAllPoliceById($id){  
            $polices = $this->getBySql("SELECT * FROM police WHERE police_id = '$id'");
                return $polices;
        }

        public function getAllPolice(){     
            $polices = $this->getBySql("SELECT * FROM police");
            if (mysqli_num_rows($polices) > 0) {
                return $polices;
            }else{
                return false;
            }
        }

        public function getAllCrimeFiles(){     
            $crime_files = $this->getBySql("SELECT * FROM reporter_files");
            if (mysqli_num_rows($crime_files) > 0) {
                return $crime_files;
            }else{
                return false;
            }
        }

        public function getAllCrimeFilesById($id){     
            $crime_file = $this->getBySql(
                "SELECT * FROM reporter_files 
                WHERE crime_id = {$this->id}");
            if (mysqli_num_rows($crime_file) > 0) {
                return $crime_file;
            }else{
                return false;
            }
        }

        
        //function to get sql
        public function getBySql($sql=""){     
            $crime_file = $this->conn->query($sql);
            $this->is_not($crime_file);
            return $crime_file;
        }
        //checking if there records present in the database
        public function getNumOfRows($sql){     
            if(mysqli_num_rows($sql) > 0) {
                return $sql;
            }
            else{
                return "";
            }
        }
        //query function
        public function query($sql){
           $query= mysqli_query($this->conn, $sql);
           $this->is_not($query);
        }

        public function prepare($sql){
            mysqli_prepare($this->conn, $sql);
        }

         public function close(){
            mysqli_close($this->conn);
        }

        public function getLastId(){
           $id= $this->conn->insert_id;
           $this->is_not($id);
           return $id;
        }

        public function escape_value($value)
        {
          $value = mysqli_real_escape_string($this->conn, $value);
          return $value;
        }

        //if its doesn't satisfy the condition
        protected function is_not($connection){
            if(!$connection){
                die('Query failed '. $this->conn->error);
            } 
        }
    }
       
$conn = new Connection();
//return $conn;
   



?>