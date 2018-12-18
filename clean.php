<?php
header("Location: index.php");
$dbh = new PDO('sqlite:database.db');

$sql = file_get_contents('database.sql');
$qr = $dbh->exec($sql);

die();
?>