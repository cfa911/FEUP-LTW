<?php
include_once('login.php');
$dbh = new PDO('sqlite:database.db');
$username = $_SESSION['username'];
$description = $_POST['description'];
$parentID = $_POST['parentID'];
$vote = 0;
$postTime = date("H:i:s");
$commentID = uniqid();
echo $parentID;

$post = $dbh->prepare('INSERT INTO POST (postID, username, description, postTime, vote)
VALUES (:postID, :username, :description, :postTime, :vote)');
$post->bindParam(':postID', $commentID);
$post->bindParam(':username', $username);
$post->bindParam(':description', $description);
$post->bindParam(':postTime', $postTime);
$post->bindParam(':vote', $vote);

$comment = $dbh->prepare('INSERT INTO COMMENT (commentID, parentID)
Values (:commentID, :parentID)');
$comment->bindParam(':commentID', $commentID);
$comment->bindParam(':parentID', $parentID);

$comment->execute();
$post->execute();

header('Location: feed.php');
die();
?>
