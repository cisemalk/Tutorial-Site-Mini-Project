<?php
include '../dbconnect.php';
$new_subj = $_POST['addsubject'];
$new_content = $_POST['addcontent'];

$conn = mysqli_connect($host, $username, $pass, $dbname);

if(!$conn){
    die("connection failed");
}
else{


if ($new_subj != "" and $new_content != ""){
    $sql_q = "INSERT INTO `section`(`Subject`, `Content`) VALUES ('".$new_subj."','".$new_content."')";
    $result = $conn->query($sql_q);
    if ($result === TRUE) {
        header("Location: /group1/admin/");
        exit();
        } 
    else {
        echo "Error updating record: " . $conn->error;
    }
}
elseif ($new_subj == "" or $new_content == ""){
    echo "All fields must be provided";
}
else {
    
}
}
?>