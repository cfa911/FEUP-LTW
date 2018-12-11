<?php
header("Location: index.html");
$dbh = new PDO('sqlite:database.db');

$sql = file_get_contents('LTW-SQL.sql');
$qr = $dbh->exec($sql);
die();
?>