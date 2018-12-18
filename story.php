<?php
include('login.php');
$dbh = new PDO('sqlite:database.db');

$username = $_SESSION['username'];
echo $username;
$description = $_POST['description'];
echo $description;
$title = $_POST['title'];
echo $title;
$date = date("H:i:s");
echo $date;


header('create.php');
die();
?>