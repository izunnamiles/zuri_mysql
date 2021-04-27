<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>

<form action="../config/regform.php" method="post">
<?php if(isset($_SESSION['error'])){
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}
if(isset($_SESSION['success'])){
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}
?>
<label>Email</label>
<input type="email" name="email"><br>
<label>Password</label>
<input type="password" name="password"><br>
<button type="submit" name="login_data">Login</button><br><br>
<a href="forgot.php">Forgot Password</a>
</form>
</body>
</html>