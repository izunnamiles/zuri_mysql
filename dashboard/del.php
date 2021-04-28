<?php 
session_start();
$con = mysqli_connect('localhost','root','','student_db');

if(isset($_POST['update_course'])){
    $course_code = trim($con,$_POST['course_code']);
    $course_name = trim($con,$_POST['course_name']);
    $lecturer = trim($con,$_POST['lecturer']);
    $courseID = trim($con,$_POST['course_id']);

    $updateCourse = mysqli_query($con,"UPDATE course_tb SET course_code ='$course_code', course_name ='$course_name',lecturer='$lecturer' WHERE id='$courseID' ");
    if($updateCourse === true){
        $_SESSION['success']= "<div style=color:green>Course has been updated</div>";
    header("Location:dashboard");
    die();
    }
}

if(isset($_POST['create'])){
    $course_code = trim($con,$_POST['course_code']);
    $course_name = trim($con,$_POST['course_name']);
    $lecturer = trim($con,$_POST['lecturer']);
    $user_id = $_SESSION['unique_id'];

    $createCourse = mysqli_query($con,"INSERT INTO course_tb (id,user_id,course_code,course_name,lecturer) VALUES (NULL,'".$user_id."','".$course_code."','".$course_name."','".$lecturer."')");
    if($createCourse === true){
        $_SESSION['success']= "<div style=color:green>Course has been created</div>";
    header("Location:dashboard");
    die();
    }
}
if(isset($_POST['delete_course'])){
  $delId = trim($con, $_POST['del']);

  $delCourse = mysqli_query($con,"DELETE FROM course_tb WHERE id= '$delId'");
  if($delCourse === true){
    $_SESSION['success']= "<div style=color:green>Course has been deleted</div>";
    header("Location:dashboard");
    die();
  }
  
}


