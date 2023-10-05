<?php 

include "header.php";

include "db.php";

$id = $_GET['ids'];
$sql = "DELETE FROM student_detail WHERE id = '$id'";

mysqli_query($conn, $sql);
header("location:index.php");

?>