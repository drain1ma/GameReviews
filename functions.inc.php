<?php 
 function emptyInputSignup($userName, $userEmail, $pwd, $pwdRepeat){
    $result; 

if (empty($userName) || empty($userEmail) || empty($pwd) || empty($pwdRepeat)){
    $result = true; 
}
else {
    $result = false; 
}
return $result; 
}

function invalidUserName($userName){
$result; 

if (!preg_match("/^[a-zA-Z0-9]*$/", $userName)){
    $result = true; 
}
else {
    $result = false; 
}
return $result; 
}

function invalidEmail($userEmail){
$result; 

if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)){
    $result = true; 
}
else {
    $result = false; 
}
return $result; 
}

function pwdMatch($userPassword, $userPasswordRepeat){
$result; 
if ($userPassword != $userPasswordRepeat){
    $result = true; 
}
else {
    $result = false; 
}
return $result; 
}

function uidExists($conn, $userName, $userEmail){
$sql = "SELECT * FROM users WHERE user_name = ? OR user_email = ?;"; 
$stmt = mysqli_stmt_init($conn); 

if (!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: signup.php?error=stmtfailed"); 
    exit(); 
}

mysqli_stmt_bind_param($stmt, "ss", $userName, $userEmail); 
mysqli_stmt_execute($stmt); 

$resultData = mysqli_stmt_get_result($stmt); 

if ($row = mysqli_fetch_assoc($resultData)){
    return $row; 
}
else{
    $result = false; 
    return $result; 
}

mysqli_stmt_close($stmt); 
}

function createUser($conn, $userName, $userEmail, $userPassword, $userPasswordRepeat){

$sql = "INSERT INTO users (user_name, user_email, user_pwd) 
VALUES (?, ?, ?);"; 
$stmt = mysqli_stmt_init($conn); 
if (!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: signup.php?error=stmtfailed"); 
    exit(); 
}

$hashedPwd = password_hash($userPassword, PASSWORD_DEFAULT); 

mysqli_stmt_bind_param($stmt, "sss", $userName, $userEmail, $hashedPwd); 
mysqli_stmt_execute($stmt); 
mysqli_stmt_close($stmt); 
header("Location: signup.php?error=none"); 
exit();

}
?> 