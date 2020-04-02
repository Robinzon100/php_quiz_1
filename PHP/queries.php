<?php

include "db.php";


// $json = file_get_contents('php://input');
// $data = json_decode($json);

// echo $data["selcted"];




class Queries{
    public $conn;
    
    function __construct(){
        $db = new DB();
        $this->conn = $db->connection();
    }


    function getAllQuestions(){
        $stmt = $this->conn->prepare('SELECT * FROM tests');
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }


    function checkAnsware($answareId){
        $stmt = $this->conn->prepare('SELECT * FROM tests WHERE correct_answare=:answareId');
        $stmt->bindParam(":answareId", $answareId);
        $stmt->execute();
        $data = $stmt->fetchAll();
        echo $data;
        print_r($data);
        return $data;
    }

    function insertUserAndScore($username, $score){
        $stmt = $this->conn->prepare("INSERT INTO `users`(`username`, `score`) VALUES (:username,:Score)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':score', $score);
        $stmt->execute();
    }
}


?>



<?php 

$query = new Queries();
if (isset($_POST['username'])) {
    echo "xellllp";
    $query->insertUserAndScore($_POST['selcted']);
}



?>