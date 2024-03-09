<?php
include '../../dbconnect.php';
$conn = mysqli_connect($host, $username, $pass, $dbname);
$question= $_POST['question'];
$correct= $_POST['correct'];
$answer1= $_POST['answer1'];
$answer2= $_POST['answer2'];
$answer3= $_POST['answer3'];
$sql="INSERT into quiz(question,answer,choice_1,choice_2,choice_3) VALUE('$question','$correct','$answer1','$answer2','$answer3');";
mysqli_query($conn,$sql);
header("Location: index.php");
?>