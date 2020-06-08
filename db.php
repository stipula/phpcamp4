<?php

$host = 'localhost';
$dbUser = 'root';
$dbPass = 'root';
$dbname = 'phpcamp';

$db = new mysqli($host, $dbUser, $dbPass, $dbname);

var_dump($db->connect_error);


$query = 'SELECT * FROM `users`';
$query = 'INSERT INTO `users` (`login`, `pass`) VALUES (\'Przemek\', \'asdasdasd\');';

$result = $db->query($query);

if ($result) {
    echo 'zapytanie wykonane poprawnie';
} else {
   echo ' wystąipł blad zapytania ';
    echo ' wystąipł blad zapytania '. $db->error;
     var_dump($db->error_list);
}
die;
if ($result) {
    var_dump($result->fetch_all());
} else {
   echo ' wystąipł blad zapytania ';
     var_dump($db->error_list);
}


