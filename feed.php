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
                <a href="index.html">
                    <img id="logo" src="Logo.png" > 
                </a>
                <a href="index.html">Socially</a>
            </h1>
    </header>

    <nav id="menu">
        <ul>
            <li><a href="feed.php">Feed</a></li>
            <li><a href="profile.html">Profile</a></li>
        </ul>
    </nav>

    <div id="title">
        <img id="logo" src="Logo.png">
        <h1>Socially</h1>
    </div>

    <div id="center">
        <h1>Connect with your friends and family</h1>
        <img id="connect" src="connect.png">
    </div>
    
    <footer>
        <p>&copy; Socially, 2018</p>
    </footer>

</body>

</html>