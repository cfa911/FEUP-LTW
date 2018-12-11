<?php
$dbh = new PDO('sqlite:database.db');

$username = $_GET['username'];
$email = $_GET['email'];
$password = hash('sha256', 'password');

$sql = file_get_contents('LTW-SQL.sql');
$qr = $dbh->exec($sql);

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
    echo $picada['password'];
}

?>