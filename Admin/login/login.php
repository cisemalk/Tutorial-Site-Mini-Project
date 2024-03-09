<?php
    session_start();
    
    include '../../dbconnect.php';

    $conn = mysqli_connect($host, $username, $pass, $dbname);
    if(!$conn){
        die("connection failed");
    }
    else{

        $sql_q = "SELECT * FROM `admin` where `username` = '".$_POST['usr']."' and `pass` = '".$_POST['pwd']."'";
        $result = $conn->query($sql_q);

        if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc()) {

                $_SESSION['username'] = $row["Username"];
                $_SESSION['name'] = $row["Name"];
                $_SESSION['role'] = "admin";
                header("Location: /group1/admin/");
                exit();
            }
        }
        else {
            header("Location: /group1/login/");
            exit();
        }
    }
?>
    
