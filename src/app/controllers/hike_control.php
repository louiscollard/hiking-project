<?php
require_once '/application/app/models/data_hikes.php';
require_once '/application/helpers/session_helper.php';

class Hikes
{
    private $hikeModel;

    public function __construct()
    {
        $this->hikeModel = new Hike;
    }
    public function add()
    {
        //Process form
        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

        //Init data
        $data = [
            'name' => trim($_POST['name']),
            'distance' => trim($_POST['distance']),
            'duration' => trim($_POST['duration']),
        ];

        //Register User
        if ($this->hikeModel->add($data)){
            redirect('login');
        } else {
            die('Something went wrong');
        }
    }
}

$init = new Hikes;

//Ensure that the user is sending a POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    switch ($_POST['type']){
        case 'add':
            $init->add();
            break;
        default:
            redirect("../views/home");
    }
}