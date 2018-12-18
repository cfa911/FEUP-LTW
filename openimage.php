<?php
$con = new PDO('sqlite:database.db');
$sql = "SELECT name FROM IMAGES WHERE ID=1";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);

$image = $row['name'];
$image_src = "upload/".$image;

?>
<img src='<?php echo $image_src;  ?>' >