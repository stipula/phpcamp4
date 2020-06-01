<?php
require_once 'init.php';

if (!empty($_POST)) {
    // przeszlo cos postem...

    if ($_POST['moje_id']) {
        $fileData = file_get_contents('testowy.txt');
        $idiki = explode("\n", $fileData);
        if (in_array($_POST['moje_id'], $idiki)) {
            echo "takie id już podano!!!";
            die();
        }

        file_put_contents('testowy.txt', $fileData . "\n" . $_POST['moje_id']);

        $_SESSION['moje_id'] = $_POST['moje_id'];
    }
}



var_dump($_SESSION);
