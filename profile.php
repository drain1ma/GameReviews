
<!DOCTYPE html> 
<html>
<head>
</head> 
<?php
    include_once 'dbh.php'; 
    include 'templates/header.php'; 
    include 'templates/footer.php'; 
    $id = $_SESSION['userid']; 
?>

<body> 
<?php 
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

     $allowed = array('jpg', 'jpeg', 'png', 'gif'); 
     if (in_array($fileActualExt, $allowed)){
         if ($fileError === 0){
             if ($fileSize < 10000000){
                 $fileNameNew = "profile".$id.".".$fileActualExt; 
                 $fileDestination = 'uploads/'.$fileNameNew;
                 move_uploaded_file($fileTmpName, $fileDestination);
                 $sql = "UPDATE profileimg SET status=0 WHERE user_id='$id'"; 
                 $result = mysqli_query($conn, $sql); 
                 
                
                 header("Location: profile.php?uploadsuccess");
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


 
        $sql = "SELECT * FROM users"; 
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['user_id']; 
                $sqlImg = "SELECT * FROM profileimg WHERE user_id=$id";
                $resultImg = mysqli_query($conn, $sqlImg); 
                if ($resultImg == null){
                    $sql = "SELECT * FROM users WHERE user_id='$id'";
                    $result = mysqli_query($conn, $sql); 
                    if (mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            $userid = $row['user_id']; 
                            $sql = "INSERT INTO profileimg (user_id, status) VALUES ('userid', 1)"; 
                            mysqli_query($conn, $sql);
                        }
                    }   
                    else {
                        echo "You have an error!"; 
                    }
                }
                while($rowImg = mysqli_fetch_assoc($resultImg)){
                    echo "<div>"; 
                    if($rowImg['status'] == 0){
                        echo "<img src='uploads/profile".$id.".jpg'>"; 
                    }
                    else{
                        echo "<img src='uploads/profiledefault.jpg'>"; 
                    }
                    echo $row['username']; 
                    echo "</div>"; 
                } 
            }
        } 
    ?> 


<form action="profile.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <button type="submit" name="submit" style="padding: 5px">Upload</button>
</form> 



</body> 
</html> 