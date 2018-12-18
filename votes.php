<?php
include_once('login.php');
$dbh = new PDO('sqlite:database.db');
$username = $_SESSION['username'];
$postID = $_POST['postID'];
$vote = 0;

$stmt = $dbh->prepare('select * from VOTE INNER JOIN POST 
ON VOTE.postID = POST.postID 
WHERE username = ?');
$stmt->execute($_SESSION['username']);
$results = $stmt->fetchall();


$vote = $dbh->prepare('INSERT INTO VOTE (postID, username, value)
VALUES (:postID, :username, :value)');
$vote->bindParam(':postID', $postID);
$vote->bindParam(':username', $username);
$vote->bindParam(':value', $value);

$story = $dbh->prepare('INSERT INTO STORY (postID, title, imageID)
Values (:postID, :title, :imageID)');
$story->bindParam(':postID', $postID);
$story->bindParam(':title', $title);

$story->bindParam(':imageID', $imageID);

$story->execute();
$post->execute();

header('Location: feed.php');
die();
?>