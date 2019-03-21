<?php
namespace controller;

use model;

class movie{

    // open movies view page
    function index() {
        include ROOT_PATH . 'view/movies/view.php';
    }

    // api to return movies from db by id
    // if id = 0 it returns all
    function show($id = 0) {
        $modelMovie = new model\movie();
        $movies = $modelMovie->show($id);
        echo json_encode($movies);
    }

    // api to delete movies from db by id
    function delete($id){
        $modelMovie = new model\movie();
        $modelMovie->delete($id);
    }

    // view movies add page
    function add(){
        include ROOT_PATH . 'view/movies/addEdit.php';
    }

    // api to add movies to db
    function addApi(){
        $name = $_POST['name'];
        if ($name !== ''){
            $modelMovie = new model\movie();
            $modelMovie->create($name);
        }
        header('location:' .ROOT . 'movie');
    }

    // view movies edit page
    function edit(){
        include ROOT_PATH . 'view/movies/addEdit.php';
    }

    // api to edit movies from db by id
    function editApi(){
        $id = $_POST['id'];
        $name = $_POST['name'];
        if ($name !== ''){
            $modelMovie = new model\movie();
            $modelMovie->update($id,$name);
        }
        header('location:' .ROOT . 'movie');
    }

}