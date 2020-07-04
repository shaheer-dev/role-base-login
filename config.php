<?php 

    
    $con=mysqli_connect("localhost", "root","", "multiusers");
    if(mysqli_connect_errno()){
        die("Connection Fail".mysqli_connect_error());
    }

