<?php
require_once 'init.php';

echo '<form action="index.php" method="POST">
Podaj swoje ID <input type="text" name="moje_id" value="'.(isset($_SESSION['moje_id']) ? $_SESSION['moje_id'] : ''). '"/>
<input type="submit" value="Zapisz" />

</form>';
