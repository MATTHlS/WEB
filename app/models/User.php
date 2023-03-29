<?php

class User{

    private $id, $username, $email, $password, $role, $created_at, $updated_at;
    private $conexion;

    public function __construct(){
        $this->connexion = new Database();
    }

    public function findUserByEmail($email){
        $sql = "SELECT * from users WHERE email='" . $email . "'";
        $this->connexion->prepare($sql);
        $this->connexion->execute();
        if($this->connexion->rowCount() == 1)
            return TRUE;
        return FALSE;
    }

    public function login($email, $password){
        $sql = "SELECT * from users WHERE email='" . $email . "'";
        $this->connexion->prepare($sql);
        $this->connexion->execute();
        $result = $this->connexion->single();
        if(!empty($result) && password_verify($password, $result['password']))
            return $result;
        return FALSE;
    }

    public function getUserById($user_id){
        $sql = "SELECT * from users WHERE id='" . $user_id . "'";
        $this->connexion->prepare($sql);
        $this->connexion->execute();
        if($this->connexion->rowCount() == 1)
            return $this->connexion->single();
        return FALSE;
    }

    public function register($data){
        $sql = "INSERT INTO users(username, email, password, role) VALUES ('" . $data['username'] . "', '" . $data['email']. "', '" . $hash . "', '" . $data['role'] . "')";
        $this->connexion->prepare($sql);
        $this->connexion->execute();
    }

}


//$test = new User();
//$test->register(array("username"=>"Matthis", "email"=>"matthis@root.fr", "password"=>"root", "role"=>"normal"));
