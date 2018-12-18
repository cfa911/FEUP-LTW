<?php
include_once('login.php');
$dbh = new PDO('sqlite:database.db');
$username = $_SESSION['username'];
$description = $_POST['description'];
$title = $_POST['title'];
$vote = 0;
$postTime = date("H:i:s");
$postID = uniqid();

if(isset($_FILES["file"]))
{
    echo 1;
    //upload the image
    $file = $_FILES["file"];
    $fileName = $_FILES["file"]["name"];
    $fileTmpName = $_FILES["file"]["tmp_name"];
    $fileSize = $_FILES["file"]["size"];
    $fileError = $_FILES["file"]["error"];
    $fileType = $_FILES["file"]["type"];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png');

    if(in_array($fileActualExt,$allowed)){
        if($fileError === 0)
        {
            if($fileSize < 50000000){
                
                $fileNameNew = uniqid().".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);
                $count = $dbh->prepare('SELECT COUNT(*) as NUM FROM IMAGES');
                $count->execute();
                $result=$count->fetch();
                $newID = $result['NUM'] + 1;

                $stmt = $dbh->prepare('INSERT INTO IMAGES (imageID, file_name) VALUES (:imageID,:file_dest)');
                $stmt->bindParam(':imageID', $newID);
                $stmt->bindParam(':file_dest', $fileDestination);
                $stmt->execute();

                $imageID = $newID;
                
            }else{
                echo "Your file is too big!";
            }
        }
        else{
            echo "There was an error uploading the file!";
        }
    }
}
else
{
    $imageID = NULL;
}

$post = $dbh->prepare('INSERT INTO POST (postID, username, description, postTime, vote)
VALUES (:postID, :username, :description, :postTime, :vote)');
$post->bindParam(':postID', $postID);
$post->bindParam(':username', $username);
$post->bindParam(':description', $description);
$post->bindParam(':postTime', $postTime);
$post->bindParam(':vote', $vote);

$story = $dbh->prepare('INSERT INTO STORY (postID, title, imageID)
Values (:postID, :title, :imageID)');
$story->bindParam(':postID', $postID);
$story->bindParam(':title', $title);

$story->bindParam(':imageID', $imageID);

$story->execute();
$post->execute();

header('Location: create.php');
die();
?>