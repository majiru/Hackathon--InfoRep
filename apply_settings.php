<?php

require 'tilePrefs.php';

$prefs = getPrefs();

$prefs->boxFromCur[htmlspecialchars($_GET["id"])] = htmlspecialchars($_POST["entry?"]);

storePrefs($prefs);

header("Location:stocks.php")

?>
