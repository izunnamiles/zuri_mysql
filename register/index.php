<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Register</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
<div class="container">
<?php if(isset($_SESSION['error'])){
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}?>
<form action="../config/regform.php" method="post">
<label>Firstname</label>
<input class="form-control" type="text" name="fName"><br>
<label>Lastname</label>
<input class="form-control" type="text" name="lName"><br>
<label>Username</label>
<input class="form-control" type="text" name="username"><br>
<label>Email</label>
<input class="form-control" type="email" name="email"><br>
<label>Password</label>
<input class="form-control" type="password" name="password"><br>
<label>Confirm Password</label>
<input class="form-control" type="password" name="con_password"><br>
<button type="submit" class="btn btn-primary "name="submit_data">Register</button>
</form>
</div>
</body>
</html>