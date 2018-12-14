<?php
$dbh = new PDO('sqlite:database.db');

$counter = 0;
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$age = $_POST['age'];
$newID = 0;
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

                $user = $dbh->prepare('INSERT INTO UTILAISER (username, password, email)
                VALUES (:username, :password, :email)');
                $user->bindParam(':username', $username);
                $user->bindParam(':password', $passhash);
                $user->bindParam(':email', $email);
                $user->execute();

                $karma = 0;
                    //create profile
                $profile = $dbh->prepare('INSERT INTO PROFILE (username, firstName, lastName, age, imageID, karma)
                Values (:username, :firstName, :lastName, :age, :imageID, :karma)');
                $profile->bindParam(':username', $username);
                $profile->bindParam(':firstName', $firstName);
                $profile->bindParam(':lastName', $lastName);
                $profile->bindParam(':age', $age);
                $profile->bindParam(':imageID', $newID);
                $profile->bindParam(':karma', $karma);
                $profile->execute();
                
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
    //header("Location: registered.html");
}
?>
