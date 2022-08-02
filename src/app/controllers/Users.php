<?php
require_once '/application/app/models/User.php';
require_once '/application/app/helpers/session_helper.php';

class Users
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User;
    }

    public function register()
    {
        //Process form

        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

        //Init data
        $data = [
            'firstname' => trim($_POST['firstname']),
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
        ];

        //Validate Inputs
        if(empty($data['firstname']) || empty($data['email']) || empty($data['password'])){
            flash("register", "Please fill out all inputs");
            redirect("register");
        }

        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            flash("register", "Invalid email");
            redirect("register");
        }

        if(strlen($data['password']) < 6){
            flash("register", "Invalid password");
            redirect("register");
        }

        // User with the same email or firstname already exists
        if ($this->userModel->findUserByEmailOrFirstname($data['firstname'], $data['email'])){
            flash('register', 'Firstname or email already taken');
            redirect('register');
        }

        //Passed all validation checks
        //Now going to hash password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        //Register User
        if ($this->userModel->register($data)){
            redirect('login');
        } else {
            die('Something went wrong');
        }
    }
}

$init = new Users;

//Ensure that the user is sending a POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    switch ($_POST['type']){
        case 'register':
            $init->register();
            break;
        default:
            redirect("../views/home");
    }
}