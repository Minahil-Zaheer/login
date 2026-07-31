<?php
session_start();

require_once "config.php";

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn,
    "SELECT * FROM users WHERE email='$email' AND password='$password'");

    if(mysqli_num_rows($result)>0)
    {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['userId'] = $row['id'];

       echo "<script>window.location.href = 'profile.php'</script>";
    }
    else
    {
        echo "Invalid Email or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
</head>
<body>

<h2>Login</h2>

<form method="post">

Email:

<input type="email" name="email">

<br><br>

Password:

<input type="password" name="password">

<br><br>

<input type="submit" name="login" value="Login">

</form>

<br>

<a href="register.php">Create Account</a>

</body>
</html>

