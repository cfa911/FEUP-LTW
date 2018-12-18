<?php 
include_once('login.php');

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
        <?php
            $stmt = $dbh->prepare('select * from POST INNER JOIN STORY 
            ON STORY.postID = POST.postID ORDER BY postTime DESC');
            $stmt->execute();
            $results = $stmt->fetchall();
            $i = 0; /* for illustrative purposes only */
            foreach($results as $result):?>
                <div> 
                    <p> <?php echo $result['username']; ?></p>
                    <h1> <?php echo $result['title']; ?></h1>
                    <?php if($result['imageID'] != NULL):
                           ?><img src= <?php         
                           $img = $dbh->prepare('select file_name from IMAGES where imageID = ?');
                           $img->execute(array($result['imageID']));
                           $imgres = $img->fetch();
                           echo $imgres['file_name']?>><?php endif?>
                    <h2> <?php echo $result['description']; ?></h2>
                    <p> <?php echo $result['postTime']; ?></p>
                    <form action="votes.php" method="post" enctype="multipart/form-data">
                    <p><button type= "upvoute">upvote</button>votes: <?php echo $result['vote']; ?> <button type= "downvote">downvote</button></p>
                    </form>
                </div>
                <?php endforeach
            ?>
    <footer>
        <p>&copy; Socially, 2018</p>
    </footer>

</body>

</html>