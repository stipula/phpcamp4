<?php
require_once 'init.php';
print '<pre>';

$myDb = new Database();
$DAO = new UserDAO($myDb);

$users = $DAO->getAll();

if ($users) {
    var_dump($users);
} else {
    if ($myDb->getError()) {
        echo ' wystąipł blad zapytania ';
        var_dump($myDb->getErrorsList());
    }
}