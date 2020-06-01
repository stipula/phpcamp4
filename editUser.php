<?php

var_Dump($_POST);

$host = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbname = 'phpcamp';

$db = new mysqli($host, $dbUser, $dbPass, $dbname);

$query = 'UPDATE users SET email = "' . $_POST['email'] . '" WHERE login = "' . $_POST['login'] . '"';
$result = $db->query($query);
if ($result) {

    echo 'Dane uzytkownika zmienione';
} else {
    echo $db->error;

}