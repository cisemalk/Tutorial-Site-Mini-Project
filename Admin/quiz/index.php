<?php

include '../../dbconnect.php';
$conn = mysqli_connect($host, $username, $pass, $dbname);
if(isset($_GET['delete_id'])){
    $id=$_GET['delete_id'];
    $sqlcode="DELETE FROM quiz WHERE question_id='$id';";
    $delete=mysqli_query($conn,$sqlcode);

} //DELETE MINI BUTTON IN EDIT QUIZZES PART

session_start();
$username = $_SESSION['username'];
$role = $_SESSION['role'];

if($role != "admin"){
    header("Location: /group1/unauthorized.php");
    exit;
}//admin authorization 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Quiz Editing Page</title>
    <link rel="stylesheet" href="stylenew15.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Outfit:wght@200&display=swap" rel="stylesheet">
    <style> @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@200&display=swap'); </style>
</head>
<header>Welcome to the quiz editing page!</header>
<body>
        <form class="aa">
            <button type="submit" class="button" name="edit">Edit Quizzes</button> <!--FIRST MAIN BUTTON-->
            <br>
            <table border="1" cellpadding="0">
                
            <?php
                $sql = "SELECT * FROM quiz;";
                $result = mysqli_query($conn, $sql);
                $resultcheck = mysqli_num_rows($result); //GETTING TABLE FROM THE DATABASE


                if($resultcheck>0){
                    if(isset($_GET['edit'])){
                        echo "
                        <tr>
                        <th>ID</th>
                        <th>QUESTION</th>
                        <th>CORRECT ANSWER</th>
                        <th>CH_1</th>
                        <th>CH_2</th>
                        <th>CH_3</th>
                        <th></th>
                        <th></th>
                        </tr>
                        ";
                    while($row1 = mysqli_fetch_assoc($result)){
                        echo "
                        <tr>
                        <td>".$row1['question_id']."</td>
                        <td>".$row1['question']."</td>
                        <td>".$row1['answer']."</td>
                        <td>".$row1['choice_1']."</td>
                        <td>".$row1['choice_2']."</td>
                        <td>".$row1['choice_3']."</td>
                        <td>
                            <a href='index.php?delete_id=".$row1['question_id']."' class='btn'>DELETE</a>
                        </td>
                        <td>
                            <a href='updatequiz.php?update_id=".$row1['question_id']."' class='btn'>UPDATE</a>
                        </td>
                        </tr>
                        ";
                        } // LINE 70 IS FOR THE DELETE MINI BUTTON AND 73 IS FOR THE UPDATE MINI BUTTON
                    }
                }
                ?>
                </table>
                </form>
            <button id="trying" type="submit" class="button" name="add">Add Quizzes</button> <!--SECOND MAIN BUTTON-->
</body>
            <form action="code.php" class="pls" method="POST">
                <input type="text" class="input2" name="question" placeholder="Question">
                <br>
                <input type="text" class="input" name="answer1" placeholder="Choice 1:">
                <br>
                <input type="text" class="input4" name="answer2" placeholder="Choice 2:">
                <br>
                <input type="text" class="input5" name="answer3" placeholder="Choice 3:">
                <br>
                <input type="text" class="input3" name="correct" placeholder="Correct Answer">
                <br>
                <button type="submit" class="deneme" name="submit">Add</button>
            </form>
            <!-- Javascript part is for the appearing/disappearing function of add quizzes part-->
            <script>
                document.getElementById("trying").addEventListener("click", function(){
                document.querySelector('.pls').style.display = 'block';
                document.querySelector('.input').style.display = 'block';
                document.querySelector('.input2').style.display = 'block';
                document.querySelector('.input3').style.display = 'block';
                document.querySelector('.input4').style.display = 'block';
                document.querySelector('.input5').style.display = 'block';
                document.querySelector('.deneme').style.display = 'block';
                });
            </script>

            <a href="/group1/admin/"><button type="submit" class="button">Go to Section Page</button></a> <!--THIRD MAIN BUTTON-->

</html>
