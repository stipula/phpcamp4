<?php
require_once 'init.php';

$host = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbname = 'phpcamp';

$db = new mysqli($host, $dbUser, $dbPass, $dbname);

if ($db->connect_error) {
    // blad polaczenia
    var_dump($db->connect_error);
}

if (!empty($_POST['login']) && !empty($_POST['pass'])) {
    // sprawdzamy pole login i pass sa niepuste
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    $query = 'SELECT * FROM users WHERE login = "' . $login . '"';
    // zapytanie sprawdzajace czy dany uzytkowni

    $result = $db->query($query);
    if ($result) {
        //znaleziono w bazie danych uzytkownika o podanym loginie
        $user = $result->fetch_assoc();
        if ($user['login'] == $login && $user['pass'] == $pass) {
            //login sie zgadza informujemy uzytkownika
            echo 'Witaj ' . $login;

            $_SESSION['login'] = $login;
        }
    }
}


