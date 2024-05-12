<?php
require_once('database.php');

class DataTable  extends Database{
    private $db;

    public function __construct(){

        $this->db = new Database();
    }

    public function getData() {
        // $connection = $this->db->getConnection();
        $query = "SELECT * FROM user_details";
        $res = $this->db->query($qr);

        // $result = $connection->query($query);

        $data = array();
        while ($row = $res->fetch_assoc()) {
            $data[] = $row;
        }
print_r($data);
        return $data;
    }
}
?>
