<?php
//create connection
include '../dbconnect.php';

session_start();
$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries); //get parameter from the url

$n = 0;
if (array_key_exists("n", $queries)) {
    $n = $queries["n"];
}



$connection = mysqli_connect($host, $username, $pass, $dbname);
//test success
if(!$connection){
    die( "Connection Failed"); 
}else{
     $sql = "SELECT * FROM quiz ORDER BY Question_id LIMIT " . $n . ", 1;";
    $results = mysqli_query($connection, $sql);
    $results1 = mysqli_num_rows($results);
    if($results1 > 0){
        
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
	
    	<table border='0' bordercolor=black width='960' height='540' background='questionBackground.jpg'>

		 <tr>
               		<td align='center' >
<br>                    
                    	<table border='0' cellspacing='5' cellpadding= '5' width='340' height='200'>
                ";    
        //get the output
        
       while($row = $results->fetch_assoc()) {

            $choices = array($row['choice_1'], $row['choice_2'] , $row['choice_3'], $row['answer'] );
             shuffle($choices);

            $correctAnswer = array_search($row['answer'], $choices);

            echo "
            <tr>"
        ."<td align='center'>"."Question ".$row['question_id']."</td></tr><tr>"
        ."<td align='center'>".$row['question']."</td></tr><td>"
        ."<input type='hidden' name='correctAnswer' id='correctAnswer' value=".$correctAnswer."><label for='correctAnswer'></label><br>"
        ."<input type='radio' name='choice' id='c1' ><label for='c1'>".$choices['0']."</label><br>"
        ."<input type='radio' name='choice' id='c2' ><label for='c2'>".$choices['1']."</label><br>"
        ."<input type='radio' name='choice' id='c3' ><label for='c3'>".$choices['2']."</label><br>"
        ."<input type='radio' name='choice' id='c4' ><label for='c4'>".$choices['3']."</label><br>"
        ."</td></tr>
   
        </table>
                
                 <table border='0' cellspacing='0' cellpadding= '10'>
            <tr><td>" ."<button id='confirm' onclick='answerChecked()'>CONFIRM</button>" ."</td>
           <td>" ."<a href='/group1/quizzes/questions.php?n=". ($n+1) ."'>"
                 ."<button id='submit'>SUBMIT</button>"  ."</a> </td>
            </tr>
                  
            
            </table>
             <table border='0' cellspacing='0' cellpadding= '10'>
                 <tr><td align='center'>" 
                    ."<submit id='timer'>TIMER</submit>" ."</td> </tr>
            </table>
            <script>
                    var timeleft = 60;
                    var downloadTimer = setInterval(function(){
                    document.getElementById('timer').innerHTML = timeleft + ' seconds remaining';
                    timeleft -= 1;
                    if(timeleft <= 0){
                        clearInterval(downloadTimer);
                        document.getElementById('timer').innerHTML = 'Finished'
                        alert('Time is up!');
                        window.location.href = '/group1/homepage'; 
                    }
                    }, 1000); 
                    
           </script>

                    ";
       
       }  
        
        
    }else {
        
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
	
    	<table border='0' bordercolor=black width='960' height='540' background='questionBackground.jpg'>

		 <tr>
               		<td align='center' >
<br>                    
                    	<table border='0' cellspacing='5' cellpadding= '5' width='340' height='200'>
        
         <tr>"
        ."<td align='center'>"."<b>YOU HAVE COMPLITED THE TEST!</b></td></tr><tr>"
        ."<td align='center'>"."If you want, you can take the test again or you can go back to the home page to study.</td></tr>
            
        </table>
                
                 <table border='0' cellspacing='0' cellpadding= '10'>
            <tr><td>" ."<a href='index.php"."'>" 
            ."<button id='tryAgain'>TRY AGAIN</button>" ."</a>" ."</td>
           <td>" ."<a href='/group1/homepage'>"
                 ."<button id='homePage'>HOME PAGE</button>"  ."</a> </td>
            </tr>
        
        ";
}

}
        

?>
       
<script>
function answerChecked() {
    const radio = document.querySelector("input:checked");
     if(radio) {
         
     
      var correct = document.getElementsByName('correctAnswer')[0].value;
            var ans = document.getElementsByName('choice');
            var i;
            for (i = 0; i < ans.length; i++) {
                const label = document.querySelector(`label[for=${ans[i].id}]`);
                if (ans[i].checked) {
                  
                   if (i == correct) {
                         label.style.color = "green";
                       
                    } else {
                      
                    label.style.color = "red";
                   const label2 = document.querySelector(`label[for=${ans[correct].id}]`);
          label2.style.color = "green";
        
                    }
                }
            } 
    }
}
</script>        

</table>
</div>
</body>
</html>

