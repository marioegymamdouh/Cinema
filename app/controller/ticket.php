<?php
namespace controller;

use model;

class ticket{

    // open tickets view page
    function index() {
        include ROOT_PATH . 'view/ticket/ticket.php';
    }

    // api to add ticket to db
    function book(){
        $name = $_POST['name'];
        $showMovieId = $_POST['movie'];
        $tickets = $_POST['tickets'];
        if ($name !== '' && $showMovieId !== '' && $tickets !== ''){
            $modelShow = new model\ticket();
            $modelShow->create($name, $showMovieId, $tickets);

            $modelShowMovie = new model\showMovie();
            $modelShowMovie->updateTickets($showMovieId, $tickets);
        }
        header('location:' .ROOT . 'ticket');
    }

    // api to return showMovies from db by date and duration id
    function check($date, $duration){
        $modelTicket = new model\ticket();
        $movies = $modelTicket->check($date,$duration);
        echo json_encode($movies);
    }

}