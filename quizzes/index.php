<?php

include '../dbconnect.php';
$connection = mysqli_connect($host, $username, $pass, $dbname);
if(!$connection){
    die( "Connection Failed"); 
}else{
        echo "
            <html>
<head>
  <style>
            body{
                font-family: sans-serif;
                text-align: justify;
            }
            input[type='radio']:checked + label {
                background-color: #9DC9F1;
                    
            }
        </style>        
</head>
<body bgcolor='#9DC9F1'>
<div align ='center'> 
	
    	<table border='0' width='960' height='540' background='questionBackground.jpg'>

		 <tr>
               		<td align='center' >
<br>                    
                    	<table border='0' cellspacing='5' cellpadding= '5' width='340' height='200'>
                      <tr>"
        ."<td align='center'>"."<b>WELCOME!</b></td></tr><tr>"
        ."<td>"."<li> There are 10 questions in this quiz.</td></tr>"
        ."<td>"."<li> You will have 1 minutes for each question. You can check the remaining time from the timer.</td></tr>"
         ."<td>"."<li> When your time is up, you will move to the next question.</td></tr>"
        ."<td>"."<li> You will see the correct answer after you click on Confirm button.</td></tr>"
        ."<td>"."<li> You can see the next question after you click on Submit button.</td></tr>"
        ."<td>"."<li> You can't go back to the previous question.</td></tr>"
            
        ."</table>
                
                 <table border='0' cellspacing='0' cellpadding= '10'>
            <tr><td>" ."<a href='questions.php" ."'>" 
            ."<button id='tryAgain'>START</button>" ."</a>" ."</td>
            </tr>
                    ";
    }
?>

