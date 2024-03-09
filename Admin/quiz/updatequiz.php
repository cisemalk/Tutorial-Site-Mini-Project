<?php
include '../../dbconnect.php';
$id=$_GET['update_id'];
$conn = mysqli_connect($host, $username, $pass, $dbname);
if(isset($_POST['submit'])){
    $newquestion= $_POST['newquest'];
    $newchoice1= $_POST['newchoice1'];
    $newchoice2= $_POST['newchoice2'];
    $newchoice3= $_POST['newchoice3'];
    $newcorrect= $_POST['newcorrect'];

    $sqlupdate="UPDATE quiz SET question='$newquestion', answer='$newcorrect', choice_1='$newchoice1', choice_2='$newchoice2', choice_3='$newchoice3' WHERE question_id='$id';";
    $result=mysqli_query($conn, $sqlupdate);
    if($result){
        header('location:index.php');
    }
    else{
        die(mysqli_error($conn));
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Quiz</title>
    <link rel="stylesheet" href="stylenew15.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Outfit:wght@200&display=swap" rel="stylesheet">
    <style> @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@200&display=swap'); </style>
</head>
<body>
    <form class="updatesection" method="POST">
        <input type="text" class="inputupdate" name="newquest" placeholder="New Question">
        <br>
        <input type="text" class="inputupdate" name="newchoice1" placeholder="New Choice 1">
        <br>
        <input type="text" class="inputupdate" name="newchoice2" placeholder="New Choice 2">
        <br>
        <input type="text" class="inputupdate" name="newchoice3" placeholder="New Choice 3">
        <br>
        <input type="text" class="inputupdate" name="newcorrect" placeholder="New Correct Answer">
        <button type="submit" class="updatebutton" name="submit">UPDATE</button>
    </form>
    <form action="index.php">
    <button type="submit" class="updatebutton2" name="submit">Back to Quiz Editing Page</button>
    </form>
    
</body>
</html>