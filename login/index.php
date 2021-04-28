<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
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
    <input class="form-control" type="email" name="email"><br>
    <label>Password</label>
    <input class="form-control" type="password" name="password"><br>
    <button type="submit" class="btn btn-primary" name="login_data">Login</button><br><br>
</form>
</div>
</body>
</html>