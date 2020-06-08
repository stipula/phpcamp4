<?php

require_once 'init.php';
if (empty($_SESSION['login'])) {
    echo 'Brak uzytkownika';
    die;
}

$host = 'localhost';
$dbUser = 'root';
$dbPass = 'root';
$dbname = 'phpcamp';

$db = new mysqli($host, $dbUser, $dbPass, $dbname);

$query = 'DELETE FROM users  WHERE login = "' . $_SESSION['login'] . '"';
$result = $db->query($query);
if ($result) {

    echo 'usunieto uzytkownika o loginie ' . $_SESSION['login'];
    unset($_SESSION['login']);
} else {
    echo $db->error;

}