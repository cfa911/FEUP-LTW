<?php
header("Location: index.html");
$dbh = new PDO('sqlite:database.db');
$counter = 0;
$username = $_POST['username'];
$email = $_POST['email'];
$password = hash('sha256', 'password');

$get = $dbh->prepare('SELECT * FROM UTILAISER');
$get->execute();
$picada = $get->fetchAll();
foreach($picada as $picada){
    if($picada['username'] == $username)
    $counter = 1;
}
if(!$counter)
{
    $stmt = $dbh->prepare('INSERT INTO UTILAISER (username, password, email)
    VALUES (:username, :password, :email)');
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);
$stmt->bindParam(':email', $email);

$stmt->execute();
}
die();
?>