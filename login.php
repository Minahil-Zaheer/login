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

        header("Location:profile.php");
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
Step 5: Profile Page (profile.php)
<?php
session_start();

include "db.php";

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