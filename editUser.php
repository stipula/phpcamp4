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

$query = 'UPDATE users SET email = "' . $_POST['email'] . '" WHERE login = "' . $_POST['login'] . '"';
$result = $db->query($query);
if ($result) {

    echo 'Dane uzytkownika zmienione';
} else {
    echo $db->error;

}