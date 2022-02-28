<?php
    $conn = mysqli_connect('localhost','root', '', 'boiwala');

    if(!$conn){
        die("Connection Failed: " . mysqli_connect_error());
    }
?>