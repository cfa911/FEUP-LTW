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
        <h2> Where lifelong friendships are made</h2>
    </header>
<section id="create">
        <form action="story.php" method="post" enctype="multipart/form-data">
            <div class="container">
                <h1>Create a Story</h1>
                <hr>
                <input type="text" placeholder="Enter Title" name="title" required>
                <input type="text" placeholder="Enter description" name="description" required>
                <input type="file" placeholder="Select Photo" name="file" id="file" required>
            </div>
            <div class="clearfix">
                <a href="index.html">
                    <button type="button" class="cancelbtn">Cancel</button>
                </a>
                <button type="submit" class="signupbtn">Sign Up</button>
            </div>
        </form>
    </section>
    <?php include('templates/footer.php');?>

</body>

</html>