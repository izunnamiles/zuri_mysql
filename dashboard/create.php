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

<?php if(isset($_SESSION['error'])){
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}?>
<form action="del.php" method="post">
<label>Course No</label>
<input class="form-control" type="text" name="course_code"><br>
<label>Course Name</label>
<input class="form-control" type="text" name="course_name"><br>
<label>Lecturer</label>
<input class="form-control" type="text" name="lecturer"><br>
<button  class="btn btn-primary" type="submit" name="create">Update Course</button>
</form>
</body>
</html>