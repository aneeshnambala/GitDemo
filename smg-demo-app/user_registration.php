<?php
include 'database.php';
class User extends Database{

    private $allowed_file_types = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
    private $profilePicDir = "storage/profile_pictures/";


    public function __construct(){

        $this->db = new Database();


        //Get client's IP address
        $this->ip = gethostbyaddr($_SERVER["REMOTE_ADDR"]); //'127.0.0.1';
    }

    public function uploadProfilePic(){
        if(isset($_FILES['profile_pic']) && $_FILES['profile_pic ']['error'] == 0){
        echo "Uploading profile picture";

        //Checking for allowed image type
        if(in_array($_FILES["profile_pic"]["type"],$this->allowed_file_types)){
            echo "<br />type";
            $file_name = uniqid().'-'.$_FILE['profile_pic']["name"];

            echo "name==>".$_FILES['profile_pic']["name"];
            $this->validateImage($_FILES['profile_pic']["name"]);
            echo "path==>".$file_path = $this->profilePicDir.$file_name;
            if(move_uploaded_file($_FILES['profile_pic']['tmp_name'],$file_path)){
                echo "File Uploaded Successfully";
            }
        }
        else{
            echo "Invalid File type, allowed file format: jpg, png, gif";
        }
    }
        echo "HERE";
        die();
    }

    public function validateImage($file_name){
        echo $qr = "SELECT * FROM user_details WHERE ip='$this->ip' AND profile_pic='$file_name'";
        echo "HEEEEEREE".$res = $this->db->selectCount($qr);
    }

    public function saveUserDetails($full_name, $about_me,$profile_pic){
        
        $qr = "INSERT INTO user_details (full_name, about_me, profile_pic,ip) VALUES('$full_name', '$about_me','$profile_pic','$this->ip')";
        
        $res = $this->db->insertData($qr);
        return $res;

    }
}

    //Instance of User class
    $user = new User();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
print_r($_FILES);
            //Validate and sanitize user input
            $full_name = filter_var($_POST['full_name'], FILTER_SANITIZE_STRING);
            $about_me = filter_var($_POST['about_me'], FILTER_SANITIZE_STRING);
            $profile_pic =  filter_var($_POST['profile_pic'], FILTER_SANITIZE_STRING);

            if($_FILES){
                echo "<br />inside";
                $user->uploadProfilePic();
            }

            $res = $user->saveUserDetails($full_name, $about_me,$profile_pic);
            if($res){
                // alert("User details saved");

            }
        }
?>