<?php

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

    $query = 'SELECT * FROM users WHERE loasddsagin = "' . $login . '"';
    // zapytanie sprawdzajace czy dany uzytkowni

    $result = $db->query($query);
    if ($result) {
        //znaleziono w bazie danych uzytkownika o podanym loginie
        $user = $result->fetch_assoc();
        if ($user['login'] == $login) {
            //login sie zgadza informujemy uzytkownika
            echo 'uzytkownik o takim loginie istnieje w bazie ' . $login;
            echo ' wystąipł blad zapytania '. $db->error;
            die;
        }
    }

    $query = "INSERT INTO `users` (`login`, `pass`) VALUES ('$login', '$pass');";

    $result = $db->query($query);

    if ($result) {
        echo "Uzytkownik $login dodany prawidlowo";
    } else {
        echo ' wystąipł blad zapytania '. $db->error;
        var_dump($db->error_list);
    }
} else {
    echo 'nie podano danych';
}

