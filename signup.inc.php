<?php 
   
    if (isset($_POST['submit'])){
        $userName = $_POST['user_name']; 
        $userEmail = $_POST['user_email']; 
        $userPassword = $_POST['user_pwd']; 
        $userPasswordRepeat = $_POST['user_pwdrepeat']; 

        require 'connection.inc.php'; 
        require 'functions.inc.php'; 

        if (emptyInputSignup($userName, $userEmail, $userPasswordRepeat, $userPasswordRepeat) !== false){
            header("Location: signup.php?error=emptyinput"); 
            exit(); 
        }
        if (invalidUserName($userName) !== false){
            header("Location: signup.php?error=invalidusername"); 
            exit(); 
        }
        if (invalidEmail($userEmail) !== false){
            header("Location: signup.php?error=invalidemail"); 
            exit(); 
        }
        if (pwdMatch($userPassword, $userPasswordRepeat) !== false){
            header("Location: signup.php?error=passwordsdontmatch"); 
            exit(); 
        }
        if (uidExists($conn, $userName, $userEmail) !== false){
            header("Location: signup.php?error=usernametaken"); 
            exit(); 
        }
        if (pwdLength($userPassword) !== false){
            header("Location: signup.php?error=passwordtooshort"); 
            exit(); 
        }
    
        createUser($conn, $userName, $userEmail, $userPassword, $userPasswordRepeat); 


        header("Location: index.php?signup=success"); 
    }
  

   
?>
