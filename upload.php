<?php
$dbh = new PDO('sqlite:database.db');

if(isset($_POST['submit'])){
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
                header("Location; upload.php?success");
            }else{
                echo "Your file is too big!";
            }
        }
        else{
            echo "There was an error uploading the file!";
        }
    }
    else{
        echo "invalid file type";
    }
}
?>
