<?php
$dbh = new PDO('sqlite:database.db');
if (session_status() == PHP_SESSION_NONE) {
session_start();
session_regenerate_id(true);
}
if(isset($_POST['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt = $dbh->prepare('SELECT * FROM UTILAISER WHERE username = ?');
    $stmt->execute(array($username));
    $user = $stmt->fetch();
    if ($user !== false && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        
        header("Location: feed.php");
    }
}
$_SESSION['sessionid'] = session_id();
?>