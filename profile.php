<?php
  include_once('login.php');
  $dbh = new PDO('sqlite:database.db');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Socially</title>
    <meta charset="UTF-8">
    <link rel="icon" href="Logo.png">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/profile.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
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
            <li>
                <a href="feed.php">
                    <button type="button" class="indexb">Feed</button>
                </a>
            </li>
        </ul>
    </nav>

    <div id="profile">
       <h4>Photo</h4>
        <img id="photo" src=<?php
            $stmt = $dbh->prepare('select file_name from IMAGES where imageID = ( select imageID from Profile where username = ?)');
            $stmt->execute(array($_SESSION['username']));
            $result = $stmt->fetch();
            echo $result['file_name'];
            ?>>
        <h3>First Name</h3>
        <div>
            <?php
            $stmt = $dbh->prepare('select firstName from Profile where username = ?');
            $stmt->execute(array($_SESSION['username']));
            $result = $stmt->fetch();
            echo $result['firstName'];
            ?>
        </div>
        <h3>Last Name</h3>
        <div>
            <?php
            $stmt = $dbh->prepare('select lastName from Profile where username = ?');
            $stmt->execute(array($_SESSION['username']));
            $result = $stmt->fetch();
            echo $result['lastName'];
            ?>
        </div>
        <h3>Age</h3>
        <div>
            <?php
            $stmt = $dbh->prepare('select age from Profile where username = ?');
            $stmt->execute(array($_SESSION['username']));
            $result = $stmt->fetch();
            echo $result['age'];
            ?>
        </div>
        <h3>Karma</h3>
        <div>
            <?php
            $stmt = $dbh->prepare('select karma from Profile where username = ?');
            $stmt->execute(array($_SESSION['username']));
            $result = $stmt->fetch();
            echo $result['karma'];
            ?>
        </div>
    </div>

    <footer>
        <p>&copy; Socially, 2018</p>
    </footer>

</body>

</html>
