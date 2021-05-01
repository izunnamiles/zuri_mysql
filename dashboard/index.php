<?php
session_start();
require_once('../config/regform.php');
if(!isset($_SESSION['unique_id'])){ header('location:login?error=Please login first!'); die();}
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
<?php if(isset($_SESSION['success'])){
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}?>
<a href="create.php">Add New Course</a>
<a href="logout.php">Log out</a>
<table class="table">
        <thead>
            <tr>
                <th style="width:25%;">ID</th>
                <th style="width:25%;">Course Code</th>
                <th style="width:25%">Course Name</th>
                <th style="width:25%">Lecturer</th>
                <th style="width:25%">Action</th>	
            </tr>
        </thead>
        <tbody>
        <?php 
            $courses =mysqli_query($con,"SELECT * FROM course_tb WHERE user_id ='$user_id' ORDER BY created_at DESC");
            $no_courses=mysqli_num_rows($courses);
            if($no_courses == 0){
                print "<tr><td> No Course Added </td></tr>";
            }
        ?>
        <?php foreach($courses as $course){$n = 0; ?>
            <tr>
                <td><?php echo $n++?></td>
                <td><?php echo $course['course_code']?></td>
                <td><?php echo $course['course_name']?></td>
                <td><?php echo $course['lecturer']?></td>
                <td>
                <a class="btn btn-success" href="/edit.php?id=$course['id']"name="approve_withdrawal">Approve</a>

                    <form action="del.php" method="post">
                    <div class="d-flex">
                     <input type="hidden" value="<?php echo $course['id']?>" name="delete_course">
                     <button class="ml-2 btn btn-warning" type="submit" name="reject" hidden>Reject</button>
                    </div>
                    </form>
                </td>	
            </tr>
            <?php }?>
        </tbody>
    </table>
</body>
</html>