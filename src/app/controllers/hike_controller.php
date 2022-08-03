<?php
require_once '/application/app/models/database_hiking.php';
class hike
{
    private $hikesModel;

    public function __construct()
    {
        $this->hikesModel = new Hikes;
    }

    public function addHike($data)
    {

        $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

        //Init data
        $data = [
            $name = $_POST["name"];
		$distance = $_POST["distance"];
		$duration = $_POST["duration"];
        ];

        if ($this->hikesModel->addHike($data)){
            redirect('login');
        } else {
            die('Something went wrong');
        }
    }
}

$init = new hike;
