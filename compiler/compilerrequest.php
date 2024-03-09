<?php

    include "../dbconnect.php";
    $code= $_POST['code11'];
    $output= $_POST['output11'];
    $baglanti = mysqli_connect($host, $username, $pass, $dbname);
    $sql="insert into logs(code,output)values('$code','$output')";
    $sonuc=mysqli_query($baglanti,$sql);

    echo ($code);

?>