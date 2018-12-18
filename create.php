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
            <a href="feed.php">
                <img id="logo" src="Logo.png" > 
            </a>
            <a href="feed.php">Socially</a>
        </h1>
        <h2> Where lifelong friendships are made</h2>
    </header>
    <section id="create">
        <form action="story.php" method="post" enctype="multipart/form-data">
            <div class="container">
                <h1>Create a Story</h1>
                <hr>
                
                <label for="Title"><b>Title</b></label>
                <input type="text" placeholder="Enter Title" name="userntitleame" required>

                <label for="Description">
                    <b>Description</b>
                    <textarea name="description" rows="5" cols="50" > </textarea>
                </label>

                <p></p>
                <label for="file"><b>Photo</b></label>
                <input type="file" placeholder="Select Photo" name="file" id="file"> 
            </div>
            <div class="clearfix">
                <a href="feed.php">
                    <button type="button" class="cancelbtn">Cancel</button>
                </a>
                <button type="submit" class="signupbtn">Create Story</button>
            </div>
        </form>
    </section>
    <?php include_once('templates/footer.php');?>

</body>

</html>