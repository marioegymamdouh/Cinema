<?php
namespace model;

use PDO;

class movie{

    // constructor to share the variable that holds the connection
    function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    // create new movie by name
    function create($name){
        $stmt = $this->conn->prepare("INSERT INTO movies (name) VALUES (:name)");
        $stmt->execute(['name' => $name]);
    }

    // update movie by id
    function update($id,$name){
        $stmt = $this->conn->prepare("UPDATE movies SET name = :name WHERE id = :ID");
        $stmt->execute(['name' => $name, 'ID' => $id]);
    }

    // delete movie
    function delete($id){
        $stmt = $this->conn->prepare("DELETE FROM movies WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }

    // show single movie or all movies
    // if id = 0 it returns all
    function show($id = 0){

        if (!$id) {
            $stmt = $this->conn->prepare("SELECT * FROM movies");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        else {
            $stmt = $this->conn->prepare("SELECT * FROM movies WHERE id = :id");
            $stmt->execute(['id' => $id]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

}