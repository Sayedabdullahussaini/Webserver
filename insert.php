<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Records Form</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div class="form-style-6">
<form action="insert.php" method="post">
        <p>
        <label for="Name"> Name:</label>
        <input type="text" name="name" id="name" required>
    </p>
    <p>
        <label for="fav_color">fav_color:</label>
        <select name="fav_color" required>
 <option>---Select Color--</option>
 <option value="Black">Black</option>
 <option value="White">White</option>
 <option value="Blue">Blue</option>
 <option value="Red">Red</option>
 <option value="Orange">Orange</option>

 </select>
    </p>
    <p>
        <label for="pets">pets:</label>
        <input type="radio" name="pets" value="Cat"/>Cat
                <input type="radio" name="pets" value="Dog"/>Dog
    </p>
    <input type="submit" value="Add Records">
</form>
</div>
</body>
</html>

[root@ip-172-31-92-202 html]# ^C
[root@ip-172-31-92-202 html]# cat insert.php
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("3.86.245.94", "root", "", "demo");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$fav_color = mysqli_real_escape_string($link, $_REQUEST['fav_color']);
$pets = mysqli_real_escape_string($link, $_REQUEST['pets']);

// attempt insert query execution
$sql = "INSERT INTO persons (name, fav_color, pets) VALUES ('$name', '$fav_color', '$pets')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


// close connection
mysqli_close($link);
?>
