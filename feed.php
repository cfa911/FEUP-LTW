<?php
include('login.php');

if($_SESSION['sessionid'] === session_id()){
}
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Socially</title>
    <meta charset="UTF-8">
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
    </header>

    <nav id="menu">
        <ul>
            <li><a href="create.php">Create Story</a></li>
            <li><a href="profile.php">Profile</a></li>
        </ul>
    </nav>
    <footer>
        <p>&copy; Socially, 2018</p>
    </footer>

</body>

</html>
