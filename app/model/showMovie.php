<?php
namespace model;

use PDO;

class showMovie{

    // constructor to share the variable that holds the connection
    function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    // create new showMovie by name and number of seats
    function create($show, $movie, $date){
        $stmt = $this->conn->prepare("INSERT INTO showMovies (showId, movieId, date)
          VALUES (:show, :movie, :date)");
        $stmt->execute(['show' => $show, 'movie' => $movie, 'date' => $date]);
    }

    // update showMovie by id
    function update($id, $show, $movie, $date){
        $stmt = $this->conn->prepare("UPDATE showMovies SET showId = :show, movieId = :movie, date = :date WHERE id = :id");
        $stmt->execute(['show' => $show, 'movie' => $movie, 'date' => $date, 'id' => $id]);
    }

    // delete showMovie
    function delete($id){
        $stmt = $this->conn->prepare("DELETE FROM showMovies WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }

    // show single showMovie or all
    // if id = 0 it returns all
    // inner join to show movies name
    function show($id = 0){

        if (!$id) {
            $stmt = $this->conn->prepare("SELECT showMovies.id, showMovies.showId, movies.name AS movieName,
                                                    showMovies.date FROM showMovies
                                                    INNER JOIN movies ON showMovies.movieId = movies.id
                                                    ORDER BY showMovies.id");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        else {
            $stmt = $this->conn->prepare("SELECT showMovies.id, showMovies.showId, showMovies.movieId, showMovies.date,
                                                    movies.name AS movieName  FROM showMovies
                                                    INNER JOIN movies ON showMovies.movieId = movies.id
                                                    WHERE showMovies.id = :id");
            $stmt->execute(['id' => $id]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    // update showMovie booked tickets number by id
    function updateTickets($id, $tickets){
        $stmt = $this->conn->prepare("UPDATE showMovies SET tickets = tickets + :tickets WHERE id = :id");
        $stmt->execute(['tickets' => $tickets, 'id' => $id]);
    }

}