<?php

$host = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbname = 'phpcamp';

$db = new mysqli($host, $dbUser, $dbPass, $dbname);

var_dump($db->connect_error);


$query = 'SELECT * FROM `users`';

$result = $db->query($query);


if ($result) {
    var_dump($result->fetch_all());
} else {
    echo ' wystąipł blad zapytania ';
    var_dump($db->error_list);
}

$db->close();
