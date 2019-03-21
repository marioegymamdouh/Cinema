<?php
namespace controller;

use model;

class duration {

    // open durations view page
    function index() {
        include ROOT_PATH . 'view/durations/view.php';
    }

    // api to return durations from db
    function show() {
        $modelDuration = new model\duration();
        $durations = $modelDuration->show();
        echo json_encode($durations);
    }

}