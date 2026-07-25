<?php
session_start();

require_once "config.php";


if(!isset($_SESSION['userId']))
{
    header("Location:login.php");
}

$id = $_SESSION['userId'];

$result = mysqli_query($conn,"SELECT * FROM users WHERE id=$id");

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
<title>Profile</title>
</head>
<body>

<h2>User Profile</h2>

<p><b>Username:</b> <?php echo $row['username']; ?></p>

<p><b>Email:</b> <?php echo $row['email']; ?></p>

<p><b>Gender:</b> <?php echo $row['gender']; ?></p>

<p><b>City:</b> <?php echo $row['city']; ?></p>

<br>

<a href="logout.php">Logout</a>

</body>
</html>