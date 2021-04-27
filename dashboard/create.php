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

<?php if(isset($_SESSION['error'])){
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}?>
<form action="del.php" method="post">
<label>Course No</label>
<input type="text" name="course_code"><br>
<label>Course Name</label>
<input type="text" name="course_name"><br>
<label>Lecturer</label>
<input type="text" name="lecturer"><br>
<button type="submit" name="update_course">Update Course</button>
</form>
</body>
</html>