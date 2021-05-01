<?php
session_start();

header("location:logout.php");

session_destroy();

?>