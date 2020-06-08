<?php
require_once 'init.php';

$myDb = new Database();
$DAO = new UserDAO($myDb);

if (!empty($_POST['login']) && !empty($_POST['pass'])) {
    // sprawdzamy pole login i pass sa niepuste
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    $user = $DAO->getUser($login);

    if ($user->login == $login) {
        //znaleziono w bazie danych uzytkownika o podanym loginie
        echo 'uzytkownik o takim loginie istnieje w bazie ' . $login;
        die;
    }

    $userToAdd = new User();
    $userToAdd->login = $login;
    $userToAdd->pass = $pass;

    $result = $DAO->add($userToAdd);
    if ($result) {
        echo "Uzytkownik {$userToAdd->login} dodany prawidlowo";
    } else {
        echo ' wystąipł blad zapytania '. $myDb->getError();
        var_dump($myDb->getErrorsList());
    }
} else {
    echo 'nie podano danych';
}

