<?php
    session_start(); 
    include_once 'dbh.php'; 
    $id = $_SESSION['userid']; 
    $userName = $_SESSION['username']; 
    if (isset($_POST['submit'])){
        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name']; 
        $fileTmpName = $_FILES['file']['tmp_name']; 
        $fileSize = $_FILES['file']['size']; 
        $fileError = $_FILES['file']['error']; 
        $fileType = $_FILES['file']['type']; 

        $fileExt = explode('.', $fileName); 
        $fileActualExt = strtolower(end($fileExt)); 

        $allowed = array('jpg', 'jpeg', 'png'); 

        if (in_array($fileActualExt, $allowed)){
            if ($fileError === 0){
                if ($fileSize < 500000){
                    $fileNameNew = "profile".$id.".".$fileActualExt; 
                    $fileDestination = 'uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $sql = "UPDATE profileimg SET status=0 WHERE user_id='$id'"; 
                    $result = mysqli_query($conn, $sql); 
                    $sql = "SELECT * FROM users WHERE user_name='$userName'";
                    $result = mysqli_query($conn, $sql); 
                    if (mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            $userid = $row['id']; 
                            $sql = "INSERT INTO profileimg (user_id, status) VALUES ('user_id', 1)"; 
                            mysqli_query($conn, $sql);
                        }
                    }   
                    else {
                        echo "You have an error!"; 
                    }
                    header("Location: index.php?uploadsuccess");
                }
                else {
                    echo "Your file is too big!";
                }
            }
            else {
                echo "There was an error uploading your file!"; 
            }
        }
        else {
            echo "You cannot upload files of this type!"; 
        }
    }
    
?> 