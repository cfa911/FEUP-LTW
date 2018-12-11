<?php
$dbh = new PDO('sqlite:database.db');

$username = $_POST['username'];
$email = $_POST['email'];
$password = hash('sha256', 'password');

/*
$sql = file_get_contents('LTW-SQL.sql');
$qr = $dbh->exec($sql);
clear TABLES*/

$stmt = $dbh->prepare('INSERT INTO UTILAISER (username, password, email)
                       VALUES (:username, :password, :email)');
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);
$stmt->bindParam(':email', $email);

$stmt->execute();

$get = $dbh->prepare('SELECT * FROM UTILAISER');
$get->execute();
$picada = $get->fetchAll();
foreach($picada as $picada){
    echo $picada['username'];
}

?>