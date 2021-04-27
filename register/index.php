<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Register</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>
<legend>
<?php if(isset($_SESSION['error'])){
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}?>
<form action="../config/regform.php" method="post">
<label>Firstname</label>
<input type="text" name="fName"><br>
<label>Lastname</label>
<input type="text" name="lName"><br>
<label>Username</label>
<input type="text" name="username"><br>
<label>Email</label>
<input type="email" name="email"><br>
<label>Password</label>
<input type="password" name="password"><br>
<label>Confirm Password</label>
<input type="password" name="con_password"><br>
<button type="submit" name="submit_data">Register</button>
</form>
</legend>
</body>
</html>