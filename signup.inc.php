<?php 
    include_once 'connection.php'; 

    $userName = $_POST['user_name']; 
    $userEmail = $_POST['user_email']; 
    $userPassword = $_POST['user_password']; 
    $sql = "INSERT INTO users (user_name, user_email, user_pwd) VALUES ($userName, $userEmail, $userPassword);"; 

    mysqli_query($conn, $sql); 

    header("Location: /index.php?signup=success")
?>
