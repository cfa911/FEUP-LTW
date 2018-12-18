<?php
include_once('login.php');
$dbh = new PDO('sqlite:database.db');
$username = $_SESSION['username'];
$postID = $_POST['postID'];
$vote = 0;
$counter = 0;
$value = -1;
$stmt = $dbh->prepare('select * from VOTE INNER JOIN POST 
ON VOTE.postID = POST.postID 
WHERE VOTE.username = ?');
$stmt->execute(array($username));
$results = $stmt->fetchall();


$aux = 0;
foreach($results as $result):
    $counter++;
    if($result['value'] == -1)
    $aux = 1;
endforeach;
if($aux == 1)
{
    $dele = $dbh->prepare('delete from VOTE
    WHERE VOTE.username = ? AND VOTE.postID = ?');
    $dele->execute(array($_SESSION['username'],$postID));
}
else{
$vote = $dbh->prepare('INSERT INTO VOTE (postID, username, value)
VALUES (:postID, :username, :value)');
$vote->bindParam(':postID', $postID);
$vote->bindParam(':username', $username);
$vote->bindParam(':value', $value);
$vote->execute();
}
header('Location: feed.php');
?>