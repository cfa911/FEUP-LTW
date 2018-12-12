<?php
header("Location: index.html");
$dbh = new PDO('sqlite:database.db');

$sql = file_get_contents('database.sql');
$qr = $dbh->exec($sql);

die();
?>