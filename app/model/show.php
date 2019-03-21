<?php
namespace model;

use PDO;

class show{

    // constructor to share the variable that holds the connection
    function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    // create new show by name and number of seats
    function create($duration, $hall){
        $stmt = $this->conn->prepare("INSERT INTO shows (duration, hall) VALUES (:duration, :hall)");
        $stmt->execute(['duration' => $duration, 'hall' => $hall]);
    }

    // update show by id
    function update($id, $hall, $duration){
        $stmt = $this->conn->prepare("UPDATE shows SET duration = :duration, hall = :hall WHERE id = :id");
        $stmt->execute(['duration' => $duration, 'hall' => $hall, 'id' => $id]);
    }

    // delete show
    function delete($id){
        $stmt = $this->conn->prepare("DELETE FROM shows WHERE id = :ID");
        $stmt->execute(['ID' => $id]);
    }

    // show single show or all shows
    // if id = 0 it returns all
    // inner join to show halls names and durations
    function show($id = 0){

        if (!$id) {
            $stmt = $this->conn->prepare("SELECT shows.id, halls.name, durations.duration FROM shows
                                                    INNER JOIN halls ON shows.hall = halls.id
                                                    INNER JOIN durations ON shows.duration = durations.id
                                                    ORDER BY shows.id");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        else {
            $stmt = $this->conn->prepare("SELECT shows.id, shows.hall AS hallId, shows.duration AS durationId,
                                                    halls.name, durations.duration FROM shows
                                                    INNER JOIN halls ON shows.hall = halls.id
                                                    INNER JOIN durations ON shows.duration = durations.id 
                                                    WHERE shows.id = :id");
            $stmt->execute(['id' => $id]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

}