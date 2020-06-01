<?php

// inicjowanie sesji
if (isset($_COOKIE['moja_sesja'])) {
    @session_id($_COOKIE['moja_sesja']);
}

session_start();
$id = session_id();
setcookie('moja_sesja', $id);