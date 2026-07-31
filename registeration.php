<?php
require_once "config.php";

if(isset($_POST['register']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];

    mysqli_query($conn,"INSERT INTO users(username,email,password,gender,city)
    VALUES('$username','$email','$password','$gender','$city')");

    echo "Registration Successful";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>

<h2>Registration Form</h2>

<form method="post">

Username:
<input type="text" name="username"><br><br>

Email:
<input type="email" name="email"><br><br>

Password:
<input type="password" name="password"><br><br>

Gender:

<input type="radio" name="gender" value="Male">Male

<input type="radio" name="gender" value="Female">Female

<br><br>

City:

<select name="city">

<option>Karachi</option>

<option>Lahore</option>

<option>Islamabad</option>

<option>Punjab</option>

</select>

<br><br>

<input type="submit" name="register" value="Register">

</form>

<br>

<a href="login.php">Login Here</a>

</body>
</html>