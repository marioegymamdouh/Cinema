<?php
namespace controller;

use model;

class showMovie{

    // open showMovies view page
    function index() {
        include ROOT_PATH . 'view/showMovies/view.php';
    }

    // api to return showMovies from db by id
    // if id = 0 it returns all
    function show($id = 0) {
        $modelShowMovies = new model\showMovie();
        $showMovies = $modelShowMovies->show($id);
        echo json_encode($showMovies);
    }

    // api to delete showMovies from db by id
    function delete($id){
        $modelShowMovies = new model\showMovie();
        $modelShowMovies->delete($id);
    }

    // view showMovies add page
    function add(){
        include ROOT_PATH . 'view/showMovies/addEdit.php';
    }

    // api to add showMovies to db
    function addApi(){
        $show = $_POST['show'];
        $movie = $_POST['movie'];
        $date = $_POST['date'];
        if ($show !== '' && $movie !== '' && $date !== ''){
            $modelShowMovie = new model\showMovie();
            $modelShowMovie->create($show, $movie, $date);
        }
        header('location:' .ROOT . 'showMovie');
    }

    // view showMovies edit page
    function edit(){
        include ROOT_PATH . 'view/showMovies/addEdit.php';
    }

    // api to edit showMovies from db by id
    function editApi(){
        $id = $_POST['id'];
        $show = $_POST['show'];
        $movie = $_POST['movie'];
        $date = $_POST['date'];
        if ($show !== '' && $movie !== '' && $date !== ''){
            $modelShowMovie = new model\showMovie();
            $modelShowMovie->update($id,$show, $movie, $date);
        }
        header('location:' .ROOT . 'showMovie');
    }

}