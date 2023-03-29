<?php

class Users extends Controller{

    private $userModel;

    public function __construct(){
        $this->userModel = $this->model('User');
    }

    public function register(){
        $data = array("username"=> $_POST['username'], "email"=> $_POST['email'], "password"=> $_POST['password'], "confirm_password"=> $_POST['confirm_password']);

        if(empty($data['username'])){
            $data += ["username_error"=> "Username field is empty !"];
        }
        else if(empty($data['email'])){
            $data += ["email_error"=> "Email field is empty !"];
        }
        else if(empty($data['password'])){
            $data += ["password_error"=> "Password field is empty !"];
        }
        else if(empty($data['confirm_password'])){
            $data += ["confirm_password_errror"=> "Confirm password field is empty !"];
        }
        else if($data['password'] == $data['confirm_password']){
            $data += ["confirm_password_errror"=> "Password and Confirm Password are different !"];
        }
        else if(!$this->userModel->findUserByEmail($data['email'])){
            $data += ["email_errror"=> "Email is already taken !"];
        }
        else {
            $data += ["role"=> "normal"];
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            $this->userModel->register($data);
            header('Location: login.php');
            
        }
        header('Location: register.php');
    }

    public function login(){
        $this->views("login");
        $email = $_POST['username'];
        $password = $_POST['password'];
        if(!empty($email) && !empty($password)){
            if($this->user->login($email, $password)){
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['message'] = $_SESSION['username'] . " correctly authentificated";
            }
            header('Location: login.php');
        }
    }

}