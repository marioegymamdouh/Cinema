<?php
namespace model;

use PDO;

class hall{

    // constructor to share the variable that holds the connection
    function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    // create new hall by name and number of seats
    function create($name, $seats){
        $stmt = $this->conn->prepare("INSERT INTO halls (name, seats) VALUES (:name, :seats)");
        $stmt->execute(['name' => $name, 'seats' => $seats]);
    }

    // update hall by id
    function update($id, $name, $seats){
        $stmt = $this->conn->prepare("UPDATE halls SET name = :name, seats = :seats WHERE id = :id");
        $stmt->execute(['id' => $id, 'name' => $name, 'seats' => $seats]);
    }

    // delete hall
    function delete($id){
        $stmt = $this->conn->prepare("DELETE FROM halls WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }

    // show single hall or all halls
    // if id = 0 it returns all
    function show($id = 0){
        if (!$id) {
            $stmt = $this->conn->prepare("SELECT * FROM halls");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        else {
            $stmt = $this->conn->prepare("SELECT * FROM halls WHERE id = :id");
            $stmt->execute(['id' => $id]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

}