<?php
session_start();
require_once('../config/regform.php');
$course_id = $_GET['id'];
$course = mysqli_query($con,"SELECT * FROM course_tb WHERE id = '$course_id'");
$data = mysqli_fetch_assoc($course)
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
<input type="text" name="course_code" value="<?php echo $data['course_code']?>"><br>
<label>Course Name</label>
<input type="text" name="course_name" value="<?php echo $data['course_name']?>"><br>
<label>Lecturer</label>
<input type="text" name="lecturer" value="<?php echo $data['lecturer']?>"><br>
<input type="hidden" name="course_id" value="<?php echo $course_id?>"><br>
<button type="submit" name="update_course">Update Course</button>
</form>
</body>
</html>