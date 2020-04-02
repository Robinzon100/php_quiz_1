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

    function insertUserAndScore($username, $score, $passed){
        // $stmt = $this->conn->prepare("INSERT INTO `users`(`username`, `score`) VALUES (".$username.",".$score.")");
        // $stmt->bindParam(':username', $username);
        // $stmt->bindParam(':score', $score);
        // $stmt->execute();

        $stmt = $this->conn->prepare("INSERT INTO `users`(`username`, `score`, `passed`) VALUES (:username,:score,:passed)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':score', $score);
        $stmt->bindParam(':passed', $passed);
        
        $stmt->execute();
        echo "warmatebit chaabare dzmobilo";

    }
}


?>



<?php 

$query = new Queries();
if (isset($_POST['username'])) {
    $query->insertUserAndScore($_POST['username'], $_POST['score'], 1);
}



?>