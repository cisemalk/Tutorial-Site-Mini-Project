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
    if ($value == "subject"){
        $updated_subj = $_POST['subj'];
        $sql_q = "Update `section` set `Subject`='".$updated_subj."' where `Section_id`=".$id."";
        $result = $conn->query($sql_q);
        echo "$result";
        if ($result === TRUE) {
            echo "Record updated successfully";
            header("Location: /group1/admin/");
            exit();
        } 
        else {
            echo "Error updating record: " . $conn->error;
        }
    }
    else {
        $updated_cont = $_POST['cont'];
        $sql_q = "Update `section` set `Content`='".$updated_cont."' where `Section_id`=".$id."";
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