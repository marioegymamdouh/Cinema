<?php
namespace model;

use PDO;

class duration{

    // constructor to share the variable that holds the connection
    function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    // returns all durations
    function show (){
        $stmt = $this->conn->prepare("SELECT * FROM durations");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}
