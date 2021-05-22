<?php 
    include_once 'connection.inc.php'; 

    $userName = mysqli_real_escape_string($conn, $_POST['user_name']); 
    $userEmail = mysqli_real_escape_string($conn, $_POST['user_email']); 
    $userPassword = mysqli_real_escape_string($conn, $_POST['user_pwd']);
     
    $sql = "INSERT INTO users (user_name, user_email, user_pwd) 
    VALUES ('$userName', '$userEmail', '$userPassword');"; 

    mysqli_query($conn, $sql); 

    header("Location: index.php?signup=success"); 
?>
