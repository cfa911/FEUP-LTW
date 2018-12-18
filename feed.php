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
    <link href="css/forms.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/feed.css" rel="stylesheet">
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
    </header>

    <nav id="menu">
        <ul>
        <li>
                <a href="create.php">
                    <button type="button" class="indexb">Create Story</button>
                </a>
            </li>
            <li>
                <a href="profile.php">
                    <button type="button" class="indexb">Profile</button>
                </a>
            </li>
            <li>
                <a href="logout.php">
                    <button type="button" class="indexb">Logout</button>
                </a>
            </li>
        </ul>
    </nav>

        <?php
            
            $stmt = $dbh->prepare('select * from POST INNER JOIN STORY 
            ON STORY.postID = POST.postID ORDER BY postTime DESC');
            $stmt->execute();
            $results = $stmt->fetchall();
            $i = 0; /* for illustrative purposes only */
            foreach($results as $result):?>
                
                <div class= "story">
                    <div>
                        <h3>Author:</h3>
                    </div> 
                     <?php echo $result['username']; ?>
                    <h1> 
                        <?php echo $result['title']; ?>
                    </h1>
                    <?php if($result['imageID'] != NULL):?>
                        <img src= 
                        <?php         
                        $img = $dbh->prepare('select file_name from IMAGES where imageID = ?');
                        $img->execute(array($result['imageID']));
                        $imgres = $img->fetch();
                        echo $imgres['file_name']?>>
                        <?php endif?>
                    <h2> 
                        <?php echo $result['description']; ?>
                    </h2>
                    <div> 
                        <?php echo $result['postTime']; ?>
                    </div>


                    <form action="commenting.php" method="post" enctype="multipart/form-data">
                       <input type="hidden" name="postID" value=<?php echo $result['postID']; ?>>
                       <button class="commnt" type="submit">Comment</button>
                    </form>

                    <form action = "upvotes.php" method = "post" enctype="multipart/form-data"> 
                        <input type= "hidden" name = "postID" value = <?php echo $result['postID']?>>
                        <button type= "submit"  class= "upvotes">
                     upvotes</button>
                    </form></a>
                    
                    <form action = "downvotes.php" method = "post" enctype="multipart/form-data"> 
                        <input type= "hidden" name = "postID" value = <?php echo $result['postID']?>>
                        <button type= "submit"  class= "downvotes">downvotes</button></form>
                    
                    votes: 
                     
                     <?php 
                        $votes = $dbh->prepare('select sum(VOTE.value) AS SUMATORY from ((VOTE INNER JOIN POST 
                        ON POST.postID = ?) INNER JOIN UTILAISER 
                        ON ? = POST.username)');
                        $votes->execute(array($result['postID'],$result['username']));
                        $voters = $votes->fetch();
                        echo $voters['SUMATORY'] + 0; 
                    ?>
                    

                    <!--1st-level comments-->
                    <?php $comment = $dbh->prepare('select * from POST INNER JOIN COMMENT ON COMMENT.commentID = POST.postID Where COMMENT.parentID = ? ORDER BY postTime');
                    $comment->execute(array($result['postID']));
                    $subresults = $comment->fetchall();

                    foreach($subresults as $subresult):?>
                        <div class="comentary">
                            <p> <?php echo $subresult['username']; ?></p>
                            <h2> <?php echo $subresult['description']; ?></h1>
                            <p> <?php echo $subresult['postTime']; ?></p>
                            <form action="commenting.php" method="post" enctype="multipart/form-data">
                               <input type="hidden" name="postID" value=<?php echo $subresult['postID']; ?>>
                               <button type="submit">Comment</button>
                            </form>
                            <form action = "upvotes.php" method = "post" enctype="multipart/form-data"> 
                                <input type= "hidden" name = "postID" value = <?php echo $subresult['postID']?>>
                                <button type= "submit"  class= "upvotes">
                                upvotes</button></form></a>votes: <?php 
                                $votes = $dbh->prepare('select sum(VOTE.value) AS SUMATORY from ((VOTE INNER JOIN POST 
                                ON POST.postID = ?) INNER JOIN UTILAISER 
                                ON ? = POST.username)');
                                $votes->execute(array($subresult['postID'],$subresult['username']));
                                $voters = $votes->fetch();
                                echo $voters['SUMATORY'] + 0; ?>
                                <form action = "downvotes.php" method = "post" enctype="multipart/form-data"> 
                                <input type= "hidden" name = "postID" value = <?php echo $subresult['postID']?>>
                                <button type= "submit"  class= "downvotes">downvotes</button>
                            </form>

                            <!--2nd-level comments-->
                            <?php $subcomment = $dbh->prepare('select * from POST INNER JOIN COMMENT ON COMMENT.commentID = POST.postID Where COMMENT.parentID = ? ORDER BY postTime');
                            $subcomment->execute(array($subresult['postID']));
                            $finalresults = $subcomment->fetchall();
                            foreach($finalresults as $finalresult):?>
                                <div class="subcommentary">
                                    <p> <?php echo $finalresult['username']; ?></p>
                                    <h2> <?php echo $finalresult['description']; ?></h1>
                                    <p> <?php echo $finalresult['postTime']; ?></p>
                                    <form action = "upvotes.php" method = "post" enctype="multipart/form-data"> 
                                        <input type= "hidden" name = "postID" value = <?php echo $finalresult['postID']?>>
                                        <button type= "submit"  class= "upvotes">
                                        upvotes</button></form></a>votes: <?php 
                                        $votes = $dbh->prepare('select sum(VOTE.value) AS SUMATORY from ((VOTE INNER JOIN POST 
                                        ON POST.postID = ?) INNER JOIN UTILAISER 
                                        ON ? = POST.username)');
                                        $votes->execute(array($finalresult['postID'],$finalresult['username']));
                                        $voters = $votes->fetch();
                                        echo $voters['SUMATORY'] + 0; ?>
                                        <form action = "downvotes.php" method = "post" enctype="multipart/form-data"> 
                                        <input type= "hidden" name = "postID" value = <?php echo $finalresult['postID']?>>
                                        <button type= "submit"  class= "downvotes">downvotes</button></form>
                                </div>
                            <?php endforeach?>
                        </div>
                    <?php endforeach?>
                </div>
                <?php endforeach
            ?>
    <footer>
        <p>&copy; Socially, 2018</p>
    </footer>

</body>

</html>