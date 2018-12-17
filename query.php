<?php
$dbh = new PDO('sqlite:database.db');
$username = $_POST['username'];
$counter = 0;
$get = $dbh->prepare('SELECT * FROM UTILAISER');
$get->execute();
$info = $get->fetchAll();
foreach($info as $info){
    if($info['username'] == $username)
    $counter = 1;
}
echo json_encode($counter);
?>