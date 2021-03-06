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

function pwdLength($userPassword){
    $result; 
    if(strlen($userPassword) < 8){
        $result = true; 
    }
    else{
        $result = false; 
        return $result; 
    }
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
addProfilePictureStatus($conn, $userName, $userEmail);
header("Location: index.php?error=none"); 
exit();

}

function addProfilePictureStatus($conn, $userName, $userEmail){
    $sql = "SELECT * FROM users WHERE user_name='$userName' AND user_email='$userEmail'";
                    $result = mysqli_query($conn, $sql); 
                    if (mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            $userid = $row['user_id']; 
                            $sql = "INSERT INTO profileimg (user_id, status, image_path) VALUES ('$userid', 1, ' ')"; 
                            mysqli_query($conn, $sql);
                        }
                    }   
                    else {
                        echo "You have an error!"; 
                    }
}

function emptyInputLogin($userName, $pwd){
    $result; 

if (empty($userName) || empty($pwd)){
    $result = true; 
}
else {
    $result = false; 
}
return $result; 
}

function loginUser($conn, $userName, $userPassword){
    $userNameExists = uidExists($conn, $userName, $userName); 

    if ($userNameExists === false){
        header("Location: login.php?error=wronglogin"); 
        exit(); 
    }

    $pwdHashed = $userNameExists["user_pwd"]; 
    $checkPwd = password_verify($userPassword, $pwdHashed); 

    if ($checkPwd === false){
        header("Location: login.php?error=wronglogin"); 
        exit(); 
    }
    else if ($checkPwd === true){
        session_start(); 
        $_SESSION["userid"] = $userNameExists["user_id"]; 
        $_SESSION["username"] = $userNameExists["user_name"]; 
        header("Location: index.php"); 
        exit(); 
    }
}
?> 