<?php 
class Database{

    protected $server_name;
        protected $user_name;
        protected $password;
        protected $db_name;
        protected $conn;

    protected $db;


    public function __construct(){
        
         $this->server_name = "localhost";
         $this->user_name = "root";
         $this->password = "";
         $this->db_name = "smg_demo_app";


            $this->conn = new mysqli($this->server_name,$this->user_name,$this->password,$this->db_name);
        
            if($conn->connect_error){
                print "Error:Connection failed";
            }
    }

    public function insertData($qr){
       
        $res = $this->conn->query($qr);
      
        if(!$res){            
            die("Error inserting user details: " );
        }
        return $res;
    }

    public function selectCount($qr){
        $count = 0;
        $res = mysqli_query($this->conn,$qr);
        $count = mysqli_num_rows($res);
      
        return $count;
    }
}
?>