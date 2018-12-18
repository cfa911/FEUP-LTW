<?php
  include('login.php');
  $dbh = new PDO('sqlite:database.db');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Socially</title>
    <meta charset="UTF-8">
    <link rel="icon" href="Logo.png">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/layout.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <!--<link href="forms.css" rel="stylesheet">-->
</head>

<body>
    <header>
            <h1>
                <a href="feed.php">
                    <img id="logo" src="Logo.png" >
                </a>
                <a href="feed.php">Socially</a>
            </h1>
            <h2> Where lifelong friendships are made</h2>
    </header>

    <nav id="menu">
        <ul>
            <li><a href="feed.php">Feed</a></li>
            <li><a href="index.html">Logout</a></li>
        </ul>
    </nav>

    <div id="title">
        <img id="logo" src="Logo.png">
        <h1>Socially</h1>
    </div>

    <div id="center">
        <h1>Connect with your friends and family</h1>
        <img id="photo" src=<?php
        $stmt = $dbh->prepare('select file_name from IMAGES where imageID = ( select imageID from Profile where username = ?)');
        $stmt->execute(array($_SESSION['username']));
        $result = $stmt->fetch();
        echo $result['file_name'];?>>
        <p><?php
        $stmt = $dbh->prepare('select firstName from Profile where username = ?');
        $stmt->execute(array($_SESSION['username']));
        $result = $stmt->fetch();
        echo $result['firstName'];?></p>
        <p><?php
        $stmt = $dbh->prepare('select lastName from Profile where username = ?');
        $stmt->execute(array($_SESSION['username']));
        $result = $stmt->fetch();
        echo $result['lastName'];?></p>
        <p><?php
        $stmt = $dbh->prepare('select age from Profile where username = ?');
        $stmt->execute(array($_SESSION['username']));
        $result = $stmt->fetch();
        echo $result['age'];?></p>
        <p><?php
        $stmt = $dbh->prepare('select karma from Profile where username = ?');
        $stmt->execute(array($_SESSION['username']));
        $result = $stmt->fetch();
        echo $result['karma'];?></p>
    </div>

    <footer>
        <p>&copy; Socially, 2018</p>
    </footer>

</body>

</html>
