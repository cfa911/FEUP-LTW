<?php
$dbh = new PDO('sqlite:database.db');

$username = $_POST['username'];
$password = $_POST['password'];
$stmt = $dbh->prepare('SELECT * FROM UTILAISER WHERE username = ?');
$stmt->execute(array($username));
$user = $stmt->fetch();
if ($user !== false && password_verify($password, $user['password'])) {
    $_SESSION['username'] = $username;
    echo ('E a palavra passe');
}
?>