<?php 
    if (isset($_POST["login"])){
        $username = $_POST["user_name"]; 
        $pwd = $_POST["user_pwd"]; 

        require_once 'connection.inc.php';
        require_once 'functions.inc.php'; 
    }

    if (emptyInputLogin($username, $pwd) !== false){
        header("Location: login.php?error=emptyinput"); 
        exit(); 
    }

    loginUser($conn, $username, $pwd); 

    header("Location: index.php?login=success"); 
?> 