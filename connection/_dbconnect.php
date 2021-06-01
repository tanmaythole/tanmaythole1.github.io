<?php

    $servername = "remotemysql.com";
    $username = "MYTwudnHnK";
    $password = "HrpCFnmie1";
    $database = "MYTwudnHnK";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if(!$conn){
        die("Failed to connect --> ".mysqli_connect_error($conn));
    }
    
?>