<?php
$dbh = new PDO('sqlite:database.db');
$counter = 0;
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$options = ['cost' => 12];
$passhash = password_hash($password, PASSWORD_DEFAULT, $options);


$get = $dbh->prepare('SELECT * FROM UTILAISER');
$get->execute();
$info = $get->fetchAll();
foreach($info as $info){
    if($info['username'] == $username)
    $counter = 1;
}
if(!$counter)
{
    $stmt = $dbh->prepare('INSERT INTO UTILAISER (username, password, email)
    VALUES (:username, :password, :email)');
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $passhash);
$stmt->bindParam(':email', $email);

$stmt->execute();
header("Location: registered.html");
}
?>