<?php
namespace controller;

use model;

class show{

    // open shows view page
    function index() {
        include ROOT_PATH . 'view/shows/view.php';
    }

    // api to return shows from db by id
    // if id = 0 it returns all
    function show($id = 0) {
        $modelShow = new model\show();
        $shows = $modelShow->show($id);
        echo json_encode($shows);
    }

    // api to delete shows from db by id
    function delete($id){
        $modelShow = new model\show();
        $modelShow->delete($id);
    }

    // view shows add page
    function add(){
        include ROOT_PATH . 'view/shows/addEdit.php';
    }

    // api to add shows to db
    function addApi(){
        $hall = $_POST['hall'];
        $duration = $_POST['duration'];
        if ($hall !== '' && $duration !== ''){
            $modelShow = new model\show();
            $modelShow->create($duration,$hall);
        }
        header('location:' .ROOT . 'show');
    }

    // view shows edit page
    function edit(){
        include ROOT_PATH . 'view/shows/addEdit.php';
    }

    // api to edit shows from db by id
    function editApi(){
        $id = $_POST['id'];
        $hall = $_POST['hall'];
        $duration = $_POST['duration'];
        if ($hall !== '' && $duration !== ''){
            $modelShow = new model\show();
            $modelShow->update($id,$hall,$duration);
        }
        header('location:' .ROOT . 'show');
    }

}