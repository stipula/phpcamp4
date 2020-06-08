<?php
require_once 'Database.class.php';
require_once 'UserDAO.class.php';
require_once 'User.class.php';

// inicjowanie sesji
if (isset($_COOKIE['moja_sesja'])) {
    @session_id($_COOKIE['moja_sesja']);
}

session_start();
$id = session_id();
setcookie('moja_sesja', $id);