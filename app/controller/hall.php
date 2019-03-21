<?php
namespace controller;

use model;

class hall{

    // open halls view page
    function index() {
        include ROOT_PATH . 'view/halls/view.php';
    }

    // api to return halls from db by id
    // if id = 0 it returns all
    function show($id = 0) {
        $modelHall = new model\hall();
        $halls = $modelHall->show($id);
        echo json_encode($halls);
    }

    // api to delete halls from db by id
    function delete($id){
        $modelHall = new model\hall();
        $modelHall->delete($id);
    }

    // view halls add page
    function add(){
        include ROOT_PATH . 'view/halls/addEdit.php';
    }

    // api to add halls to db
    function addApi(){
        $name = $_POST['name'];
        $seats = $_POST['seats'];
        if ($name !== ''){
            $modelHall = new model\hall();
            $modelHall->create($name, $seats);
        }
        header('location:' .ROOT . 'hall');
    }

    // view halls edit page
    function edit(){
        include ROOT_PATH . 'view/halls/addEdit.php';
    }

    // api to edit durations from db by id
    function editApi(){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $seats = $_POST['seats'];
        if ($name !== ''){
            $modelHall = new model\hall();
            $modelHall->update($id,$name,$seats);
        }
        header('location:' .ROOT . 'hall');
    }

}