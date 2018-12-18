<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Socially</title>
    <meta charset="UTF-8">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/forms.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
</head>

<body>
    <header>
        <h1>
            <a href="index.php">
                <img id="logo" src="Logo.png" >
            </a>
            <a href="index.php">Socially</a>
        </h1>
        <h2> Where lifelong friendships are made</h2>
    </header>

    <section id="create">
        <form action="comment.php" method="post" enctype="multipart/form-data">
            <div class="container">
                <h1>Make a comment</h1>
                <input type="hidden" name="parentID" value=<?php echo $_POST['postID']; ?>>
                <hr>
                <label for="Description">
                    <b>Description</b>
                    <textarea name="description" rows="5" cols="70" > </textarea>
                </label>
            </div>

            <div class="clearfix">
                <a href="feed.php">
                    <button type="button" class="cancelbtn">Cancel</button>
                </a>
                <button type="submit" class="signupbtn">Comment</button>
            </div>
        </form>
    </section>
    <?php include_once('templates/footer.php');?>

</body>

</html>
