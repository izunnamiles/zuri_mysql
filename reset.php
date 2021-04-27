<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>

<form action="config/regform.php" method="post">
<?php if(isset($_SESSION['error'])){
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}?>
<label>New Password</label>
<input type="password" name="passwd"><br>
<label>Confirm Password</label>
<input type="password" name="con_passwd"><br>
<button type="submit" name="reset">Login</button><br><br>
</form>
</body>
</html>