<?php
include '../dbconnect.php';

$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$id = $queries["id"];
$value = $queries["value"];

$conn = mysqli_connect($host, $username, $pass, $dbname);
if(!$conn){
    die("connection failed");
}
else{
    
    
    echo "$value";
    
    if ($value == "subject"){
        $sql_q = "Update `section` set `Subject`='' where `Section_id`=".$id."";
        $result = $conn->query($sql_q);
        echo "$result";
        if ($result === TRUE) {
            header("Location: /group1/admin/");
            exit();
        } 
        else {
            echo "Error updating record: " . $conn->error;
        }
    }
    elseif ($value == "content") {
        $sql_q = "Update `section` set `Content`='' where `Section_id`=".$id."";
        $result = $conn->query($sql_q);
        if ($result === TRUE) {
            header("Location: /group1/admin/");
            exit();
          } 
        else {
            echo "Error updating record: " . $conn->error;
        }
    }
    else {
        $sql_q = "Delete from `section` where `Section_id`=".$id."";
        $result = $conn->query($sql_q);
        if ($result === TRUE) {
            header("Location: /group1/admin/");
            exit();
          } 
        else {
            echo "Error updating record: " . $conn->error;
        }
    }
}
?>