<?php
namespace model;

use PDO;

class ticket{

    // constructor to share the variable that holds the connection
    function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    // book new ticket by name, showMovie id and number of tickets
    function create($name, $showMovieId,$tickets){
        $stmt = $this->conn->prepare("INSERT INTO tickets (name, showMovieId, tickets) VALUES (:name, :showMovieId, :tickets)");
        $stmt->execute(['name' => $name, 'showMovieId' => $showMovieId, 'tickets' => $tickets]);
    }

    // check showMovies available by date and duration
    // inner join to show all data from duration, halls, shows, movies, showMovie tables
    function check($date, $duration){
        $stmt = $this->conn->prepare("SELECT showMovies.id AS showMoviesId, showMovies.date, showMovies.tickets,
                                                shows.id AS showsId,
                                                movies.id AS moviesId, movies.name AS moviesName,
                                                halls.id AS hallsId, halls.name AS hallsName, halls.seats AS hallsSeats,
                                                durations.id AS durationsId, durations.duration AS duration
                                                FROM showMovies
                                                INNER JOIN movies on showMovies.movieId = movies.id
                                                INNER JOIN shows on showMovies.showId = shows.id
                                                INNER JOIN durations on shows.duration = durations.id
                                                INNER JOIN halls on shows.hall = halls.id
                                                WHERE (showMovies.date = :date && durations.id = :duration)");
        $stmt->execute(['date' => $date, 'duration' => $duration]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}