<?php
session_start();
$con = mysqli_connect('localhost','root','','student_db');

if(isset($_POST['submit_data'])){
  $fName = trim($con, $_POST['fName']);
  $lName = trim($con,$_POST['fName']);
  $username = trim($con,$_POST['username']);
  $email = trim($con, $_POST['email']);
  $password = trim($con, $_POST['password']);
  $con_password = trim($con, $_POST['con_password']);

  
  if (!empty($first_name && $last_name && $wallet_id)) {
    if(!preg_match('/^[a-z ]+$/i',$first_name)) {
        $_SESSION['error']= "<div style=color:red>Incorrect naming format</div>";
        header("Location:register");
        die();
    }
    if(!preg_match('/^[a-z ]+$/i',$last_name)) {
        $_SESSION['error']= "<div style=color:red>Incorrect naming format</div>";
        header("Location:register");
        die();
    } 
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['error']= "<div style=color:red>Input a valid email address</div>";
        header("Location:register");
        die();
    }
    
    $query = "SELECT * FROM user_tb WHERE email = '$email'";
    $result = mysqli_query($con, $query);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        $_SESSION['error']= "<div style=color:red>email already exists</div>";
        header("Location:register");
        die();
    }
    $q = "SELECT * FROM user_tb WHERE username = '$username'";
    $r = mysqli_query($con, $q);
    $rC = mysqli_num_rows($r);

    if ($rC > 0) {
        $_SESSION['error']= "<div style=color:red>username already exists</div>";
        header("Location:register");
        die();
    }

    if ($password != $con_password) {
        $_SESSION['pass']= "<div style=color:red>Password confirmation does not match</div>";
        header("Location:register");
        die();
    }

    $hashedpassword = password_hash($password,PASSWORD_DEFAULT);

    $query = "INSERT INTO user_tb (id,first_name,last_name,email,password,created_at) VALUES (null,'".$first_name."','".$last_name."','".$email."','".$hashedpassword."', CURRENT_TIMESTAMP())";
    $result = mysqli_query($lib->con, $query);

    if ($result === true) {

        unset($_SESSION['first_name']);
        unset($_SESSION['last_name']);
        unset($_SESSION['email']);
        unset($_SESSION['wallet_id']);
        unset($_SESSION['password']);

        $g = mysqli_query($lib->con,"SELECT * FROM user_tb WHERE email = '$email'");
        $row = mysqli_fetch_assoc($g);

        $_SESSION['logged_email'] = $row['email'];
        $_SESSION['unique_id'] = $row['id'];
        $_SESSION['full_name'] = $row['first_name'].' '.$row['last_name'];
        $_SESSION['u_first'] = $row['first_name'];
        $_SESSION['u_last'] = $row['last_name'];
       

        
        $success = "Your details has been successfully submitted!";
        header("Location:dashboard?Login success=$success");
        exit();
    } else {
        echo mysqli_error($con); die();
        header("location:register?error=".mysqli_error($con));
    } 
    
}else {
    $_SESSION['error']= "<div style=color:red>Empty fields</div>";
    header("Location: register");
    die();
}

  
}

if(isset($_POST['login_data'])){
  $email = trim($con, $_POST['username']);
  $password = trim($con, $_POST['password']);

  if (!empty($email && $password )) {
   
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['error']= "<div style=color:red>Input a valid email address</div>";
        header("Location:login");
        die();
    }
    
    $query = "SELECT * FROM user_tb WHERE email = '$email'";
    $result = mysqli_query($con, $query);
    $d = mysqli_fetch_assoc($result);
    $resultCheck = mysqli_num_rows($result);
    $dbpassword = $d['password'];

    if($resultCheck > 1){
      if(password_verify($password,$dbpassword)){
        $_SESSION['logged_email'] = $row['email'];
        $_SESSION['unique_id'] = $row['id'];
        $_SESSION['full_name'] = $row['first_name'].' '.$row['last_name'];
        $_SESSION['u_first'] = $row['first_name'];
        $_SESSION['u_last'] = $row['last_name'];

        $success = "Your details has been successfully submitted!";
        header("Location:dashboard?Login success=$success");
        exit();
      }else $_SESSION['error']= "<div style=color:red>Incorrect Password</div>";
      header("Location:login");
      die();
    }else $_SESSION['error']= "<div style=color:red>Email Address not found</div>";
    header("Location:login");
    die();
  }else $_SESSION['error']= "<div style=color:red>Input is Empty</div>";
  header("Location:login");
  die();

}

if(isset($_POST['reset'])){
  $user_id = $_SESSION['unique_id'];
  $password1 = trim($con, $_POST['passwd']);
  $password2 = trim($con, $_POST['con_passwd']);

  if($password1 != $password2){
    $_SESSION['error']= "<div style=color:red>Input is Empty</div>";
    header("Location:reset.php");
    die();
  }else{
    $hash = password_hash($password1, PASSWORD_DEFAULT);
    $updatepwd = mysqli_query ($con,"UPDATE user_tb SET password = '$hash' WHERE id='$user_id'");
    if($updatepwd === true){
      $_SESSION['success']= "<div style=color:red>Password reset successful</div>";
    header("Location:login");
    }
  }
}




