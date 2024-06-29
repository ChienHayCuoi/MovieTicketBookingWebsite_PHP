<?php
    $severname="localhost";
    $username="root";
    $password="";
    $database="db_xemphim";

    $connect= new mysqli($severname,$username,$password,$database);
    $conn=new mysqli($severname,$username,$password,$database);
    if(mysqli_connect_errno()){
        echo "loi ket noi".mysqli_connect_error();
        exit();
    }
    
?>