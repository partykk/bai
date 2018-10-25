<?php

$user = [
    'NAME' => $_POST['imie'],
    'SURNAME' => $_POST['nazwisko'],
    'EMAIL' => $_POST['email'],
    'PASSWORD' => sha1($_POST['password']),
    'PASSWORD2' => sha1($_POST['verify_password'])
];

class user {
    private $errors = array();

    public function register(){
	    if (is_null($_POST['imie']) OR is_null($_POST['nazwisko']) OR filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            echo "Imie, nazwisko lub email jest OK ";
            return true;
        } else {
            echo "Imie, nazwisko lub email jest puste ";
            $errors = array("Imie, nazwisko lub email jest puste");
            // array_push($errors, "Imie, nazwisko lub email jest puste");
            var_dump ($errors);
            return false;
        }
    }
    public function save(){
        $mysql = new mysqli('localhost','dev','dev','bai');
        var_dump($mysql);
        // $sql = "INSERT INTO users (firstname, lastname, email, password) 
        // VALUES ($users['firstname'], $users['lastname'], $users['email'], $users['password'])";
    }

}
$user = new user;
echo $user->register();