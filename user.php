<?php
require_once 'init.php';

$host = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbname = 'phpcamp';

$db = new mysqli($host, $dbUser, $dbPass, $dbname);

if (empty($_SESSION['login'])) {
    echo 'Brak uzytkownika';
    die;
}

$login = $_SESSION['login'];

$query = 'SELECT * FROM users WHERE login = "' . $login . '"';

$result = $db->query($query);
if ($result) {
    //znaleziono w bazie danych uzytkownika o podanym loginie
    $user = $result->fetch_assoc();
    var_dump($user);

    echo '
    <form action="editUser.php" method="post">
    <label for="login">Login</label>
    <input type="text" name="login" value="' . $user['login']. '"><br>    
    <label for="login">email</label>
    <input type="text" name="email" value="' . $user['email']. '">   <br>    
    <label for="login">wiek</label>
    <input type="text" name="age" value="' . $user['age']. '">   <br>
    <input type="submit" value="Zapisz zmiany"> 
</form>
    ';
} else {
    echo $db->error;
}